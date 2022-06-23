<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegnalazioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('idS');
            $table->enum('esito', ['positivo', 'negativo','pending'])->default('pending');	 
            $table->timestamps();
            $table->bigInteger('Amministratore')->unsigned();

            $table->foreign('Amministratore')
                  ->references('idAmm')-> on('administrators')
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
        Schema::dropIfExists('reports');
    }
}
