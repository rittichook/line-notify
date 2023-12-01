<?php

// app/Notifications/LineNotifyMessage.php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class LineNotifyMessage extends Notification
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function toLineNotify($notifiable)
    {
        $accessToken = env('LINE_NOTIFY_ACCESS_TOKEN');

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->post('https://notify-api.line.me/api/notify', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                ],
                'form_params' => [
                    'message' => $this->message,
                ],
            ]);

            // Check if the request was successful (status code 200)
            if ($response->getStatusCode() == 200) {
                // Log success
                // Log::info('Line Notify message sent successfully to ' . get_class($notifiable));
            } else {
                // Log failure
                // Log::error('Line Notify message failed with status code ' . $response->getStatusCode() . ' to ' . get_class($notifiable));
            }
        } catch (\Exception $e) {
            // Log exception
            // Log::error('Line Notify message failed with exception: ' . $e->getMessage() . ' to ' . get_class($notifiable));
        }
    }
}



