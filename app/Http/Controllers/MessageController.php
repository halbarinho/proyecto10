<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use Illuminate\Http\Request;
use Illuminate\Broadcasting\InteractsWithSockets;


class MessageController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function send(Request $request)
    {


        //DEBO HACER VALIDACION DATOS REQUEST
        $message = auth()->user()->Message()->create([
            'content' => $request->message,
            'chat_id' => $request->chat_id,
        ])->load('user');


        //emitimos el evento con helper broadcast
        broadcast(new MessageSend($message))->toOthers();

        return $message;
    }



}
