<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('period_id');
            $table->foreign('period_id')->references('id')->on('periods')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('dateFrom');
            $table->dateTime('dateTo');
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
        Schema::dropIfExists('period_locations');
    }
}
