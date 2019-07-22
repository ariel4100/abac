<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalidaToTablasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tablas', function (Blueprint $table) {
            $table->string('diametro2')->nullable()->after('tipo');
            $table->string('tipo2')->nullable()->after('b');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tablas', function (Blueprint $table) {
            //
        });
    }
}
