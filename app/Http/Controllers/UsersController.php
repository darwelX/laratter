<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Conversation;
use App\PrivateMessage;
use App\Notifications\UserFollowed;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function show($username){
        // throw new \Exception('Simulando une error 500');
        // se esta utilizando query builder
        $user = $this->findByUsername($username);
        $messages = Message::where('user_id', $user->id)->paginate(10);
        // dd($mes)
        return view('users.show', [
            'user' => $user,
            'messages' => $messages,
        ]);
    }

    public function follows($username)
    {
        $user = $this->findByUsername($username);
        // dd($user);
        return view('users.follows', [
            'user' => $user,
            'follows' => $user->follows,
        ]);
    }

    public function followers($username){
        $user = $this->findByUsername($username);

        return view('users.follows', [
            'user' => $user,
            'follows' => $user->followers,
        ]);
    }
    
    public function follow($username, Request $request)
    {
        $user = $this->findByUsername($username);
        
        $yo = $request->user();
        
        if(!$user->private)
        {
            $yo->follows()->attach($user);
            $user->notify(new UserFollowed($yo));
            return redirect("/$username")->withSuccess('Usuario seguido!');
        }else {
            $yo->invitations()->attach($user);
            return redirect("/$username")->withSuccess('Invitación enviada!');
        }

    }

    public function unfollow($username, Request $request)
    {
        $user = $this->findByUsername($username);
        $yo = $request->user();
        $yo->follows()->detach($user);

        return redirect("/$username")->withSuccess('Usuario no seguido!');
    }

    /**
     * Se envia un mensaje privado al $username, teniendo como remitente
     * el usuario loguiado
     */
    public function sendPrivateMessage($username, Request $request)
    {   
        // usuario al que se le envia el mensaje
        $user = $this->findByUsername($username);
        // usuario autenticado
        $yo = $request->user();
        // mensaje de texto a enviar
        $message = $request->input('message');
        //pregunta si existe una conversacion entre ambos usuarios
        $conversation = Conversation::between($yo, $user);

        // codigo sin el between
        // $conversation = Conversation::create();
        // $conversation->users()->attach($yo);
        // $conversation->users()->attach($user);

        $privateMessage = PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $yo->id,
            'message' => $message,
        ]);

        return redirect('/conversations/'.$conversation->id);
    }


    /**
     * si recive como parametro un id por medio de la ruta y el parametro es una clase
     * este la busca y la retorna en un objeto que representa el modelo
     */
    public function showConversation(Conversation $conversation)
    {
        $conversation->load('users', 'privateMessages');
        // dd($conversation);
        return view('users.conversation', [
            'conversation' => $conversation,
            'user' => auth()->user(),
        ]);
    }

    private function findByUsername($username)
    {
        // firstOrFail si no lo encuentra retorna un error 404
        return User::where('username', $username)->firstOrFail();
    }

    public function notifications(Request $request){
        $notifications = $request->user()->unreadNotifications;
        $request->user()->unreadNotifications->markAsRead();
        return $notifications;
    }

    public function notificationsRead(Request $request){
        return $request->user()->readNotifications;
    }

    public function changestate($username)
    {
        $user = $this->findByUsername($username);
        $user->private = !$user->private;
        $user->save();
        if($user->private)
        {
            return __('app.private');
        }else
        {
            return __('app.public');
        }
    }

    public function stateprivate($username)
    {
        $user = $this->findByUsername($username);
        $state['value'] = $user->private;
        if($user->private)
        {
            $state['state'] =  __('app.private');
            return $state;
        }else
        {
            $state['state'] =  __('app.public');
            return $state;
        }
    }
}
