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
        $message  = Message::create([
            'content' => $request->input('contenido'),
            'image' => 'http://lorempixel.com/600/300?'.mt_rand(0, 1000)
        ]);

        return redirect('/messages/'.$message->id);
    }    
}
