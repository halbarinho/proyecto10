<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Chat;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Events\NotificationSend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Database\Query\JoinClause;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }

    public function getNotifications()
    {

        $userId = auth()->user()->id;

        // $notifications = DB::table('notifications')
        //     ->join('users', function (JoinClause $join) use ($userId) {
        //         $join->on('notifications.user_id', '=', 'users.id')
        //             ->where('notifications.user_id', '=', $userId);
        //     })
        //     ->get();

        $notifications = Notification::where('user_id', $userId)->get()->reject(function ($notification) {
            return $notification->read == true;
        });

        // $notifications = $notificationsUser->reject(function ($notification) {
        //     return $notification->read === 1;
        // });

        Log::info($notifications);

        return response()->json($notifications);
    }

    public function markAsRead(int $notificationId)
    {
        Log::info('Notificacion: ', [$notificationId]);
        try {
            $selectedNotification = Notification::findOrFail((int) $notificationId);


            $selectedNotification->read = true;

            $selectedNotification->save();



            return response()->json(['success' => true, 'message' => 'Notificacion marcada como leida.', 'notification' => $selectedNotification]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();

        }


    }


    /**
     * Envio de notificacion desde axios
     */
    public function sendNotification(Request $request)
    {

        Log::info($request);

        $userId = $request->input('user_id');

        $user = User::findOrFail($userId);

        $target_id = $request->input('target_id');



        $notificationChat = Notification::create([
            // 'message' => 'Mensaje: ' . $alerta->id . 'en la Aula: ' . $class->id,
            'message' => 'Mensaje en el chat con ' . $user->name,
            'type' => 'chat',
            'user_id' => $userId,
            'target_id' => $target_id,
        ]);


        //Enviar evento al tutor
        broadcast(new NotificationSend($notificationChat->type, $notificationChat->user_id, $notificationChat->message))->toOthers();

    }



    public function getChatNotifications(int $chatId)
    {

        $chat = Chat::findOrFail($chatId);

        $userId = Auth::user()->id;

        $notifications = Notification::where('user_id', $userId)
            ->where('type', 'chat')
            ->where('target_id', $chatId)
            ->get();

        Log::info($notifications);


        foreach ($notifications as $notification) {
            self::markAsRead($notification->id);
            Log::info('aqui');
        }

    }


}
