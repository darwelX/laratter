<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
/**
 * php artisan make:migration create_conversation_user_table --create conversation_user
 * Esta migración crea una tabla enlace entra la relacion de la
 * tabla conversacion y user. 
 * La convecion para crear este timpo de tabla dicta que debe ser
 * ordenada en orden alfabetico y en singular se parado por
 * conversation_user guion bajo ejemplo: conversation_user
 */
class CreateConversationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversation_user', function (Blueprint $table) {
            $table->integer('conversation_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['conversation_id','user_id']);

            $table->foreign('conversation_id')->references('id')->on('conversations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversation_user');
    }
}
