<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;
	protected $redirectTo = 'admin.home';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	 /*  
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 1]))
		{
    		
            return redirect()->intended('admin.home');
		}
    }
    */

    public function postLogin(LoginRequest $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			if(\Auth::user()->user_type==1){
				return redirect('admin'); 
			}
			else{
				return redirect('/home');
			}
			
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
	}

	public function postRegister(RegisterRequest $request)
	{
		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}
		$user = new User();
		$user->email = $request['email'];
		$user->password = bcrypt($request['password']);
		$user->save();

		//$this->auth->login($this->registrar->create($request->all()));

		//return redirect($this->redirectPath());
				return redirect($this->loginPath());
	}

	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
	}

}
