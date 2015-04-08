<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		
		return User::create([
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			
		]);

		/*
	$user = new User;
	$user->user_name = $data['user_name'];
	$user->password = bcrypt($data['password']);
	$user->confirm = 1;
	$user->user_type = 1;
	$user->save();

	*/
	}

}
