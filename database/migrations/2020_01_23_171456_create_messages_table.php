<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('idM');
            $table->text('testo');
            $table->enum('importanza', ['true','false'])->default('false');
            $table->bigInteger('ChatI')->unsigned()->nullable($value = true);
            $table->bigInteger('ChatG')->unsigned()->nullable($value = true);

            $table->foreign('ChatI')
                  ->references('idChatI')
                  ->on('individual_chats')
                  ->onDelete('cascade');

            $table->foreign('ChatG')
                  ->references('idChatG')
                  ->on('group_chats')
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
        Schema::dropIfExists('messages');
    }
}
