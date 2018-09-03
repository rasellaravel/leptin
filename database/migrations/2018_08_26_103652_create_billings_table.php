<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('country')->nullable();
            $table->string('street_address1')->nullable();
            $table->string('street_address2')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('o_note')->nullable();
            $table->string('p_method')->nullable();
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
        Schema::dropIfExists('billings');
    }
}
