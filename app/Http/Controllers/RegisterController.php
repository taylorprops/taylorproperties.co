<?php

namespace App\Http\Controllers;

use App\Notifications\UserRegistered;
use App\User;
use Auth;
use Config;
use Illuminate\Http\Request;
use App\Leads;
use App\ShowingRequests;
use App\InfoRequests;
use App\Notifications\UserRegisteredNotification;

class RegisterController extends Controller {

    public function addUser(Request $request) {

        $email = $request -> email;
        $password = $request -> password;
        $name = $request -> name;
        $phone = $request -> phone;
        $hash_password = bcrypt($password);

        if (User::where('email', $email) -> first()) {
            $msg = array(
                'status'  => 'error',
                'message' => 'user_exists',
            );
            return response() -> json($msg);

        } else {
            // add to users
            $user  = new User();
            $user -> email = $email;
            $user -> password = $hash_password;
            $user -> name = $name;
            $user -> phone = $phone;
            $user -> save();
            $user_id = $user -> id;
            // email user
            $user -> notify(new UserRegistered($user));

            // search leads to see if email exists - will exist if client has submitted showing requests or more info requests
            // if so update user_id on leads, showing requests and more info requests - and DO NOT add to leads and DO NOT send notification
            $search_leads = Leads::where('l1_email', $email) -> first();
            if($search_leads) {
                // add lead_id to users
                $user -> lead_id = $search_leads -> id;
                $user -> save();
                // add user_id to leads
                $search_leads -> l_user_id = $user_id;
                $search_leads -> save();
                // add user_id to showing requests
                ShowingRequests::where('email', $email)
                    -> update(['user_id' => $user_id, 'lead_id' => $search_leads -> id]);

                // add user_id to more info requests
                InfoRequests::where('email', $email)
                    -> update(['user_id' => $user_id, 'lead_id' => $search_leads -> id]);

            } else {

                $first_name = substr($name, 0, strpos($name, ' '));
                $last_name = substr($name, strpos($name, ' '));
                // add to leads
                $lead = new Leads();
                $lead -> l_source = 'www.TaylorProperties.co';
                $lead -> l1_email = $email;
                $lead -> l1_first = $first_name;
                $lead -> l1_last = $last_name;
                $lead -> l1_phone = $phone;
                $lead -> l_user_id = $user_id;
                $lead -> l_status = 'Lead';
                $lead -> l_type = 'Buy';
                $lead -> save();
                $lead_id = $lead -> id;

                // email lead to office
                $user -> lead_id = $lead_id;
                //$user -> notify(new UserRegisteredNotification($user));
                \Notification::route('mail', $email) -> notify(new UserRegisteredNotification($user));

            }


            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.contactually.com/v2/contacts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\"data\":{\"tags\":[\"Source: Taylor Properties\", \"Buyer\"],\"email_addresses\":[{\"address\":\"".$email."\"}],\"phone_numbers\":[{\"number\":\"".$phone."\"}],\"bucket_ids\":[\"bucket_125452144\"],\"first_name\":\"".$first_name."\",\"last_name\":\"".$last_name."\",\"assigned_to_id\":\"user_304134\",\"created_at\":\"".date("Y-m-d")."\"}}",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Bearer ".Config::get('contactually.contactually_key')."",
                "content-type: application/json",
                "Cookie: _enforcery_session_id_production=f881322cf6cabb55add2b4e3d8e850d6"
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            // if successful login user
            if ($user_id) {

                Auth::loginUsingId($user_id);

                $msg = array(
                    'lead_id' => $lead_id,
                    'status'  => 'success',
                    'message' => 'Successfully Registered',
                );
                return response() -> json($msg);

            } else {

                $msg = array(
                    'status'  => 'error',
                    'message' => 'general_error',
                );
                return response() -> json($msg);

            }

        }

    }
}
