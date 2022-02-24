<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->string('phone', 16);
            $table->string('adress',255);
            // creo la foreign key che punterà a user id
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            // specifiche per la foreign key
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
            // può essere abbreviato in
            // $table->foreignId('user_id')
            // -constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_info');
    }
}
