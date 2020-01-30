<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('number');
            $table->integer('type');
            $table->float('iva');
            $table->timestamps();
            $table->integer('client_id') ->unsigned(); //definir la columna que es clave foránea, por defecto laravel usa números enteros grandes sin signo.
            $table
                ->foreign('client_id') // nombre de la columna que es clave foránea
                ->references('id') // nombre de la columna que clave primaria
                ->on('clients') //nombre de la tabla
    ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bills');
    }
}
