<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Config;

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
        $ccs = Config::get('email_routing.contact_form_ccs.emails');
        if($ccs != '' && $this -> user -> type != 'to_agent') {
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
