<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Message extends Model
{
    // esta propiedad evita protejer columnas, para asi evitar el error MassAssignmentException
    protected $guarded = [];
    use Searchable;
    /**
     * Relacion de pertenencia.
     * Un mensaje pertenece a un usuario
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * El atributo image del modelo llamara a este metodo en lugar del valor de la propiedad
     */
    public function getImageAttribute($image)
    {
        if (!$image || \starts_with($image, 'http'))
        {
            return $image;
        }

        return \Storage::disk('public')->url($image);
    }

    public function toSearchableArray()
    {
        $this->load('user');
        return $this->toArray();
    }

    public function responses()
    {
        return $this->hasMany(Response::class)->orderBy('created_at', 'desc');
    }
}
