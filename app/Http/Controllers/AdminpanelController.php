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
use Hash;


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


	public function createUser(CreateUserRequest $request)
	{
		User::create($request->all());

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


	// Se UPPDATERA kunder
	public function updateCustomer($id) {

		$allakunder = Customer::find($id);
		return view('system/updatecustomer', compact('allakunder'));

	}
	// UPPDATERA kunder
	public function updateCustomerDo($id) {

		$allakunder = Customer::find($id);

		$allakunder->company = Input::get('company');
		$allakunder->companyId = Input::get('companyId');
		$allakunder->city = Input::get('city');
		$allakunder->adress = Input::get('adress');
		$allakunder->phone = Input::get('phone');
		$allakunder->mail = Input::get('mail');
		$allakunder->orgnr = Input::get('orgnr');
		$allakunder->owner = Input::get('owner');
		$allakunder->callupCustomer = Input::get('callupCustomer');
		$allakunder->orderCustomer = Input::get('orderCustomer');
		$allakunder->created_at = Input::get('created_at');
		$allakunder->updated_at = Input::get('updated_at');
		$allakunder->routes_id = Input::get('routes_id');
		$allakunder->sort = Input::get('sort');
		$allakunder->gadress = Input::get('gadress');

		$allakunder->save();

		return redirect('/adminpanel');

	}

	// Update Runda
	public function updateRoute($id) {

		$allarundor = Route::find($id);
		return view('system/updateroute', compact('allarundor'));
	}

	public function updateRouteDo($id) {

		$allarundor = Route::find($id);

		$allarundor->name = Input::get('name');

		$allarundor->save();

		return redirect('/adminpanel');
	}

	// Update lager o bil
	public function updateStorage($id) {

		$lagerobil = Storage::find($id);
		return view('system/updatestorage', compact('lagerobil'));
	}

	public function updateStorageDo($id) {

		$lagerobil = Storage::find($id);

		$lagerobil->storageName = Input::get('storageName');

		$lagerobil->save();

		return redirect('/adminpanel');
	}

	// Update användare
	public function updateUser($id) {

		$allakonton = User::find($id);
		return view('system/updateuser', compact('allakonton'));
	}

	public function updateUserDo($id) {

		$allakonton = User::find($id);

		$allakonton->fname = Input::get('fname');
		$allakonton->sname = Input::get('sname');
		$allakonton->email = Input::get('email');
		$allakonton->password = Hash::make(Input::get('password'));
		$allakonton->isAdmin = Input::get('isAdmin');

		$allakonton->save();

		return redirect('/adminpanel');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	// TA BORT Produkt
	public function deleteProduct($id) {

		$allaprodukter = Product::find($id);

		return view('system/deleteproduct', compact('allaprodukter'));
	}

	public function deleteProductDo($id)
	{
		$allaprodukter = Product::find($id);

		$allaprodukter->delete();

		return redirect('/adminpanel');
	}

	// TA BORT Runda
	public function deleteRoute($id) {

		$allarundor = Route::find($id);

		return view('system/deleteroute', compact('allarundor'));
	}

	public function deleteRouteDo($id)
	{
		$allarundor = Route::find($id);

		$allarundor->delete();

		return redirect('/adminpanel');
	}

	// TA BORT Lager/bil
	public function deleteStorage($id) {

		$lagerobil = Storage::find($id);

		return view('system/deletestorage', compact('lagerobil'));
	}
	
	public function deleteStorageDo($id)
	{
		$lagerobil = Storage::find($id);

		$lagerobil->delete();

		return redirect('/adminpanel');
	}

	// TA BORT Kund
	public function deleteCustomer($id) {

		$allakunder = Customer::find($id);

		return view('system/deletecustomer', compact('allakunder'));
	}
	
	public function deleteCustomerDo($id)
	{
		$allakunder = Customer::find($id);

		$allakunder->delete();

		return redirect('/adminpanel');
	}

	// TA BORT Användare
	public function deleteUser($id) {

		$allakonton = User::find($id);

		return view('system/deleteuser', compact('allakonton'));
	}
	
	public function deleteUserDo($id)
	{
		$allakonton = User::find($id);

		$allakonton->delete();

		return redirect('/adminpanel');
	}

}