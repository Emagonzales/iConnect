<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_chats', function (Blueprint $table) {
            $table->bigIncrements('idChatI');
            $table->bigInteger('Utente1')->unsigned();
            $table->bigInteger('Utente2')->unsigned();

            $table->index(['Utente1', 'Utente2']);
        

            
            $table->timestamps();

            $table->foreign('Utente1')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->foreign('Utente2')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('individual_chats');
    }
}
