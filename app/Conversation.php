<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    /**
     * Una convesacion tiene muchos usuarios
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }

    /**
     * Una conversacion tiene muchos mensajes
     */
    public function privateMessages()
    {
        return $this->hasMany(PrivateMessage::class)->orderBy('created_at', 'desc');
    }

    public static function between(User $user, User $other)
    {
        // crea la query que tenga los dos ids de los usuarios
        $query = Conversation::whereHas('users', function ($query) use ($user){
            $query->where('user_id', $user->id);
        })->whereHas('users', function($query) use ($other){
            $query->where('user_id', $other->id);
        });

        // si la encuentra la retorna sino la crea con los ids de los dos usuarios
        $conversation = $query->firstOrCreate([]);

        // sincroniza la coversacion con los dos ids de los usuarios en caso de no existir la conversacion de lo contrario lo obvia
        $conversation->users()->sync([
            $user->id, $other->id
        ]);

        return $conversation;
    }
}
