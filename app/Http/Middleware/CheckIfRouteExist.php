<?php namespace App\Http\Middleware;
use Redirect;
use Closure;
use App\onGoingRoute;
use App\Route;
class CheckIfRouteExist {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
			$id_user = $request->user()->id;
		$tempRoute = onGoingRoute::where('users_id', $id_user)->get();

		if(!$tempRoute->isEmpty())
		{
			
			$id = $tempRoute[0]->routes_id;
			$route = Route::find($id);
			 return Redirect::to('runda/' . $id);
		//	return view('system/runda/$id', compact('id', 'route'));
			//return view('test');
		
		}

		return $next($request);
	}

}
