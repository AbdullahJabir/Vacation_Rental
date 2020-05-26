<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_name');
            $table->string('max_person');
            $table->string('size');
            $table->string('view');
            $table->string('bed');
            $table->integer('status');
            $table->string('image');
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
        Schema::dropIfExists('apartment_rooms');
    }
}
