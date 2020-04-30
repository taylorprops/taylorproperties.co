<?php

namespace App\Notifications;

use Config;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Leads;
use App\Agent;
use Twilio\Rest\Client;



class MoreInfoRequest extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($info) {
        $this -> info = $info;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            //
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {

        $this -> info -> subject = 'Property Information Request';
        $sms = Leads::LeadNotificationSMS($this -> info);

        $account_sid = Config::get('sms.sms.sms_id');
        $auth_token = Config::get('sms.sms.sms_token');
        $twilio_number = Config::get('sms.sms.sms_number');

        $client = new Client($account_sid, $auth_token);
        $client -> messages -> create(Config::get('email_routing.more_info_request_sms.sms'),
            ['from' => $twilio_number, 'body' => $sms] );

        $lead_assigned = Leads::LeadAssigned($this -> info);
        $this -> info -> lead_assigned = $lead_assigned;
        $ccs = Config::get('email_routing.more_info_request_ccs.emails');

        if ($ccs != '') {

            return (new MailMessage)
                -> from('clientservices@taylorprops.com', 'Taylor Properties - Property Info Requests')
                -> cc(explode(',', Config::get('email_routing.more_info_request_ccs.emails')))
                -> subject('Property Information Request from www.taylorproperties.co')
                -> markdown('mail.listings.more_info_request', ['info' => $this -> info]);
        } else {
            return (new MailMessage)
                -> from('clientservices@taylorprops.com', 'Taylor Properties - Property Info Requests')
                -> subject('Property Information Request from www.taylorproperties.co')
                -> markdown('mail.listings.more_info_request', ['info' => $this -> info]);
        }

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

}
