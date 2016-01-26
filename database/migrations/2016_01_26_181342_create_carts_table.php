<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            
			$table->integer('user_id');
			$table->string('bill_address');
			$table->string('bill_city');
			$table->string('bill_zip');
			$table->string('bill_state');
			$table->string('ship_address');
			$table->string('ship_city');
			$table->string('ship_zip');
			$table->string('ship_state');
			$table->string('pay_method');
			$table->integer('total');

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
        Schema::drop('carts');
    }
}
