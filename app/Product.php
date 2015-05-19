<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = [

		'productName',
		'artnr',
		'price',
		'type',
		'quantitypackage',
		'miniQuant',
		'created_at',
		'updated_at'
	];
	
	public function product_storages() {

		return $this->hasMany('App\ProductStorage');

	}

		public function product_customers() {

		return $this->hasMany('App\ProductCustomers');

	}

	public function transactions() {

		return $this->HasMany('App\Transaction');

	}


}
