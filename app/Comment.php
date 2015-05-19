<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $fillable = ['comment', 'customer_id'];

	public function customers() {

		return $this->belongsTo('App\Customer');

	}

	public function onGoingRoutes() {

		return $this->belongsTo('App\OnGoingRoute', 'customers_id');

	}	


}
