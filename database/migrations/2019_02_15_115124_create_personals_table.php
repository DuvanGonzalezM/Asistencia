<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('ID_Pers')->unique();
            $table->boolean('PersType');
            $table->string('PersDocType',6);//Tipo de datos CC CE NIT RUT
            $table->string('PersDocNumber',25)->unique();
            $table->string('PersFirstName',64);
            $table->string('PersSecondName',64)->nullable();
            $table->string('PersLastName',64);
            $table->string('PersEmail');
            $table->string('PersLibreta',25)->nullable();
            $table->string('PersPase',5)->nullable();
            $table->date('PersBirthday')->nullable();
            $table->string('PersPhoneNumber',20)->nullable();
            $table->string('PersCellphone',20)->nullable();
            $table->string('PersAddress')->nullable();
            $table->string('PersEPS')->nullable();
            $table->string('PersARL')->nullable();
            $table->string('PersBank')->nullable();
            $table->string('PersBankAccaunt',64)->nullable();
            $table->date('PersIngreso')->nullable();
            $table->date('PersSalida')->nullable();
            $table->string('PersSlug')->unique();
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
        Schema::dropIfExists('personals');
    }
}
