<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Receipt;
use App\ReceiptProduct;
use App\ProductStorage;
use Input;
use Auth;
use Redirect;
use Illuminate\Http\Request;

class orderController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$customer = Customer::find($id);
		return view('system/order', compact('id', 'customer'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 
			// $products_id = Input::get('products_id');
			// $quantity = Input::get('newQuant');
			// $from = Input::get('from');
			// $user_id = Auth::user()->id;

		 // ProductStorage::where('products_id', '=', $products_id)->where('storages_id', '=', $from)->decrement('quantity', $quantity);
		$orders = Input::all();


			$receipt = new Receipt;
			
				$receipt->customers_id 	= $orders[0]['customer'];
				$receipt->users_id	= Auth::user()->id;
				$receipt->save();


		foreach ($orders as $order) {
			ReceiptProduct::create([
				'products_id' 	=> $order['products_id'],
				'receipts_id' 	=> $receipt->id,
				'nd'			=> $order['nd'],
				'quantity'		=> $order['newQuant']
				]);

			ProductStorage::where('products_id', '=', $order['products_id'])->where('storages_id', '=', $order['from'])->decrement('quantity', $order['newQuant']);
		 }
		 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	public function getReceipt($id)
	{
		return ReceiptProduct::join('products', 'products.id', '=', 'receipt_products.products_id')->where('receipts_id', $id)->get();
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
// 		$customer = Receipt::where('customers_id', $id)->join('customers', 'customers.id', '=', 'receipts.customers_id')->first();
// 		$last = $customer->orderBy('created_at', 'desc')->first();
		
// 		$order = ReceiptProduct::join('products', 'products.id', '=', 'receipt_products.products_id')->where('receipts_id', $last->id)->get();
		return view('system/sign', compact('id'));
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('system/change', compact('id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$orders = Input::all();
		return $orders;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
