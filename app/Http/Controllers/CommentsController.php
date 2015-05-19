<?php namespace App\Http\Controllers;

use App\HomeController;
use Input;
use App\Comment;
use App\Customer;
use App\Customer_route;
use App\Route;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentsController extends Controller {

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

	}

	public function getComments($id)
	{


		if($id == 'a')
		{

			return Comment::all(array('comment', 'customer_id'));
			
		}
		else
		{
			return Comment::where('customer_id', $id)->get();
			
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$comment = Input::get('comment');
		$customer_id = Input::get('customer_id');
		return Comment::create([
			'comment' => $comment,
			'customer_id' => $customer_id
			]);

		// $test = Input::get('customers_id');
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $
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
	public function destroy()
	{
		$comment = Input::get('comment');
		$customer = Input::get('customer_id');
		return Comment::where('comment' , $comment)->where('customer_id' , $customer)->delete();
	}


}