<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStorage extends Model {

	protected $fillable = ['products_id', 'storages_id', 'quantity'];

	public function storages() {

		return $this->belongsTo('App\Storage');

	}

	public function products() {

		return $this->belongsTo('App\Product');

	}

	
	// ProductStorage::incrementValue($products_id, $storages_id, $quantity);
	public function scopeIncrementValue($query, $products, $storages, $quantity)
	{
		return $query->where('products_id', '=', $products)->where('storages_id', '=', $storages)->increment('quantity', $quantity);

	}

	public function scopeDecrementValue($query, $products, $storages, $quantity)
	{
		return $query->where('products_id', '=', $products)->where('storages_id', '=', $storages)->decrement('quantity', $quantity);

	}

}
