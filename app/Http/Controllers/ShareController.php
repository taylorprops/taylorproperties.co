<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\Share;

class ShareController extends Controller
{
    public function share(Request $request) {

        $from_name = $request -> from_name;
        $from_email = $request -> from_email;
        $type = $request -> type;
        if($type == 'listing') {
            $subject = $from_name.' just shared a property they found on Taylor Properties website';
        } else if($type == 'agent') {
            $subject = $from_name.' just shared a Taylor Properties agent with you.';
        }

        $share = array();
        $share['message'] = nl2br($request -> message);
        $share['subject'] = $subject;
        $share['from_name'] = $from_name;
        $share['from_email'] = $from_email;

        \Notification::route('mail', $request -> to_email) -> notify(new Share($share));
    }
}
