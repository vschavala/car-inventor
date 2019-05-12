<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carmodels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_name');
            $table->unsignedBigInteger('manufacturer_id');
            $table->string('color')->nullable();
            $table->integer('year')->nullable();
            $table->string('registration_number')->default(0);
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->timestamps();

           
           $table->foreign('manufacturer_id')->references('id')->on('manufacturers'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carmodels');
    }
}
