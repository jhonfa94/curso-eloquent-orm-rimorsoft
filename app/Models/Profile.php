<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['instagram', 'github', 'web',];

    # UN PERFIL PERTENECE A UN USUARIO
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    # UN PERFIL TIENE UNA LOCALIZACION
    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
