<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('products_id');
			$table->integer('customers_id');
			$table->integer('quantity');
			$table->boolean('nd');
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
		Schema::drop('product_customers');
	}

}
