<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Config;

class MoreInfoRequest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this -> info = $info;
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
        $ccs = Config::get('email_routing.more_info_request_ccs.emails');
        if($ccs != '') {
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
