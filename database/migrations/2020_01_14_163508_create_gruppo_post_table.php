<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruppoPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_post', function (Blueprint $table) {
            
            $table->bigInteger('Gruppo')->unsigned();
            $table->bigInteger('Post')->unsigned();

            

            $table->foreign('Gruppo')
                  ->references('CodU')
                  ->on('groups')
                  ->onDelete('cascade');

            $table->foreign('Post')
                  ->references('idP')
                  ->on('posts')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_post');
    }
}
