<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receipt_products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('products_id');
			$table->integer('receipts_id');
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
		Schema::drop('receipt_products');
	}

}
