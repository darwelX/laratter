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
        
        $yo->follows()->attach($user);
        
        return redirect("/$username")->withSuccess('Usuario seguido!');
    }

    public function unfollow($username, Request $request)
    {
        $user = $this->findByUsername($username);
        $yo = $request->user();
        $yo->follows()->detach($user);

        return redirect("/$username")->withSuccess('Usuario no seguido!');
    }

    private function findByUsername($username)
    {
        return User::where('username', $username)->first();
    }
}
