<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa', 7); //Não coloquei unique devido aos registros softdelete
            $table->decimal('renavam', 11, 0);
            $table->string('modelo', 50);
            $table->string('marca', 50);
            $table->year('ano');
            $table->unsignedBigInteger('proprietario')->nullable();
            $table->foreign('proprietario')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
