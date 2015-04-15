<?php
use App\User;
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('admin', function(){
	$users = User::all()->where('confirm','=', 0);
	return View::make('admin.home', compact('users'));
});
Route::get('ajax/edit/{id}', 'UserController@edit');
Route::get('ajax/remove/{id}', 'UserController@destroy');

// Route::get('booking','BookingController@index');
// Route::get('booking/create','BookingController@create');

// Route::get('booking/{id}','BookingController@show');
// Route::get('booking/{id}/edit','BookingController@edit');

Route::resource('booking','BookingController');
Route::post('booking/store','BookingController@store');




	Route::controllers([
	'auth' => 'Auth\AuthController',
 	'password' => 'Auth\PasswordController',
]);
    Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',

]);
