<?php

namespace App\Http\Controllers;

use App\Notifications\UserRegistered;
use App\User;
use Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller {

    public function addUser(Request $request) {

        $email         = $request -> email;
        $password      = $request -> password;
        $name          = $request -> name;
        $phone         = $request -> phone;
        $hash_password = bcrypt($password);

        if (User::where('email', $email) -> first()) {
            $msg = array(
                'status'  => 'error',
                'message' => 'User Exists',
            );
            return response() -> json($msg);

        } else {

            $user           = new User();
            $user -> email    = $email;
            $user -> password = $hash_password;
            $user -> name     = $name;
            $user -> phone    = $phone;
            $user -> save();

            $user -> notify(new UserRegistered($user));

            if ($user -> id) {

                Auth::loginUsingId($user -> id);

                $msg = array(
                    'status'  => 'success',
                    'message' => 'Successfully Registered',
                );
                return response() -> json($msg);

            } else {

                return 'Error registering user';

            }

        }

    }
}
