<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    # UNA CATEGORIA TIENE MUCHOS POST
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    # UNA CATEGORIA TIENE MUCHOS VIDEOS
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
