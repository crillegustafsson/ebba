<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptProduct extends Model {


	protected $fillable = ['receipts_id', 'products_id', 'nd', 'quantity'];

	public function customers() {

		return $this->belongsTo('App\Customer');

	}
		public function receipts() {

		return $this->belongsTo('App\Receipt');

	}

	public function products() {

		return $this->belongsTo('App\Product');


}
}
