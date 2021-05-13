<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefoundsTblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refounds_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('bank');
            $table->string('account_no');
            $table->string('form');
            $table->string('to');
            $table->string('train_number');
            $table->string('train_name');
            $table->string('seat_number');
            $table->string('journey_date');
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
        Schema::dropIfExists('refounds_tbl');
    }
}
