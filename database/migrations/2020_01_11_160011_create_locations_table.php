<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',45);
            $table->string('cp',10);
            $table->integer('province_id')->unsigned(); //definir la columna que es clave foránea, por defecto laravel usa números enteros grandes sin signo.
            $table
                ->foreign('province_id') // nombre de la columna que es clave foránea
                ->references('id') // nombre de la columna que clave primaria
                ->on('provinces') //nombre de la tabla
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
        Schema::drop('locations');
    }
}
