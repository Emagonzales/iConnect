<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegnalazioneUtenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_user', function (Blueprint $table) {
            $table->bigInteger('Utente')->unsigned();
            $table->bigInteger('Segnalazione')->unsigned();

            $table->foreign('Utente')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('Segnalazione')
                  ->references('idS')
                  ->on('reports')
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
        Schema::dropIfExists('report_user');
    }
}
