<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Config;

class UserRegisteredNotification extends Notification
{
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
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $ccs = Config::get('email_routing.client_register_ccs.emails');
        $subject = 'New Lead - A Client Just Registered on www.TaylorProperties.co';
        if($ccs != '') {
            return (new MailMessage)
                -> from('clientservices@taylorprops.com', 'Taylor Properties')
                -> cc(explode(',', Config::get('email_routing.client_register_ccs.emails')))
                -> subject($subject)
                -> markdown('mail.listings.user_registered_notification', ['user' => $this -> user]);
        } else {
            return (new MailMessage)
            -> from('clientservices@taylorprops.com', 'Taylor Properties')
                -> subject($subject)
                -> markdown('mail.listings.user_registered_notification', ['user' => $this -> user]);
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
