<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    // public function show($id){
    //     $message = Message::find($id);

    //     return view('messages.show', [
    //         'message' => $message
    //     ]);
    // }

    /**
     * este metodo sirve para manejar errores 404
     * en caso de no encontrar el mensaje por id 
     */
    public function show(Message $message){

        return view('messages.show', [
            'message' => $message
        ]);
    }

    /**
     * Utiliza la clase CreateMessageRequest para
     * validar las peticiones del formulaio
     */
    public function create(CreateMessageRequest $request){
        // dd($request->all());
        $user = $request->user();
        $image = $request->file('image');

        $message  = Message::create([
            'user_id' => $user->id,
            'content' => $request->input('contenido'),
            // php artisan storage:link crea el vinculo con la key public que se encuentra en filesystem.php
            'image' => $image->store('messages', 'public'),
            // 'image' => 'http://lorempixel.com/600/300?'.mt_rand(0, 1000)
        ]);

        return redirect('/messages/'.$message->id);
    }   
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        // con with mejora el rendimeinto de la consulta ya que hace un solo query para traer todos los usuarios
        $messages = Message::search($query)->get();
        $messages->load('user');
        // $messages = Message::with('user')->where('content', 'LIKE', "%$query%")->get();

        return view('messages.index', [
            'messages' => $messages,
        ]);
    }
}
