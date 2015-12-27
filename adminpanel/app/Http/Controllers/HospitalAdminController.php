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

class HospitalAdminController extends Controller {
	
	
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
			if(Auth::user()->role=='HosAdmin'){
				$user_name=Auth::user()->id;
				$id=DB::table('hospitaladmin')->where('user_id',$user_name)->value('hospital_id');
				$count=DB::table('hospital')->where('id',$id)->value('bed_count');
				$status=DB::table('hospital')->where('id',$id)->value('status');
				
	return view('HospitalAdmin.hosadmin')->with('name',Auth::user()->first_name." ".Auth::user()->last_name)->with('count',$count)->with('status',$status);
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
	public function increaseBedCount(){
		if(Auth::check())
			if(Auth::user()->role=='HosAdmin'){
				$id=DB::table('hospitaladmin')->where('user_id',Auth::user()->id)->value('hospital_id');
				$count=DB::table('hospital')->where('id',$id)->value('bed_count');
				$count=$count+1;
				DB::table('hospital')->where('id',$id)->update(['bed_count'=>$count]);
				$status=DB::table('hospital')->where('id',$id)->value('status');
			return view('HospitalAdmin.hosadmin')->with('name',Auth::user()->first_name." ".Auth::user()->last_name)->with('count',$count)->with('status',$status);}
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
	public function decreaseBedCount(){
		if(Auth::check())
			if(Auth::user()->role=='HosAdmin'){
				$id=DB::table('hospitaladmin')->where('user_id',Auth::user()->id)->value('hospital_id');
				$count=DB::table('hospital')->where('id',$id)->value('bed_count');
				$count=$count-1;
				$status=DB::table('hospital')->where('id',$id)->value('status');
				if($count>=0){
				DB::table('hospital')->where('id',$id)->update(['bed_count'=>$count]);
				return view('HospitalAdmin.hosadmin')->with('name',Auth::user()->first_name." ".Auth::user()->last_name)->with('count',$count)->with('status',$status);}
				else{
					count+1;
					$rules = array(
					'user_name' => 'Bed Count cannot be negative',
					'password'  => ' '
				);
					return view('HospitalAdmin.hosadmin')->with('name',Auth::user()->first_name." ".Auth::user()->last_name)->with('count',$count)->with('status',$status)->withErrors($rules);
				}
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
	public function statusActive(){
		if(Auth::check())
			if(Auth::user()->role=='HosAdmin'){
				$user_name=Auth::user()->id;
				$id=DB::table('hospitaladmin')->where('user_id',$user_name)->value('hospital_id');
				$count=DB::table('hospital')->where('id',$id)->value('bed_count');
				DB::table('hospital')->where('id',$id)->update(['status'=>'active']);
				$status=DB::table('hospital')->where('id',$id)->value('status');
				return view('HospitalAdmin.hosadmin')->with('name',Auth::user()->first_name." ".Auth::user()->last_name)->with('count',$count)->with('status',$status);
				
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
	public function statusInactive(){
		if(Auth::check())
			if(Auth::user()->role=='HosAdmin'){
				$user_name=Auth::user()->id;
				$id=DB::table('hospitaladmin')->where('user_id',$user_name)->value('hospital_id');
				$count=DB::table('hospital')->where('id',$id)->value('bed_count');
				DB::table('hospital')->where('id',$id)->update(['status'=>'inactive']);
				$status=DB::table('hospital')->where('id',$id)->value('status');
				return view('HospitalAdmin.hosadmin')->with('name',Auth::user()->first_name." ".Auth::user()->last_name)->with('count',$count)->with('status',$status);
				
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
	public function showDoctorStatus(){
		if(Auth::check())
			if(Auth::user()->role=='HosAdmin'){
				$user_name=Auth::user()->id;
				$hosid=DB::table('hospitaladmin')->where('user_id',$user_name)->value('hospital_id');
				$data=DB::table('doctors')->where('associated_with',$hosid)->get();

				
				return view('HospitalAdmin.doctorstatus')->with('name',Auth::user()->first_name." ".Auth::user()->last_name)->with('data',$data);
				
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
	public function changeDoctorStatus(){
		if(Auth::check())
			if(Auth::user()->role=='HosAdmin'){
				//Updating Status
				$doctor_id = Input::get('doctor_id');
				$status=DB::table('doctors')->where('id',$doctor_id)->value('status');
				if($status=='in')
					$status='out';
				else
					$status='in';
				DB::table('doctors')->where('id',$doctor_id)->update(['status'=>$status]);
				//Redirecting to the page with updated Information
				$user_name=Auth::user()->id;
				$hosid=DB::table('hospitaladmin')->where('user_id',$user_name)->value('hospital_id');
				$data=DB::table('doctors')->where('associated_with',$hosid)->get();
				return view('HospitalAdmin.doctorstatus')->with('name',Auth::user()->first_name." ".Auth::user()->last_name)->with('data',$data);
				
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
}