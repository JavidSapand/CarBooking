<?php
use App\User;

/*
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

Route::get('home', 'HomeController@index');
Route::get('admin', function(){
	$users = User::all();
	return View::make('admin.home', compact('users'));
});
Route::post('ajax/edit', function(){
	 if(Request::ajax()){
        return "AJAX";
    }
    return "HTTP";
	
});

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
