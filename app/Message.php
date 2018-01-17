<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // esta propiedad evita protejer columnas, para asi evitar el error MassAssignmentException
    protected $guarded = [];

    /**
     * Relacion de pertenencia.
     * Un mensaje pertenece a un usuario
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
