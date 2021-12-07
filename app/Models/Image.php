<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    # UNA ETIQUETA TIENE MUCHOS POST
    public function imageable()
    {
        // morphTo siginifica transformar a
        return $this->morphTo();
    }

}
