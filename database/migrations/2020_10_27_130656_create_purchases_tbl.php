<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('form');
            $table->string('to');
            $table->string('date');
            $table->string('class');
            $table->string('train_number');
            $table->string('train_name');
            $table->string('seat_number');
            $table->string('ticketing_date');
            $table->string('ticketing_time');
            $table->string('tnx_id');
            $table->string('status');
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
        Schema::dropIfExists('purchases_tbl');
    }
}
