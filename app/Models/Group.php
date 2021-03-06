<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    # UN GRUPO TIENE Y PERTENECE A MUCHOS USUARIOS
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
