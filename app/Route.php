<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model {

	protected $fillable = [

		'name',
		'created_at',
		'updated_at'
	];
	
	public function customers() {

		return $this->hasMany('App\Customer');

	}

	public function onGoingRoutes() {

		return $this->hasMany('App\OnGoingRoute');

	}
}