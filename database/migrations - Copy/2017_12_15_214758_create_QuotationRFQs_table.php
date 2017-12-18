<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationRFQsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('QuotationRFQs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('serial');
          $table->enum('status',['sentToClient','rejected','revised','accepted','convertedToProject']);
          $table->integer('clientId')->unsigned();
          $table->integer('RFQId')->unsigned();
          $table->foreign('clientId')->references('id')->on('clients')->onUpdate('cascade')
          ->onDelete('cascade');

          $table->foreign('RFQId')->references('id')->on('RFQs')->onUpdate('cascade')
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
        Schema::dropIfExists('QuotationRFQs');
    }
}
