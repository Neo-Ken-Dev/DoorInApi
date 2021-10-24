<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmeubleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Immeubles', function (Blueprint $table) {
            $table->id();
            $table->integer('nb_residents')->nullable();
            $table->integer('nb_flats')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
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
        Schema::dropIfExists('Immeuble');
    }
}
