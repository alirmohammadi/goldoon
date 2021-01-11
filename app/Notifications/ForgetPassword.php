<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Kavenegar\Laravel\Message\KavenegarMessage;
use Kavenegar\Laravel\Notification\KavenegarBaseNotification;

class ForgetPassword extends KavenegarBaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

	public function toKavenegar($notifiable)
	{
		return (new KavenegarMessage($this->data["token"]))->from('10008663')->to($this->data["phone"]);
	}
}
