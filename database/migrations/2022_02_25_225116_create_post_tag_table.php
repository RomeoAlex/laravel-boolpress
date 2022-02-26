<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            // TAABELLA PONTE NON SERVE NE ID NE TIMESTAMP
            $table->unsignedBigInteger('post_id');

            $table->foreign('post_id')
            ->references('id')
            ->on('posts');
            // importante onDelete per le relazioni !!!!!
            // ->onDelete('set null');
            
            
            $table->unsignedBigInteger('tag_id');

            $table->foreign('tag_id')
            ->references('id')
            ->on('tags');
            // con primary indicizza velocemente le colonne
            $table->primary(['post_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
