<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColegioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegio', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nombre',50);
            $table->char('codigo_seduca',50);
            $table->char('tipo_colegio',1);
            $table->char('telefono',10);
            $table->char('departamento', 20);
            $table->char('ciudad',200 );
            $table->char('ubicacion',255 );
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
        Schema::dropIfExists('colegio');
    }
}
