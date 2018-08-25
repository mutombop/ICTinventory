<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName', 30);
            $table->string('lastName', 30);
            $table->string('title', 40);
            $table->integer('section_id')->unsigned()->nullable();
            $table->integer('dutystation_id')->length(2)->unsigned();
            $table->string('emailAddress', 50)->unique()->nullable();
            $table->integer('mobileNumber')->length(10)->unsigned()->nullable();
            $table->integer('extension')->length(4)->unsigned()->nullable();
            $table->string('callsign', 20)->nullable();
            $table->string('roomNumber', 10)->nullable();
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('holders');
    }
}
