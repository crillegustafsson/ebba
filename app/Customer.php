<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

	protected $fillable = [

		'company',
		'city',
		'adress',
		'phone',
		'mail',
		'orgnr',
		'owner'

	];

	public function routes() {

		return $this->belongsTo('App\Route');

	}

	public function product_customers() {

		return $this->hasMany('App\ProductCustomers');

	}

	public function comments() {

		return $this->hasMany('App\Comment');

	}

	public function receipts()
	{
		return $this->hasOne('App\Receipt');
	}



}