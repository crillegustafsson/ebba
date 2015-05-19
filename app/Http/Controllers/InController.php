<?php namespace App\Http\Controllers;
use App\Product;
use App\Storage;
use App\ProductStorage;
use App\Transaction;
use Input;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class InController extends Controller {


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
		return view('system/inleverans');
	}


	public function getProducts()
	{
		return Product::all();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			$products_id = Input::get('products_id');
			$storages_id = Input::get('storages_id');
			$quantity = Input::get('newQuant');
			$from = Input::get('from');
			$user_id = Auth::user()->id;			

				$p = ProductStorage::where('storages_id', '=', $storages_id)->where('products_id', '=', $products_id)->get();

			//om $p finns ej produkten i aktuellt till lager
			if($p->isEmpty()){
				

				if($from >= 1)
				{
					//minska FRÅN lager skapa produkten i TILL lager (flytt mellan lager)
					$q1 = ProductStorage::create(['storages_id' => $storages_id, 'products_id' => $products_id, 'quantity' => $quantity]);
					 $q2 = ProductStorage::where('products_id', '=', $products_id)->where('storages_id', '=', $from)->decrement('quantity', $quantity);

					 //lägg till i produkten i transaktionstabellen
					 $q3 = Transaction::create(['storages_id' => $storages_id, 'products_id' => $products_id, 'newQuant' => $quantity, 'from' => $from, 'users_id' => $user_id]);
					return  $q1.$q2.$q3;
					
				}else
				{
					//skapa produktern i huvudlager om den ej existerar (inleverans)
					return ProductStorage::create(['storages_id' => $storages_id, 'products_id' => $products_id, 'quantity' => $quantity]);
					
				}

			}else{

			

			 if($from >= 1)
				{
					//minska FRÅN lager öka TILL lager (flytt mellan lager)
					$q1 = ProductStorage::where('products_id', '=', $products_id)->where('storages_id', '=', $from)->decrement('quantity', $quantity);
					$q2 = ProductStorage::incrementValue($products_id, $storages_id, $quantity);
					
					//lägg till i produkten i transaktionstabellen
					 $q3 = Transaction::create(['storages_id' => $storages_id, 'products_id' => $products_id, 'newQuant' => $quantity, 'from' => $from, 'users_id' => $user_id]);
					
					
				}
				else
				{
					//öka saldo i huvudlager (inleverans)
					return ProductStorage::incrementValue($products_id, $storages_id, $quantity);
					 
				}
			};
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function done()
	{
		$from = Input::get('from');
		$users_id = Auth::user()->id;
		$transactions = Transaction::where('users_id', $users_id)->delete();
		//$transactions->delete();
		return 'done';
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$users_id = Auth::user()->id;
		if($id == 0)
		{
			return Transaction::where('users_id', $users_id)->where('from' , 0)->get();
		}
		else
		{
			return Transaction::join('products', 'products.id', '=', 'transactions.products_id')
							->join('storages AS To', 'To.id', '=', 'transactions.storages_id')
							->where('users_id', $users_id)->get();
		}
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
			$products_id = Input::get('products_id');
			$storages_id = Input::get('storages_id');
			$newQuant = Input::get('newQuant');
			$oldQuant = Input::get('oldQuant');
			$from = Input::get('from');
			$user_id = Auth::user()->id;

		
			if($oldQuant < $newQuant)
			{
				$quantity = $newQuant - $oldQuant;

				if($from >= 1)
				{
					// minska saldot i FRÅN lagret öka i TILL lagret (flytt mellan lager)
					$q1 = ProductStorage::where('products_id', '=', $products_id)->where('storages_id', '=', $storages_id)->increment('quantity', $quantity);
					$q2 = ProductStorage::where('products_id', '=', $products_id)->where('storages_id', '=', $from)->decrement('quantity', $quantity);

					//lägg till i produkten i transaktionstabellen
					 $q3 = Transaction::where('products_id', $products_id)->where('users_id', $user_id)->increment('newQuant', $quantity);
					 return $q1 . $q2 . $q3;
				}
				else
				{
				// öka saldo i huvudlager (inleverans)
				return ProductStorage::incrementValue($products_id, $storages_id, $quantity);
				
				}
				
			}
			else
			{
				// resultaten är det värde som ska minskas/ökas med
				$quantity = $oldQuant - $newQuant;
				if($from >= 1)
				{
					// minska saldot i TILL lagret öka i FRÅN lagret (flytt mellan lager)
					$q1 = ProductStorage::where('products_id', '=', $products_id)->where('storages_id', '=', $storages_id)->decrement('quantity', $quantity);
					$q2 = ProductStorage::where('products_id', '=', $products_id)->where('storages_id', '=', $from)->increment('quantity', $quantity);
					
					$q3 = Transaction::where('products_id', $products_id)->where('users_id', $user_id)->decrement('newQuant', $quantity);
					return $q1 . $q2 . $q3;; 
				}
				else
				{
					// minska saldo i huvudlager (inleverans)
					ProductStorage::DecrementValue($products_id, $storages_id, $quantity);
				}
			
				
			}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
			$products_id = Input::get('products_id');
			$storages_id = Input::get('storages_id');
			$quantity = Input::get('newQuant');
			$from = Input::get('from');
			$user_id = Auth::user()->id;

		if($from >= 1)
		{
			// minska saldot i TILL lagret öka i FRÅN lagret (flytt mellan lager)
			$q1 = ProductStorage::where('products_id', '=', $products_id)->where('storages_id', '=', $storages_id)->decrement('quantity', $quantity);
			$q2 = ProductStorage::where('products_id', '=', $products_id)->where('storages_id', '=', $from)->increment('quantity', $quantity);
			
			$q3 = Transaction::where('products_id', '=', $products_id)->where('users_id', $user_id)->forceDelete();
			return $q1 . $q2 . $q3; 

		}
		else
		{
			// minska saldo i huvudlager (inleverans)
			return ProductStorage::DecrementValue($products_id, $storages_id, $quantity);

		}			
			
	}

}
