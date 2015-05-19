<?php

/*§
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('hem', array('uses' => 'HomeController@index', 'as' => 'hem'));
Route::get('saldo', array('uses' => 'StoragesController@index', 'as' => 'saldo'));
Route::post('/updateSaldo/saldoUpdateAdmin/{id}', array('uses' => 'StoragesController@updateSaldoAdmin', 'as' => 'updateSaldoAdmin'));
Route::get('/updateSaldo/{id}', array('uses' => 'StoragesController@updateSaldo', 'as' => 'updateSaldo'));
Route::get('kunder', array('uses' => 'CustomersController@index', 'as' => 'kunder'));
Route::get('test', array('uses' => 'HomeController@test', 'as' => 'test'));
Route::get('adminpanel', array('uses' => 'AdminpanelController@index', 'as' => 'adminpanel'));
Route::post('/createRoute', array('uses' => 'AdminpanelController@createRoute', 'as' => 'createRoute'));
Route::post('/createProduct', array('uses' => 'AdminpanelController@createProduct', 'as' => 'createProduct'));
Route::post('adminUpdateProduct/updateProduct/{id}', array('uses' => 'AdminpanelController@updateProduct', 'as' => 'updateProduct'));
Route::post('/createStorage', array('uses' => 'AdminpanelController@createStorage', 'as' => 'createStorage'));
Route::post('/createCustomer', array('uses' => 'AdminpanelController@createCustomer', 'as' => 'createCustomer'));

Route::post('/signCustomer', array('uses' => 'SignController@signCustomer', 'as' => 'signCustomer'));

Route::get('kundinformation/{id}', array('uses' => 'CustomersController@show', 'as' => 'kundinformation'));

Route::get('inleverans', array('uses' => 'InController@index', 'as' => 'inleverans'));
Route::get('getAllProducts', 'InController@getProducts');

Route::get('getCustomers/{id}', 'CustomersController@getCustomers');
Route::get('getAllCustomers/{id}', 'CustomersController@showAll');
Route::get('GetProduct/{id}', 'PackaController@getProducts');
Route::get('getComments/{id}', 'CommentsController@getComments');
Route::get('transactions/{id}', 'InController@show');
Route::get('getStorages', 'StoragesController@show');


Route::get('packabil', array('uses' => 'HomeController@packabil', 'as' => 'packabil'));
Route::get('lager', array('uses' => 'StoragesController@index', 'as' => 'lager'));

Route::get('rundor', array('uses' => 'RoutesController@index', 'as' => 'rundor'));
Route::get('runda/{id}', array('uses' => 'RoutesController@show', 'as' => 'runda'));

Route::get('order/{id}', array('uses' => 'orderController@index', 'as' => 'order'));
Route::get('sign/{id}', array('uses' => 'orderController@show', 'as' => 'sign'));
Route::get('change/{id}', array('uses' => 'orderController@edit', 'as' => 'change'));
Route::get('getReceipt/{id}', 'orderController@getReceipt');
Route::get('updateOrder', 'orderController@update');

Route::get('getCustomersInRoutes/{id}', 'RoutesController@getCustomers');

//Route::get('runda/{id}', array('uses' => 'RoutesController@getCustomerToRoute', 'as' => 'runda'));

Route::get('utleverans', array('uses' => 'HomeController@utleverans', 'as' => 'utleverans'));
Route::get('omebba', array('uses' => 'HomeController@omebba', 'as' => 'omebba'));

Route::get('adminUpdateProduct/{id}', array('uses' => 'AdminpanelController@update', 'as' => 'adminUpdateProduct'));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

	// POST

Route::post('postComments', 'CommentsController@create');
Route::post('updateRoutesCustomer', 'RoutesController@update');
Route::post('insertRoutesCustomer', 'RoutesController@insert');
Route::post('deleteCustomerRoute', 'RoutesController@deleteCustomerRoute');
Route::post('insertRouteStorage', 'RoutesController@store');
Route::post('finished', 'RoutesController@destroy');
Route::post('updateCreate', 'InController@create');
Route::post('deleteProduct', 'InController@destroy');
Route::post('updateProduct', 'InController@update');
Route::post('deleteTransaction', 'InController@done');
Route::post('deleteComment', 'CommentsController@destroy');

Route::post('updateCreate', 'InController@create');
Route::post('deleteProduct', 'InController@destroy');

Route::post('createOrder', 'orderController@create');



Route::get('ordermail', array('uses' => 'PrintController@show', 'as' => 'ordermail'));
	
	// PDF
Route::get('pdf/{id}', 'PrintController@index');


/*Route::get('mail', function() {


});*/