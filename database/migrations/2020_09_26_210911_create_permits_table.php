<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->boolean('create_folio')->default(false);
            $table->boolean('create_dailyreport')->default(false);
            $table->boolean('create_note')->default(false);
            $table->boolean('create_comment')->default(false);
            $table->boolean('print_dailyreport')->default(false);
            $table->boolean('print_note')->default(false);
            $table->boolean('print_folio')->default(false);
            $table->boolean('edit_sequence')->default(false);
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
        Schema::dropIfExists('permits');
    }
}
