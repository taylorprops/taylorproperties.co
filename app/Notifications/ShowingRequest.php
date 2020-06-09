<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Config;
use App\Leads;
use Twilio\Rest\Client;

class ShowingRequest extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($showing) {
        $this -> showing = $showing;
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {

        $this -> showing -> subject = 'Showing Request';
        $sms = Leads::LeadNotificationSMS($this -> showing);

        $account_sid = Config::get('sms.sms.sms_id');
        $auth_token = Config::get('sms.sms.sms_token');
        $twilio_number = Config::get('sms.sms.sms_number');

        $client = new Client($account_sid, $auth_token);
        $client -> messages -> create(Config::get('email_routing.showing_request_sms.sms'),
            ['from' => $twilio_number, 'body' => $sms] );

        $lead_assigned = Leads::LeadAssigned($this -> showing);
        $this -> showing -> lead_assigned = $lead_assigned;

        $ccs = Config::get('email_routing.showing_request_ccs.emails');
        if($ccs != '') {
            return (new MailMessage)
                -> from('clientservices@taylorprops.com', 'Taylor Properties - Showing Requests')
                -> cc(explode(',', Config::get('email_routing.showing_request_ccs.emails')))
                -> subject('Showing Request from www.taylorproperties.co')
                -> markdown('mail.listings.showing_request', ['showing' => $this -> showing]);
        } else {
            return (new MailMessage)
            -> from('clientservices@taylorprops.com', 'Taylor Properties - Showing Requests')
                -> subject('Showing Request from www.taylorproperties.co')
                -> markdown('mail.listings.showing_request', ['showing' => $this -> showing]);
        }
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
}
