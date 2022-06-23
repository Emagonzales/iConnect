<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            
            $table->bigInteger('Utente')->unsigned();
            $table->Integer('matricola',6)->unique();
            $table->year('AnnoI');
            $table->Integer('AnnoCdL');

            $table->string('corsoL');
            $table->string('Dipartimento');
            $table->timestamps();

            $table->foreign('Utente')
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
        Schema::dropIfExists('students');
    }
}
