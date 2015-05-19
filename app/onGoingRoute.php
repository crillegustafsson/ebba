<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class onGoingRoute extends Model {


	protected $primaryKey = 'customer_id';

	protected $fillable = ['customer_id', 'company', 'city', 'adress', 'phone', 'callupCustomer', 'orderCustomer','routes_id','sort','users_id' ];


		public function routes() {

		return $this->belongsTo('App\Route');

	}

	public function comments() {

		return $this->hasMany('App\Comment', 'customer_id');

	}

}
