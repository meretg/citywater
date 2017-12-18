<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRFQsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('RFQs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('serial');
          $table->string('RFQ_description');
          $table->enum('type',['station','visit','repair','view','parts']);
          $table->enum('status',['open','waitingMaterialList','waitingPricing','convertedToQuotation']);
          $table->foreign('clientId')->references('id')->on('clients')->onUpdate('cascade')
          ->onDelete('cascade');
          $table->rememberToken();
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
      Schema::dropIfExists('RFQs');
    }
}
