<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteGruppoPersonaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_professor_staff', function (Blueprint $table) {
            $table->bigInteger('Docente')->unsigned();
            $table->bigInteger('Gruppo')->unsigned();
            $table->bigInteger('Personale')->unsigned();
            $table->date('data');
            $table->dateTime('ora');

            $table->foreign('Docente')
            ->references('id')
            ->on('professors')
            ->onDelete('cascade');

            $table->foreign('Gruppo')
                  ->references('CodU')
                  ->on('groups')
                  ->onDelete('cascade');

            $table->foreign('Personale')
                  ->references('id')
                  ->on('staffs')
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
        Schema::dropIfExists('group_professor_staff');
    }
}
