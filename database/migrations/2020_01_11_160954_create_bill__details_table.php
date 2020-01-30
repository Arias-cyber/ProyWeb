<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill__details', function (Blueprint $table) {
            $table->increments('id');
            $table->float('hours');
            $table->float('subTotal');
            $table->integer('bill_id')->unsigned(); //definir la columna que es clave foránea, por defecto laravel usa números enteros grandes sin signo.
            $table
                ->foreign('bill_id') // nombre de la columna que es clave foránea
                ->references('id') // nombre de la columna que clave primaria
                ->on('bills') //nombre de la tabla
            ;
            $table->integer('project_id')->unsigned(); //definir la columna que es clave foránea, por defecto laravel usa números enteros grandes sin signo.
            $table
                ->foreign('project_id') // nombre de la columna que es clave foránea
                ->references('id') // nombre de la columna que clave primaria
                ->on('projects') //nombre de la tabla
                ;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill__details');
    }
}
