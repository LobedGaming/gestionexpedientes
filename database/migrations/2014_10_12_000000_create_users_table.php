<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('name',75)->nullable();
            $table->string('apellido',75)->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('password')->nullable();
            $table->string('role',20)->nullable()->default('admin');
            $table->string('iddmin')->nullable();
            $table->string('plan')->nullable()->default('basic');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
