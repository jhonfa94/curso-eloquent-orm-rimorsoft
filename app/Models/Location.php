<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    # Una localización pertenece a un perfil
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
