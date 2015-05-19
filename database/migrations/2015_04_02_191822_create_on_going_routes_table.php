<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnGoingRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('on_going_routes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('company');
			$table->string('city');
			$table->string('adress');
			$table->integer('phone');
			$table->boolean('callupCustomer');
			$table->boolean('orderCustomer');
			$table->integer('routes_id');
			$table->integer('sort');
			$table->integer('users_id');
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
		Schema::drop('on_going_routes');
	}

}
