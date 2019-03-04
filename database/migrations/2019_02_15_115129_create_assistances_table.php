<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistances', function (Blueprint $table) {
            $table->increments('ID_Asis');
            $table->date('AsisFecha');
            $table->dateTime('AsisLlegada');
            $table->dateTime('AsisSalida')->nullable();
            $table->integer('AsisNocturnas')->nullable();
            $table->boolean('AsisStatus');
            $table->unsignedInteger('FK_AsisPers');
            $table->foreign('FK_AsisPers')->references('ID_Pers')->on('personals');
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
        Schema::dropIfExists('assistances');
    }
}
