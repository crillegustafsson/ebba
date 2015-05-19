<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCustomer extends Model {

	protected $fillable = ['products_id', 'customers_id', 'nd', 'quantity'];

	public function customers() {

		return $this->belongsTo('App\Customer');

	}
		public function histories() {

		return $this->belongsTo('App\History');

	}

	public function products() {

		return $this->belongsTo('App\Product');

	}


}
