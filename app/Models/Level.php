<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];


    # UN NIVEL ESTA EN VARIOS USUARIOS
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function posts(){
        # TENGO MUCHOS POST A TRAVES DE USUARIOS
        return $this->hasManyThrough(Post::class,User::class);
    }

    public function videos(){
        # TENGO MUCHOS POST A TRAVES DE USUARIOS
        return $this->hasManyThrough(Video::class,User::class);
    }
}
