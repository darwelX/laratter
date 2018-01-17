<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function show($username){
        // se esta utilizando query builder
        $user = User::where('username', $username)->first();
        $messages = Message::where('user_id', $user->id)->paginate(10);
        // dd($mes)
        return view('users.show', [
            'user' => $user,
            'messages' => $messages,
        ]);
    }
}
