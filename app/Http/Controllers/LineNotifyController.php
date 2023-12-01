<?php

// app/Notifications/LineNotifyMessage.php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class LineNotifyMessage extends Notification
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function toLineNotify($notifiable)
    {
        $accessToken = config('services.line_notify.access_token');

        $client = new \GuzzleHttp\Client();
        $client->post('https://notify-api.line.me/api/notify', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
            'form_params' => [
                'message' => $this->message,
            ],
        ]);
    }
}


