<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealestateimageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('realestateimage', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('realestateId');
			$table->integer('userId');
			$table->string('fileName');
			$table->string('fileNameMini');
			$table->string('contractEnd');
			$table->integer('isApproved');
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
		Schema::drop('realestateimage');
	}

}
