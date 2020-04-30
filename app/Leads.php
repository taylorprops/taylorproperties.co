<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model {

    public $timestamps = false;
    protected $connection = 'leads';
    protected $table = 'leads';

    public function ScopeLeadAssigned($query, $lead) {
        $agent = null;
        if ($lead -> lead_id > 0) {
            $lead = $this -> where('id', $lead -> lead_id) -> orWhere('l1_email', $lead -> email) -> first();
            if ($lead -> a_id > 0) {
                $agent = collect();
                $agent -> fullname = $lead -> a_fullname;
                $agent -> email = $lead -> a_email;
                $agent -> phone = $lead -> a_phone;
            }
            return $agent;
        }
    }

    public function ScopeLeadNotificationSMS($query, $lead) {

        $sms =
$lead -> subject . '

Lead Details
' . $lead -> name . '
' . $lead -> email . '
' . $lead -> phone . '
' . $lead -> comments;

        if($lead -> showing_date) {
            $sms .= '
Showing Request Details

'.$lead -> address.'
'.$lead -> listing_id.'
Date1: '.$lead -> showing_date.'
Time1: '.$lead -> showing_time.'
Date2: '.$lead -> showing_date_alt.'
Time2: '.$lead -> showing_time_alt.'
View Property: '.$lead -> listing_link;
        }

        $agent = null;

        if ($lead -> lead_id > 0) {
            $lead = $this -> where('id', $lead -> lead_id) -> orWhere('l1_email', $lead -> email) -> first();
            if ($lead -> a_id > 0) {
                $agent = collect();
                $agent -> fullname = $lead -> a_fullname;
                $agent -> email = $lead -> a_email;
                $agent -> phone = $lead -> a_phone;
            }
        }

        if ($agent) {
            $sms .= '

Lead has already been assigned to an agent

Agent Details
' . $agent -> fullname . '
' . $agent -> email . '
' . $agent -> phone;

        }
        return $sms;

    }

}
