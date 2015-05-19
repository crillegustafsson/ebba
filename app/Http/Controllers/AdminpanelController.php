<?php namespace App\Http\Controllers;

use App\Http\Middleware\CheckIfIsAdmin;
use Auth;
use App\Product;
use App\ProductStorage;
use App\Route;
use App\Storage;
use App\Customer;
use App\User;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\CreateRouteRequest;
use App\Http\Requests\CreateStorageRequest;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\CreateUserRequest;
use Request;
use App\Http\Controllers\Controller;
use Input;


class AdminpanelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	public function index()
	{
		$allaprodukter = Product::all();
		//$allaprodukter = ProductStorage::join('products', 'products.id', '=', 'product_storages.products_id')->where('product_storages.storages_id', '=', '1')->get();
		$allarundor = Route::all();
		$lagerobil = Storage::all();
		$allakunder = Customer::all();
		$allakonton = User::all();
		return view('system/adminpanel', compact('helalagret', 'allarundor', 'lagerobil', 'allakunder', 'allakonton', 'allaprodukter'));
		//return $allaprodukter;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function createRoute(CreateRouteRequest $request)
	{
		Route::create($request->all());

		return Redirect('adminpanel');
	}


	/* Kolla ifall fälten är ifyllda eller inte */

	public function createProduct(CreateProductRequest $request)
	{
		Product::create($request->all());

		return Redirect('adminpanel');
	}


	public function createStorage(CreateStorageRequest $request)
	{
		Storage::create($request->all());

		return Redirect('adminpanel');
	}


	public function createCustomer(CreateCustomerRequest $request)
	{
		Customer::create($request->all());

		return Redirect('adminpanel');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	public function update($id)
	{
		$allaprodukter = Product::find($id);

		//return $allaprodukter;
		return view('system/update', compact('allaprodukter'));
	}

	public function updateProduct($id) {


		$allaprodukter = Product::find($id);

		$allaprodukter->productName = Input::get('productName');
		$allaprodukter->artnr = Input::get('artnr');
		$allaprodukter->price = Input::get('price');
		// $allaprodukter->quantitypackage = Input::get('quantitypackage');
		// $allaprodukter->miniQuant = Input::get('miniQuant');



		//Input::get('quantity');
		
		$allaprodukter->save();

		return redirect('/adminpanel');

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
