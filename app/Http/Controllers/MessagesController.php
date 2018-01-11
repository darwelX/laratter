<?php

namespace App\Http\Controllers;

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
}
