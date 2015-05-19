<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('company');
			$table->string('city');
			$table->string('adress');
			$table->integer('phone');
			$table->string('mail');
			$table->integer('orgnr');
			$table->string('owner');
			$table->boolean('callupCustomer');
			$table->boolean('orderCustomer');
			$table->integer('routes_id');
			$table->integer('sort');
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
		Schema::drop('customers');
	}

}
