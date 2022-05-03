<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('nurej')->nullable();
            $table->string('idadmin')->nullable();
            $table->string('proceso')->nullable();
            $table->string('procedimiento')->nullable();
            $table->string('materia')->nullable();
            $table->date('frecepcion')->nullable();
            $table->boolean('estado')->nullable()->default(true);
            $table->string('file')->nullable();
            $table->string('creador')->nullable();
            $table->string('idcreador')->nullable();
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
        Schema::dropIfExists('expedientes');
    }
}
