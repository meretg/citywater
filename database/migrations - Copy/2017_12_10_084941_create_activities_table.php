<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['call','visit','email']);
            $table->enum('status',['open','onProgress','upComing','finished','overDue']);
            $table->date('Date');
            $table->text('textInput');
            $table->text('comments');
            $table->integer('clientId')->unsigned()->nullable();
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
        Schema::dropIfExists('activities');
    }
}
