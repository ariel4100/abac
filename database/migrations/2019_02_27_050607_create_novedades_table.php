<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->increments('id');

            $table->string('image')->nullable();
            $table->string('title_es')->nullable();
            $table->string('title_en')->nullable();
            $table->string('text_es')->nullable();
            $table->string('text_en')->nullable();
            $table->string('order')->nullable();

            $table->boolean('destacado')->default(false);

            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

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
        Schema::dropIfExists('novedades');
    }
}
