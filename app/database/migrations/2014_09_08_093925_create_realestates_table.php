<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealestatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('realestates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('streetNumber');
			$table->integer('unitNumber');
			$table->string('streetName');
			$table->string('streetSufix');
			$table->string('houseType');
			$table->string('suburb');
			$table->integer('postcode');
			$table->string('state');
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
		Schema::drop('realestates');
	}

}
