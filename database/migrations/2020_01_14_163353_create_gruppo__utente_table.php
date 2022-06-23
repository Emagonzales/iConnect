<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruppoUtenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->bigInteger('Utente')->unsigned();
            $table->bigInteger('Gruppo')->unsigned();

            $table->foreign('Utente')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('Gruppo')
                  ->references('CodU')
                  ->on('groups')
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
        Schema::dropIfExists('group_user');
    }
}
