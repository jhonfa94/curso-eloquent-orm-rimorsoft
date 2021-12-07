<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();

            $table->text('body');

            /**
             * CREA DOS CAMPOS DONDE:
             * UNO HACE REALACION DEL ID
             * EL OTRO HACE REFERENCIA A LA ENTIDAD
             * EJEMPLO: ID => 2 || ENTIDAD => App\Models\Comment
             * Debe terminar en able para la relacion polimorfica
             */
            $table->morphs('commentable');


            $table->timestamps();

            //REALACION
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
