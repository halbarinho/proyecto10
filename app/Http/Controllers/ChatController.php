<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;


class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Chat $chat)
    {

        abort_unless($chat->User->contains(auth()->id()), 403);

        // //Obtengo los chats que tiene el usuario autenticado
        // $userChats = Auth()->user()->chat;

        // $otherUsers = $userChats->flatMap(function ($chat) {

        //     return $chat->user->where('id', '!=', Auth()->user()->id);

        // });

        Log::info('chat', [$chat->user]);

        //Obtener el otro usuario del chat
        $userAuth = User::findOrFail(Auth::user()->id);
        $userB = $chat->user->firstWhere('id', '!=', $userAuth->id);

        Log::info('b', [$userB]);
        $otherUsers = self::obtenerOtherUsers();

        return view('chat', [
            'chat' => $chat,
            'otherUsers' => $otherUsers,
            'userB' => $userB,
        ]);
    }

    public function chatWith(User $user)
    {

        //Identificar a los usuarios
        $userA = auth()->user();
        $userB = $user;

        //Obtener la sala de chat
        $chat = $userA->Chat()->whereHas('user', function ($query) use ($userB) {
            $query->where('chat_user.user_id', $userB->id);
        })->first();

        if (!$chat) {
            $chat = Chat::create([]);
            $chat->user()->sync([$userA->id, $userB->id]);
        }
        return redirect()->route('chat.show', $chat);
    }


    public function get_users(Chat $chat)
    {

        $users = $chat->User;

        return response()->json([
            'users' => $users,
        ]);

    }


    public function get_messages(Chat $chat)
    {
        $messages = $chat->message()->with('user')->get();

        return response()->json([
            'messages' => $messages,
        ]);
    }


    public function index()
    {


        // //Obtengo los chats que tiene el usuario autenticado
        // $userChats = Auth()->user()->chat;

        // $otherUsers = $userChats->flatMap(function ($chat) {

        //     return $chat->user->where('id', '!=', Auth()->user()->id);

        // });

        $otherUsers = self::obtenerOtherUsers();

        // Log::info('Chats: ', [$userChats]);
        Log::info('Users: ', [$otherUsers]);

        return view('chat.index', ['otherUsers' => $otherUsers]);
    }


    protected function obtenerOtherUsers()
    {
        //Obtengo los chats que tiene el usuario autenticado
        $userChats = Auth()->user()->chat;

        $otherUsers = $userChats->flatMap(function ($chat) {

            return $chat->user->where('id', '!=', Auth()->user()->id);

        });

        return $otherUsers;
    }
}
