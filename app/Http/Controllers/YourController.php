<?php

namespace App\Http\Controllers;

use App\Notifications\LineNotifyMessage;
use Illuminate\Support\Facades\Notification;

class YourController extends Controller
{
    public function sendLineNotify()
    {
        // Replace 'Your message here' with the actual message you want to send
        $message = 'Your message here';

        // Replace 'Your notifiables here' with the actual notifiable entities you want to target
        $notifiables = []; // Example: [$user1, $user2, ...]

        // Check if any notifiable entities are specified
        if (count($notifiables) > 0) {
            // Instantiate the notification
            $notification = new LineNotifyMessage($message);

            // Iterate over notifiable entities and send Line Notify message
            foreach ($notifiables as $notifiable) {
                $notification->toLineNotify($notifiable);
            }

            return "Line Notify messages sent successfully!";
        } else {
            return "No notifiable entities specified.";
        }
    }
}
