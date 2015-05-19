<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model {

	use SoftDeletes;


	protected $fillable = ['to', 'from', 'users_id' ,'products_id', 'storages_id', 'newQuant', 'deleted_at'];

	public function products()
	{
		
		return $this->BelongsTo('App\Product');
	}

	public function storages()
	{
		
		return $this->BelongsTo('App\Storages');
	}	
	
}
