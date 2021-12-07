<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    # UN POST PERTENECE A UNA CATEGORIA
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    # UN POSt PERTENECE A UN USUARIO
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    # CONFIGURACION METODOS POLIMORFICOS

    # UN POST TIENE MUCHOS COMENTARIOS
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    # UN POST TIENE UNA IMAGEN
    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    # MUCHOS A MUCHOS
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }

}
