<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAtIndexToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            //
            // nombre de la columan y nombre del indice en caso de no querer
            // seguir la convencion    
            // $table->index('created_at', 'my_index');

            // primer parametro nombre de la columna
            // indice de multiples columnas se encierran las columnas en un array
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            // nombreDeTabla_nombreDeCampo_index este es la convecion del nombre por defecto
            $table->dropIndex('messages_created_at_index');
        });
    }
}
