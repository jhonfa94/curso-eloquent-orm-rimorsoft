<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tag_id')->unsigned();

            /**
             * CREA DOS CAMPOS DONDE:
             * UNO HACE REALACION DEL ID
             * EL OTRO HACE REFERENCIA A LA ENTIDAD
             * EJEMPLO: ID => 2 || ENTIDAD => App\Models\Comment
             * Debe terminar en able para la relacion polimorfica
             */
            $table->morphs('taggable');


            $table->timestamps();

            //REALACION
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taggables');
    }
}
