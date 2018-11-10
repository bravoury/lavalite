<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateSellersTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: sellers
         */
        Schema::create('sellers', function ($table) {
            $table->increments('id');
            $table->integer('order')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('keywords', 255)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('sellers');
    }
}
