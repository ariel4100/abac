<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidos', function (Blueprint $table) {
            $table->increments('id');

            $table->text('image')->nullable();
            $table->text('title_es')->nullable();
            $table->text('subtitle_es')->nullable();
            $table->text('text_es')->nullable();
            $table->text('title_en')->nullable();
            $table->text('subtitle_en')->nullable();
            $table->text('text_en')->nullable();
            $table->string('ficha')->nullable();

            $table->string('section')->nullable();
            $table->string('type')->nullable();
            $table->string('order')->nullable();
            $table->text('icon')->nullable();
            $table->text('ruta')->nullable();
            
            $table->boolean('eliminable')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenidos');
    }
}
