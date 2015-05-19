<?php namespace App\Http\Controllers;

use App\Comment;
use App\Customer;
use App\Customer_route;
use App\Route;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CustomersController extends Controller {

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
		// $kunder = Customer_route::with('routes')->with('customers')->get();
		$kunder = Customer::all();
		// $runda = Routes::find()
		return view('system/kunder', compact('kunder'));
		// return $kunder;

	}

	public function showAll($id)
	{
		return Customer::where('routes_id', '!=', $id)->get();
		
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

	public function getCustomers($id)
	{
		return Customer_route::join('customers', 'customers.id', '=', 'customer_routes.customers_id')->where('routes_id', '=', $id)->get();

	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$kundinformation = Customer::find($id);
		
		//$comment = Comment::where('customers_id', '=', $id)->get();
		return view('system/kundinformation', compact('kundinformation'));
		//return $kundinformation;

		// return $comment;

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
		//
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
