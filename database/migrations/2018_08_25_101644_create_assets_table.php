<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inventorytag', 6)->unique();
            $table->integer('amr')->length(7)->unique();
            $table->integer('assettype_id');
            $table->integer('assetmodel_id');
            $table->string('serialnumber', 50)->unique();
            $table->integer('holder_id');
            $table->integer('po_id');
            $table->decimal('price', 7, 2)->nullable();
            $table->mediumText('comment')->nullable();
            $table->string('psbstatus')->default('NONE');
            $table->string('psbproposal')->nullable();
            $table->integer('psb_id')->length(3)->nullable();
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
        Schema::dropIfExists('assets');
    }
}
