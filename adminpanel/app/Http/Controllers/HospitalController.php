<?php 
namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller {
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
	public function addHospital(){
		if(Auth::check())
			return view('addhospital')->with('name',Auth::user()->first_name." ".Auth::user()->last_name);
		else
			return view('login');
	}
	//To write to the database
	public function addToDb(){
		if(Auth::check())
		{
			$rules = array(
			'hospital_name' => 'required|min:3',
			'hospital_address'  => 'required|min:3',
			'contact_number'=>'required',
			'latitude'=>'required',
			'longitude'=>'required'
			);
			
			$validator = Validator::make(Input::all(),$rules);
		
			if($validator->fails()){
				return Redirect::to('addhospital')->withErrors($validator)->withInput();
			}
			else{
				$hospital_name = Input::get('hospital_name');
				$hospital_address = Input::get('hospital_address');
				$contact_number = Input::get('contact_number');
				$latitude = (Input::get('latitude'));
				$longitude = (Input::get('longitude'));
				$status=Input::get('status');
				$added_by=Auth::user()->id;
				DB::insert('insert into hospital (hospital_name, hospital_address,contact_number,latitude,longitude,status,added_by) values (?, ?,?,?,?,?,?)', [$hospital_name, $hospital_address,$contact_number,$latitude,$longitude,$status,$added_by]);
	//			echo $hospital_name.' '.$latitude.' '.$status;
				Session::flash('flash_message', 'Hospital Details Sucessfully added!');
				return Redirect::to('admin');
			}
		}
		else
			return view('login');
	}
	public function getDetails(){
		if(Auth::check()){
			
			//getting hospital details from database
			$hospitals = DB::select('select id,hospital_name from hospital');

			return view('adddetails')->with('hospitals',$hospitals);
		}
		else{
			return view('login');
		}
	}
	public function postDetails(){
		$hospital_id = Input::get('hospital_id');
		$hospital_details=DB::select('select * from hospital where id= ?',$hospital_id);
		
	}
}