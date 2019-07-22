<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('ficha')->nullable()->change();
            $table->string('text_es')->nullable()->change();
            $table->string('text_en')->nullable()->change();
            $table->string('especificaciones_es')->nullable()->change();
            $table->string('especificaciones_en')->nullable()->change();
            $table->string('video_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
