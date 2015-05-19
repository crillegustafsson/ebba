<?php namespace App\Http\Controllers;

use App\Customer;
use App\Comment;
use App\Customer_route;
use App\Route;
use Auth;
use DB;
use Input;
use App\Http\Requests;
use App\onGoingRoute;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RoutesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
    {
       	$this->middleware('auth');
        $this->middleware('check', ['only' => 'index']);
    }


	public function index()
	{

			$rundor = Route::all();
			return view('system/rundor', compact('rundor'));
	}

	public function getCustomerToRoute() 
	{
		$kunder = Customer::all();
		
		return view('system/runda', compact('kunder'));
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Responses
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
		$id = Input::get('id');
		
		Auth::user()->storages_id = $id;
		Auth::user()->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$route = Route::find($id);
		return view('system/runda', compact('id', 'route'));

	}

	public function getCustomers($id)
	{
		//return onGoingRoute::with('comments')->get();

		$cost = onGoingRoute::with('comments')
		->join('routes', 'routes.id', '=', 'on_going_routes.routes_id')
		->where('on_going_routes.routes_id', $id)->get();

		// ->join('customers', 'customers.id', '=', 'customer_route_temps.customers_id')
		// ->where('routes_id', $id)->get();

		if($cost->isEmpty())
		{
				$rundor = Customer::where('routes_id', $id)->get();
				$user_id = Auth::user()->id;
			foreach ($rundor as $runda) {

				onGoingRoute::create([
					
					'customer_id' => $runda->id,
					'company' => $runda->company,
					'city' => $runda->city,
					'adress' => $runda->adress,
					'phone' => $runda->phone,
					'callupCustomer' => $runda->callupCustomer,
					'orderCustomer' => $runda->orderCustomer,
					'routes_id' => $runda->routes_id,
					'sort' => $runda->sort,
					'users_id' => $user_id
					]);

			}
		
			}



			return onGoingRoute::with('comments')
		->join('routes', 'routes.id', '=', 'on_going_routes.routes_id')
		->where('on_going_routes.routes_id', $id)->get();

		


		
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
	public function update()
	{
		$user = Auth::user()->id;
		$customers = Input::all();

		
		foreach ($customers['customers'] as $customer) {
			
			if($customer['company'] == $customers['toAdd']['company'])
			{
				
				OnGoingRoute::create([
			'customer_id' => $customers['toAdd']['id'],
			'company' => $customers['toAdd']['company'],
			'city' => $customers['toAdd']['city'],
			'adress' => $customers['toAdd']['adress'],
			'phone' => $customers['toAdd']['phone'],
			'callupCustomer' => $customers['toAdd']['callupCustomer'],
			'orderCustomer' => $customers['toAdd']['orderCustomer'],
			'routes_id' => $customers['toAdd']['routes_id'],
			'sort' => $customers['toAdd']['sort'],
			'users_id' => Auth::user()->id
			]);
			}
			else
			{
			 DB::table('on_going_routes')
			->where('customer_id', '=', $customer['customer_id'])->update(['sort' => $customer['sort']]);
			// echo $customer['company'];
			}
				
		}	

	//return $customers;
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function insert()
	{
			$customer = Input::all();
		OnGoingRoute::create([
			'customer_id' => $customer['id'],
			'company' => $customer['company'],
			'city' => $customer['city'],
			'adress' => $customer['adress'],
			'phone' => $customer['phone'],
			'callupCustomer' => $customer['callupCustomer'],
			'orderCustomer' => $customer['orderCustomer'],
			'routes_id' => $customer['routes_id'],
			'sort' => $customer['sort'],
			'users_id' => Auth::user()->id
			]);
		//return Input::all();
	}


	public function deleteCustomerRoute()
	{
		$user_id = Auth::user()->id;
		$id = Input::get('customer_id');
		
		return onGoingRoute::where('customer_id', '=', $id)->where('users_id', $user_id)->delete();
	}

	public function destroy()
	{
		$user_id = Auth::user()->id;
		$rid = Input::get(0);
		

		onGoingRoute::where('routes_id', '=', $rid)->where('users_id', $user_id)->delete();

		Auth::user()->storages_id = NULL;
		Auth::user()->save();
		//return $rid;
	}

}
