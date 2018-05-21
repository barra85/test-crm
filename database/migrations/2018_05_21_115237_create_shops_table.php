<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('visitor_street');
            $table->string('visitor_house_number');
            $table->string('visitor_zip');
            $table->string('visitor_place');
            $table->integer('visitor_country_id')->unsigned();
            $table->string('invoice_street');
            $table->string('invoice_house_number');
            $table->string('invoice_zip');
            $table->string('invoice_place');
            $table->integer('invoice_country_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('visitor_country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('invoice_country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
