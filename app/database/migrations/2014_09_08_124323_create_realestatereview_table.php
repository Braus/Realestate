<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealestatereviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('realestatereview', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('realestateId');
			$table->integer('userId');
			$table->date('reviewDate');
			$table->date('contractStart');
			$table->date('contractEnd');
			$table->string('realestate');
			$table->double('cost');
			$table->text('reason');
			$table->text('comment');
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
		Schema::drop('realestatereview');
	}

}
