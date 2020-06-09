<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Config;
use Twilio\Rest\Client;
use App\Agent;
use App\Leads;

class ContactForm extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user) {
        $this -> user = $user;
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

        if($this -> user -> type == 'buy_sell' || $this -> user -> type == 'realtor_match') {

            $sms = Leads::LeadNotificationSMS($this -> user);

            $account_sid = Config::get('sms.sms.sms_id');
            $auth_token = Config::get('sms.sms.sms_token');
            $twilio_number = Config::get('sms.sms.sms_number');

            $client = new Client($account_sid, $auth_token);
            $client -> messages -> create(Config::get('email_routing.contact_form_sms.sms'),
                ['from' => $twilio_number, 'body' => $sms] );

            /* $client = new RestClient(Config::get('sms.sms.sms_id'), Config::get('sms.sms.sms_token'));
            $message_created = $client -> messages -> create(
                Config::get('sms.sms.sms_number'),
                Config::get('email_routing.contact_form_sms.sms'),
                $sms
            ); */

            $ccs = Config::get('email_routing.contact_form_ccs.emails');
            if($ccs != '') {
                return (new MailMessage)
                    -> from('clientservices@taylorprops.com', 'Taylor Properties - Contact Requests')
                    -> cc(explode(',', Config::get('email_routing.contact_form_ccs.emails')))
                    -> subject($this -> user -> subject)
                    -> markdown('mail.messages.contact', ['user' => $this -> user]);
            } else {
                return (new MailMessage)
                    -> from('clientservices@taylorprops.com', 'Taylor Properties - Contact Requests')
                    -> subject($this -> user -> subject)
                    -> markdown('mail.messages.contact', ['user' => $this -> user]);
            }


        } else if($this -> user -> type == 'from_agent') {
            $ccs = Config::get('email_routing.join_form_ccs.emails');
            if($ccs != '') {
                return (new MailMessage)
                    -> from('clientservices@taylorprops.com', 'Taylor Properties - Contact Requests')
                    -> cc(explode(',', Config::get('email_routing.join_form_ccs.emails')))
                    -> subject($this -> user -> subject)
                    -> markdown('mail.messages.contact', ['user' => $this -> user]);
            } else {
                return (new MailMessage)
                    -> from('clientservices@taylorprops.com', 'Taylor Properties - Contact Requests')
                    -> subject($this -> user -> subject)
                    -> markdown('mail.messages.contact', ['user' => $this -> user]);
            }
        } else if($this -> user -> type == 'to_agent') {
            return (new MailMessage)
                -> from('clientservices@taylorprops.com', 'Taylor Properties - Contact Requests')
                -> subject($this -> user -> subject)
                -> markdown('mail.messages.contact', ['user' => $this -> user]);
        }

        /* $ccs = Config::get('email_routing.contact_form_ccs.emails');
        if($ccs != '' && $this -> user -> type != 'to_agent') {
            return (new MailMessage)
                -> from('clientservices@taylorprops.com', 'Taylor Properties - Contact Requests')
                -> cc(explode(',', Config::get('email_routing.contact_form_ccs.emails')))
                -> subject($this -> user -> subject)
                -> markdown('mail.messages.contact', ['user' => $this -> user]);
        } else {
            return (new MailMessage)
                -> from('clientservices@taylorprops.com', 'Taylor Properties - Contact Requests')
                -> subject($this -> user -> subject)
                -> markdown('mail.messages.contact', ['user' => $this -> user]);
        } */
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
