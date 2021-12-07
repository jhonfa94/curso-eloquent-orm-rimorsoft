<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function commentable()
    {
        // morphTo siginifica transformar a
        return $this->morphTo();
    }



    # UN POSt PERTENECE A UN USUARIO
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
