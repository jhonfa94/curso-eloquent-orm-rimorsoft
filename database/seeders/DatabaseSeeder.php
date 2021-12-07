<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Models;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        # se crean 3 grupos
        \App\Models\Group::factory(3)->create();

        # se crean los tres niveles
        \App\Models\Level::factory()->create(['name' => 'oro']);
        \App\Models\Level::factory()->create(['name' => 'Plata']);
        \App\Models\Level::factory()->create(['name' => 'Bronce']);

        # SE CREAN LOS USUARIOS
        \App\Models\User::factory(5)->create()->each(function ($user) {
            // # CREAMOS PERFIL
            $profile = $user->profile()->save(\App\Models\Profile::factory()->make());

            // # GUARDAMOS LA LOCALIZACIÓN
            $profile->location()->save(\App\Models\Location::factory()->make());

            // # GUARDAMOS EL GRUPO DE LA PERSONA
            $user->groups()->attach($this->array(rand(1, 3)));

            // # IMAGEN DE PERFIL
            $user->image()->save(\App\Models\Image::factory()->make(['url' => 'https://lorempixel.com/90/90']));
        });


        # se crean las categorias grupos
        \App\Models\Category::factory(4)->create();

        # SE CREAN LAS ETIQUETAS
        \App\Models\Tag::factory(12)->create();

        # SE CREAN LOS POST DONDE POR CADA POST RECORRE CIERTAS FUNCIONES
        # SE INTERPRETA, CADA VEZ QUE SE CREA UN ELEMENTO HACER LO SIGUIENTE
        \App\Models\Post::factory(40)->create()->each(function ($post) {

            # CREAR UNA IMAGEN
            $post->image()->save(\App\Models\Image::factory()->make());

            # ETIQUETAS
            $post->tags()->attach($this->array(rand(1, 12)));

            # COMENTARIOS
            $number_comments = rand(1, 6);

            for ($i = 0; $i < $number_comments; $i++) {
                $post->commets()->save(\App\Models\Comment::factory()->make());
            }
        });


        # VIDEOS
        \App\Models\Video::factory(40)->create()->each(function ($video) {

            # CREAR UNA IMAGEN
            $video->image()->save(\App\Models\Image::factory()->make());

            # ETIQUETAS
            $video->tags()->attach($this->array(rand(1, 12)));

            # COMENTARIOS
            $number_comments = rand(1, 6);

            for ($i = 0; $i < $number_comments; $i++) {
                $video->commets()->save(\App\Models\Comment::factory()->make());
            }
        });
    } /// fin de metodos

    public function array($max)
    {
        $values = [];

        for ($i = 1; $i < $max; $i++) {
            $values[] = $i;
        }

        return $values;
    }
}
