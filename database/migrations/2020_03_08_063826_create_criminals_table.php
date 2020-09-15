<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->string('national_id')->nullable();
            $table->integer('age')->nullable();
            $table->longText('details');
            $table->string('gender')->nullable();
            $table->string('location');
            $table->bigInteger('crime_id')->unsigned();
            $table->bigInteger('station_id')->unsigned();
            $table->mediumText('pic')->nullable();
            $table->bigInteger('police_id')->unsigned();
            $table->boolean('is_loose');

            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('cascade');
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
            $table->foreign('police_id')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('criminals');
    }
}
