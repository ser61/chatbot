<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('curso', function (Blueprint $table) {
      $table->increments('id');
      $table->char(20);
      $table->tinyInteger('capacidad');
      $table->char('paralelo', 40);
      $table->integer('colegio_id');
      $table->integer('turno_id');
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
    Schema::dropIfExists('curso');
  }
}
