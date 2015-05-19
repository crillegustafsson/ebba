<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRoute extends Model {

	public function routes() {

		return $this->belongsTo('App\Route');

	}

	public function customers() {

		return $this->belongsTo('App\Customer');

	}

}