<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    # UN USUARIO TIENE UN PERFIL
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    # UN USUARIO PERTENECE A UN NIVEL
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    # UN USUARIO PUEDE TENER MUCHOS GRUPOS
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
        //Pertenece o tiene muchos
    }

    # UN USUARIO TIENE UNA LOCALIZACION A TRAVES DE PERFIL
    public function location()
    {
        # TENGO UNO A TRAVES DE
        return $this->hasOneThrough(Location::class,Profile::class);
    }

    # UN USUARIO TIENE MUCHOS POST
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    # UN USUARIO TIENE MUCHOS VIDEOS
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    # UN USUARIO TIENE MUCHOS COMENTARIOS
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    # UN USUARIO TIENE UNA IMAGEN DE PERFIL
    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
}
