<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model {

		protected $fillable = [

		'customers_id',
		'users_id',
	];
	
	public function receipt_products() {

		return $this->hasMany('App\ReceiptProduct');

	}	

	public function customers()
	{
		return $this->hasOne('App\Customer');
	}

}
