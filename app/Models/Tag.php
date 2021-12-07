<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    # UNA ETIQUETA TIENE MUCHOS POST
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    # UNA ETIQUETA TIENE MUCHOS VIDEOS
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
