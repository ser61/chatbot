<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
          $table->increments('id');
          $table->char('nombres', 50);
          $table->char('apellidos', 50);
          $table->char('celular', 10)->nullable();
          $table->date('fecha_nacimiento')->nullable();
          $table->integer('colegio_id')->nullable();
          $table->char('tipo_persona', 1);
          $table->softDeletes();
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
        Schema::dropIfExists('persona');
    }
}
