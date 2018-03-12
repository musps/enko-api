<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');
            $table->integer('user');
            $table->string('tag');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('country');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zipCode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_address');
    }
}
