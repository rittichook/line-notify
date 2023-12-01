<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\LineNotifyMessage;
use App\Models\User; // Assuming you have a User model



class HelpdeskController extends Controller
{


    public function sendLineNotify()
    {
        $user = User::find(1); // Replace 1 with the actual user ID

        $message = "Hello from Line Notify!";

        $user->notify(new LineNotifyMessage($message));

        return "Line Notify message sent!";
    }
}

