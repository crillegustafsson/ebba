<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model {

	protected $fillable = [

		'customers_id',
		'users_id',
	];
	
	public function product_storages() {

		return $this->hasMany('App\ProductStorage');

	}

}
