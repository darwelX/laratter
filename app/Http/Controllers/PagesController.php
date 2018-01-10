<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $messages = [
            [ 
                'id' => 1,
                'content' => 'Este es mi primer mensaje',
                'image' => 'https://lorempixel.com/600/300?1'
            ],
            [ 
                'id' => 2,
                'content' => 'Este es mi segundo mensaje',
                'image' => 'https://lorempixel.com/600/300?2'
            ],
            [ 
                'id' => 3,
                'content' => 'Este otro mensaje',
                'image' => 'https://lorempixel.com/600/300?3'
            ],
            [ 
                'id' => 4,
                'content' => 'Este es mi último mensaje',
                'image' => 'https://lorempixel.com/600/300?4'
            ]
        ];
        return view('welcome', [
            'messages' => $messages,
        ]);
    }

}
