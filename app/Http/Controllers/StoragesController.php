<?php namespace App\Http\Controllers;

use App\Storage;
use App\Product;
use App\ProductStorage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

use Illuminate\Http\Request;

class StoragesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{

		$huvudlager = ProductStorage::with('storages')->with('products')->where('storages_id' ,'=', '1')->get();
		$bil1 = ProductStorage::with('storages')->with('products')->where('storages_id' ,'=', '2')->get();
		$bil2 = ProductStorage::with('storages')->with('products')->where('storages_id' ,'=', '3')->get();
		$bil3 = ProductStorage::with('storages')->with('products')->where('storages_id' ,'=', '4')->get();

		return view('system/saldo', compact('huvudlager', 'bil1', 'bil2', 'bil3'));
		// return $huvudlager;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		return Storage::all();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateSaldo($id)
	{
		$saldot = ProductStorage::where('products_id' ,'=', $id)->where('storages_id', '=', '1' )->first();

		//return $saldot;
		return view('system/updatesaldo', compact('saldot'));


	}

	public function updateSaldoAdmin($id) {


		$saldot = ProductStorage::where('products_id' ,'=', $id)->where('storages_id', '=', '1' )->first();

		$saldot->quantity = Input::get('quantity');

		$saldot->save();

		return redirect('/saldo');

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
