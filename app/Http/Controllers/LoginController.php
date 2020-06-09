<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {
    // do login Auth
    public function loginUser(Request $request) {
        $email       = $request -> email;
        $password    = $request -> password;
        $authSuccess = Auth::attempt(['email' => $email, 'password' => $password], $request -> has('remember'));

        if ($authSuccess) {

            User::where('email', $email) -> update(['last_visit' => date('Y-m-d')]);

            $msg = array(
                'status'  => 'success',
                'message' => 'Login Successful',
            );
            return response() -> json($msg);
        }

        $msg = array(
            'status'  => 'error',
            'message' => 'Login Fail !',
        );
        return response() -> json($msg);

    }
}
