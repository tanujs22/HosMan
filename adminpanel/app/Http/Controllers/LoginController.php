<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function showLogin()
    {
        return view('login');
	}
	public function loggedIn()
    {
		
		if(Auth::check()){
			if(Auth::user()->role=='MarAdmin'||Auth::user()->role=='root'){
			$user_name=Auth::user()->user_name;
	//		echo "$user_name";
			return view('admin')->with('name',Auth::user()->first_name." ".Auth::user()->last_name);
			}
			
			else
		{
			
			$rules = array(
					'user_name' => 'UnAuthorized Access',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
		}
		}
		else
		{
			
			$rules = array(
					'user_name' => 'Please Login First',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
		}
	}
	public function logOut()
    {
		
		Auth::logout();
		
		return Redirect::to('login');
	}
	public function doLogin()
    {
        //process the form
		$rules = array(
			'user_name' => 'required|alphanum|min:3',
			'password'  => 'required|min:3'
		);
		$message=array(
		'user_name.required' => 'User Name is required',
		'user_name.alphanum' => 'User Name cannot contain characters other than alphabets and numbers',
		'user_name.min:3' => 'User Name should contain atleast 3 characters',
		'password.min:3' => 'Password should contain atleast 3 characters',
        'password.required'  => 'Password is required'
		);
		$validator = Validator::make(Input::all(),$rules,$message);
		
		if($validator->fails()){
			return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
		}
		else{
			$userdata = array(
			'user_name'     => Input::get('user_name'),
			'password'  => Input::get('password')
		);

		// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				if(Auth::user()->role=='MarAdmin'){
				return Redirect::to('admin');
				}
				if(Auth::user()->role=='root'){
					return Redirect::to('maradmin');
				}
				if(Auth::user()->role=='HosAdmin'){
					return Redirect::to('hosadmin');
				}

			} 
			else {        

				$rules = array(
					'user_name' => 'Incorrect Login Details',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));

			}

		}
	}

}