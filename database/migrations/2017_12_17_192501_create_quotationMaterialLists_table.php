<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationMaterialListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('QuotationMaterialLists', function (Blueprint $table) {
          $table->increments('id');
          $table->string('serial');
          $table->string('item');
          $table->string('quantity');
          $table->string('purpose');
          $table->float('price');
          $table->float('sellingPrice');
          $table->integer('quotationId')->unsigned();
          $table->foreign('quotationId')->references('id')->on('QuotationRFQs')->onUpdate('cascade')
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
        Schema::dropIfExists('QuotationMaterialLists');
    }
}
