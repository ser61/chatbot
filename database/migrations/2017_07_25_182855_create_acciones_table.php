<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccionesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('acciones', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('bitacora_id');
      $table->time('hora');
      $table->string('accion');
      $table->char('table', 20)->nullable();
      $table->integer('id_tupla')->nullable();
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
    Schema::dropIfExists('acciones');
  }
}
