<?php

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
//Esto es un privateChannel que return true/false
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//Este broadcast es de nuestro event con la function broadcastOn
Broadcast::channel('chat.{chat_id}', function ($user, $chat_id) {
    if ($user->Chat->contains($chat_id)) {
        return $user;
    }
});

//Canal que creo para las notificaciones
Broadcast::channel('notification.{userId}', function (User $user, $userId) {
    // Log::info('user: ', $user);
    return $user->id == $userId;
});
