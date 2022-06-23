<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificaUtenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_user', function (Blueprint $table) {
            $table->bigInteger('Utente')->unsigned();
            $table->bigInteger('Notifica')->unsigned();

            $table->foreign('Utente')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('Notifica')
                  ->references('idNotifica')
                  ->on('notifications')
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
        Schema::dropIfExists('notification_user');
    }
}
