<?php

namespace App\Http\Controllers;

use App\Notifications\UserRegistered;
use App\User;
use Auth;
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

                // add to leads
                $lead = new Leads();
                $lead -> l_source = 'www.TaylorProperties.co';
                $lead -> l1_email = $email;
                $lead -> l1_first = substr($name, 0, strpos($name, ' '));
                $lead -> l1_last = substr($name, strpos($name, ' '));
                $lead -> l1_phone = $phone;
                $lead -> l_user_id = $user_id;
                $lead -> l_status = 'Lead';
                $lead -> save();
                $lead_id = $lead -> id;

                // email lead to office
                $user -> lead_id = $lead_id;
                $user -> notify(new UserRegisteredNotification($user));

            }

            // if successful login user
            if ($user_id) {

                Auth::loginUsingId($user_id);

                $msg = array(
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
