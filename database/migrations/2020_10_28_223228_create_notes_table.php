<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workbook_id');
            $table->foreign('workbook_id')->references('id')->on('workbooks')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('period_id');
            $table->foreign('period_id')->references('id')->on('periods')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('dateNote');
            $table->text('note');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('notes');
    }
}
