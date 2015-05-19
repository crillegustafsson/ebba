<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model {

	protected $fillable = [

		'storageName',
		'created_at',
		'updated_at'
	];
	

	public function product_storages() {

		return $this->hasMany('App\ProductStorage');

	}

	public function transactions()
	{
		
		return $this->hasMany('App\Transaction');
	}

	public function users()
	{
		
		return $this->hasMany('App\User');
	}

}