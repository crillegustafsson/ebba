<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('system/app');
	}

public function test()
{
	return view('sign/1');
}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function logout()
	{
		return view('auth/login');
	}



	/*** Inleverans. */

	public function inleverans()
	{
		return view('system/inleverans');
	}

	/*** Packa bil. */

	public function packabil()
	{
		return view('system/packabil');
	}

	/*** Saldo. */

	public function saldo()
	{
		return view('system/saldo');
	}

	/*** Runda. */

	public function rundor()
	{
		return view('system/rundor');
	}

	/*** Utleverans. */

	public function utleverans()
	{
		return view('system/utleverans');
	}

	/*** Kunder. */

	public function kunder()
	{
		return view('system/kunder');
	}

	/*** Om ebba. */

	public function omebba()
	{
		return view('system/omebba');
	}


}
