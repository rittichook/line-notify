<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineNotifyController;

use App\Http\Controllers\YourController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'api-line-notify';
});


// routes/web.php


// Route::get('/send-line-notify', [LineNotifyController::class, 'sendLineNotify']);

// routes/web.php


// Route::get('/send-line-notify', [YourController::class, 'sendLineNotify']);

use App\Notifications\LineNotifyMessage;

// Route::get('/test-line-notify', function () {
//     $message = 'ทดสอบการแจ้งเตือน Bug Report';

//     // Instantiate the notification
//     $notification = new LineNotifyMessage($message);

//     // Replace 'Your notifiable here' with the actual notifiable entity you want to target
//     $notifiable = auth()->user(); // Example: $user

//     // Send Line Notify message
//     $notification->toLineNotify($notifiable);

//     return "Test Line Notify message sent!";
// });

use Illuminate\Http\Request;

Route::post('/line-notify', function (Request $request) {
    $message = $request->input('message', 'Default Message');

    // Instantiate the notification
    $notification = new LineNotifyMessage($message);

    // Replace 'Your notifiable here' with the actual notifiable entity you want to target
    $notifiable = auth()->user(); // Example: $user

    // Send Line Notify message
    $notification->toLineNotify($notifiable);

    return response()->json(['message' => 'Line Notify message sent!']);
});

