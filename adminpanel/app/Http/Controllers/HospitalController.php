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
			if(Auth::user()->role=='MarAdmin'||Auth::user()->role=='root')
			return view('addhospital.addhospital')->with('name',Auth::user()->first_name." ".Auth::user()->last_name);
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
			if(Auth::user()->role=='MarAdmin'||Auth::user()->role=='root'){
			$rules = array(
			'hospital_name' => 'required|min:3',
			'hospital_address'  => 'required|min:3',
			'contact_number'=>'required',
			'bed_count'=>'required',
			'latitude'=>'required',
			'longitude'=>'required'
			);
			
			$validator = Validator::make(Input::all(),$rules);
		
			if($validator->fails()){
				return Redirect::to('addhospital')->withErrors($validator)->withInput();
			}
			else{
				$hospital_name = Input::get('hospital_name');
				$bed_count=Input::get('bed_count');
				$hospital_address = Input::get('hospital_address');
				$contact_number = Input::get('contact_number');
				$latitude = (Input::get('latitude'));
				$longitude = (Input::get('longitude'));
				$status=Input::get('status');
				$added_by=Auth::user()->id;
				DB::insert('insert into hospital (hospital_name,bed_count, hospital_address,contact_number,latitude,longitude,status,added_by,created_at) values (?,?, ?,?,?,?,?,?,?)', [$hospital_name, $bed_count,$hospital_address,$contact_number,$latitude,$longitude,$status,$added_by,date('Y-m-d H:i:s')]);
	//			echo $hospital_name.' '.$latitude.' '.$status;
				Session::flash('flash_message', 'Hospital Details Sucessfully added!');
				return Redirect::to('admin');
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
	public function getDetails(){
		if(Auth::check()){
			if(Auth::user()->role=='MarAdmin'||Auth::user()->role=='root'){
			//getting hospital details from database
			$hospitals = DB::select('select id,hospital_name from hospital');

			return view('updatehospital.adddetails')->with('hospitals',$hospitals);}
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
	public function geteditedDetails(){
		if(Auth::check()){
#		echo "posted";
		if(Auth::user()->role=='MarAdmin'||Auth::user()->role=='root'){
		return Redirect::to('updatehospital.updatedetails');
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
	public function postDetails(){
		if(Auth::check()){
		if(Auth::user()->role=='MarAdmin'||Auth::user()->role=='root'){
		$hospital_id = Input::get('hospital_id');
	#	echo "$hospital_id";
		$hospital_details=Hospital::find($hospital_id);
	#	echo "$hospital_details('id')";
		return view('updatehospital.updatedetails')->with('prevdetails',$hospital_details);
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
	public function posttodb(){
		if(Auth::check()){
		if(Auth::user()->role=='MarAdmin'||Auth::user()->role=='root'){
		$rules = array(
			'hospital_name' => 'required|min:3',
			'bed_count' => 'required',
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
				$hospital_id = Input::get('hospital_id');
				$hospital_name = Input::get('hospital_name');
				$bed_count=Input::get('bed_count');
				$hospital_address = Input::get('hospital_address');
				$contact_number = Input::get('contact_number');
				$latitude = (Input::get('latitude'));
				$longitude = (Input::get('longitude'));
				$status=Input::get('status');
				echo "$hospital_address";
				$affected = DB::update('update hospital set hospital_name=?,bed_count=?,hospital_address=?,contact_number=?,latitude=?,longitude=?,status=?,updated_at=? where id = ?', [$hospital_name,$bed_count,$hospital_address,$contact_number,$latitude,$longitude,$status,date('Y-m-d H:i:s'),intval($hospital_id)]);
				Session::flash('flash_message', 'Hospital Details Sucessfully added!');
				return Redirect::to('admin');
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
		else{
			$rules = array(
					'user_name' => 'Please Login First',
					'password'  => ' '
				);
				return Redirect::to('login')->withErrors($rules)->withInput(Input::except('password'));
		}
		
	}
	public function viewHospital(){
		if(Auth::check()){
			if(Auth::user()->role=='MarAdmin'||Auth::user()->role=='root'){
			$data=DB::table('hospital')->get();
			$len=count($data);
			$id=array();
			$userdata=array();
			for($x=0;$x<$len;$x++){
				$id[$x]=$data[$x]->added_by;
				$userdata[$x]=User::find($id[$x]);
			}
			
			return view('updatehospital.viewhospital')->with('data',$data)->with('userdata',$userdata);}
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