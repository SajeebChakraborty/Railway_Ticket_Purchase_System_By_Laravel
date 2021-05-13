<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('train_number');
            $table->string('train_name');
            $table->string('arrival_station');
            $table->string('destination_station');
            $table->string('arrival_time');
            $table->string('destination_time');
            $table->string('class');
            $table->string('seat_no');
            $table->double('price');
            $table->string('booking_user')->nullable();
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
        Schema::dropIfExists('tickets_tbl');
    }
}
