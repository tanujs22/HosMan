<?php 
namespace App\Http\Controllers;

use DB;
use Session;
use App\Hospital;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class RootController extends Controller {
	
	
	/*
	|--------------------------------------------------------------------------
	| Hospital Controller
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
	 //To return to the view for taking in the entries
	public function loggedIn(){
		if(Auth::check())
			if(Auth::user()->role=='root')
			return view('root.dashboard')->with('name',Auth::user()->first_name." ".Auth::user()->last_name);
			else{
				$rules = array(
					'user_name' => 'UnAuthorized Access',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
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
	//To return to the view for taking in the entries
	public function addUser(){
		if(Auth::check())
			if(Auth::user()->role=='root')
			return view('root.adduser')->with('name',Auth::user()->first_name." ".Auth::user()->last_name);
			else{
				$rules = array(
					'user_name' => 'UnAuthorized Access',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
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
	//To write to the database
	public function addToDb(){
		if(Auth::check())
		{
			if(Auth::user()->role=='root'){
			$rules = array(
			'user_name' => 'required|min:3',
			'first_name'  => 'required|min:3',
			'last_name'=>'required',
			'password1' =>'required'			
			);
			
			$validator = Validator::make(Input::all(),$rules);
		
			if($validator->fails()){
				return Redirect::to('adduser')->withErrors($validator)->withInput();
			}
			else{
				$user_name = Input::get('user_name');
				$first_name=Input::get('first_name');
				$last_name = Input::get('last_name');
				$role = Input::get('role');
				$password =\Hash::make(Input::get('password1'));
				
				DB::insert('insert into users (user_name,first_name,last_name,role,password,created_at) values (?,?,?,?,?,?)', [$user_name, $first_name,$last_name,$role,$password,date('Y-m-d H:i:s')]);
	//			echo $hospital_name.' '.$latitude.' '.$status;
				Session::flash('flash_message', 'Admin Sucessfully added!');
				return Redirect::to('maradmin');
			}
			}
			else{
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
	public function viewUser(){
		if(Auth::check()){
			if(Auth::user()->role=='root'){
			$data=DB::table('users')->get();
			$len=count($data);
			$id=array();
						
			return view('root.viewuser')->with('data',$data);}
			else{
				$rules = array(
					'user_name' => 'UnAuthorized Access',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
			}
		}
		else{
			$rules = array(
					'user_name' => 'Please Login First',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
		}
	}
	//To return to the view for taking in the entries
	public function addHosAdmin(){
		if(Auth::check())
			if(Auth::user()->role=='root'){
				$hospitals = DB::select('select id,hospital_name from hospital');	
				return view('root.addhosadmin')->with('name',Auth::user()->first_name." ".Auth::user()->last_name)->with('hospitals',$hospitals);
			}
			else{
				$rules = array(
					'user_name' => 'UnAuthorized Access',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
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
	//To write to the database
	public function addHosAdminToDb(){
		if(Auth::check())
		{
			if(Auth::user()->role=='root'){
			$rules = array(
			'user_name' => 'required|min:3',
			'first_name'  => 'required|min:3',
			'last_name'=>'required',
			'password1' =>'required'			
			);
			
			$validator = Validator::make(Input::all(),$rules);
		
			if($validator->fails()){
				return Redirect::to('adduser')->withErrors($validator)->withInput();
			}
			else{
				$user_name = Input::get('user_name');
				$first_name=Input::get('first_name');
				$last_name = Input::get('last_name');
				$hospital_id = Input::get('hospital_id');
				$password =\Hash::make(Input::get('password1'));
				$role='HosAdmin';
				DB::insert('insert into users (user_name,first_name,last_name,role,password,created_at) values (?,?,?,?,?,?)', [$user_name, $first_name,$last_name,$role,$password,date('Y-m-d H:i:s')]);
	//			echo $hospital_name.' '.$latitude.' '.$status;
				$id = DB::table('users')->where('user_name',$user_name)->value('id');
				DB::insert('insert into hospitaladmin (user_id,hospital_id,created_at) values (?,?,?)', [$id, $hospital_id,date('Y-m-d H:i:s')]);
				Session::flash('flash_message', 'Hospital Admin Sucessfully added!');
				return Redirect::to('maradmin');
			}
			}
			else{
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
	public function viewHosAdmin(){
		if(Auth::check()){
			if(Auth::user()->role=='root'){
			$data=DB::table('hospitaladmin')->get();
			$len=count($data);
			$hospitaldata=array();
			for($x=0;$x<$len;$x++){
				
				$hosid=$data[$x]->hospital_id;
				$hospitaldata[$x]=Hospital::find($hosid);
			}
						
			return view('root.viewhosadmin')->with('data',$data)->with('hospitaldata',$hospitaldata);
			}
			else{
				$rules = array(
					'user_name' => 'UnAuthorized Access',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
			}
		}
		else{
			$rules = array(
					'user_name' => 'Please Login First',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
		}
	}
}