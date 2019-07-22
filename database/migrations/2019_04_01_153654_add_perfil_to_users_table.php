<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPerfilToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("empresa")->nullable()->after('distribuidor');
            $table->string("cargo")->nullable()->after('distribuidor');
            $table->string("localidad")->nullable()->after('distribuidor');
            $table->string("provincia")->nullable()->after('distribuidor');
            $table->string("pais")->nullable()->after('distribuidor');
            $table->string("telefono")->nullable()->after('distribuidor');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
