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
            $table->id();
            $table->string('tipoD')->nullable();
            $table->string('numD')->nullable();
            $table->string('name')->nullable();
            $table->string('direccion')->nullable();
            $table->string('distrito')->nullable();
            $table->integer('telefono')->nullable();
            $table->integer('celular')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at');
            //$table->string('password');
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
