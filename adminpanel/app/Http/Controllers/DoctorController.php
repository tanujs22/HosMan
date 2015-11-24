<?php 
namespace App\Http\Controllers;

use DB;
use Session;
use App\User;
use App\Hospital;
use App\Doctor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller {
	
	
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
	public function addDoctor(){
		if(Auth::check()){
			$hospitals = DB::select('select id,hospital_name from hospital');
			return view('adddoctor.adddoctor')->with('hospitals',$hospitals);
		}
		else
			return view('login');
	}
	//To write to the database
	public function addToDb(){
		if(Auth::check())
		{
			$rules = array(
			'doctor_name' => 'required|min:3',
			'address'  => 'required|min:3',
			'contact_number'=>'required',
			);
			
			$validator = Validator::make(Input::all(),$rules);
		
			if($validator->fails()){
				return Redirect::to('adddoctor')->withErrors($validator)->withInput();
			}
			else{
				$doctor_name = Input::get('doctor_name');
				$specialisation = Input::get('specialisation');
				$address = Input::get('address');
				$contact_number = Input::get('contact_number');
				$associated_with = (Input::get('associated_with'));
				$status=Input::get('status');
				$added_by=Auth::user()->id;
				DB::insert('insert into doctors (doctor_name,specialisation,address,contact_number,associated_with,status,added_by,created_at) values (?,?,?,?,?,?,?,?)', [$doctor_name,$specialisation, $address,$contact_number,$associated_with,$status,$added_by,date('Y-m-d H:i:s')]);
	//			echo $hospital_name.' '.$latitude.' '.$status;
				Session::flash('flash_message', 'Doctor Details Sucessfully added!');
				return Redirect::to('admin');
			}
		}
		else
			return view('login');
	}
	public function getDetails(){
		if(Auth::check()){
			
			//getting hospital details from database
			$doctors = DB::select('select id,doctor_name from doctors');

			return view('updatedoctor.adddetails')->with('doctors',$doctors);
		}
		else{
			return view('login');
		}
	}
	public function geteditedDetails(){
		if(Auth::check()){
#		echo "posted";
		return Redirect::to('updatedoctor');
		}
		else{
			return view('login');
		}
		
	}
	public function postDetails(){
		if(Auth::check()){
		
		$doctor_id = Input::get('doctor_id');
	#	echo "$doctor_id";
		$doctor_details=Doctor::find($doctor_id);
	#	echo "$doctor_details->id";
		$hospitals = DB::select('select id,hospital_name from hospital');
	#	echo "$hospitals[0]";
	return view('updatedoctor.updatedetails')->with('prevdetails',$doctor_details)->with('hospitals',$hospitals);
		
		}
		else{
			return view('login');
		}
		
	}
	public function posttodb(){
		if(Auth::check()){
			
		$rules = array(
			'doctor_name' => 'required|min:3',
			'address'  => 'required|min:3',
			'contact_number'=>'required',
			'specialisation'=>'required',
			);
			
			$validator = Validator::make(Input::all(),$rules);
		
			if($validator->fails()){
				return Redirect::to('adddoctor')->withErrors($validator)->withInput();
			}
			else{
				$doctor_id = Input::get('doctor_id');
				$doctor_name = Input::get('doctor_name');
				$address = Input::get('address');
				$contact_number = Input::get('contact_number');
				$specialisation = (Input::get('specialisation'));
				$associated_with = (Input::get('associated_with'));
				$status=Input::get('status');
		#		echo "$hospital_address";
				$affected = DB::update('update doctors set doctor_name=?,address=?,contact_number=?,specialisation=?,associated_with=?,status=?,updated_at=? where id = ?', [$doctor_name,$address,$contact_number,$specialisation,$associated_with,$status,date('Y-m-d H:i:s'),intval($doctor_id)]);
				Session::flash('flash_message', 'Doctor Details Sucessfully added!');
				return Redirect::to('admin');
			}
		}
		else{
			return view('login');
		}
		
	}
	public function viewDoctor(){
		if(Auth::check()){
			$data=DB::table('doctors')->get();
			$len=count($data);
			$id=array();
			$userdata=array();
			$hospitaldata=array();
			for($x=0;$x<$len;$x++){
				$id[$x]=$data[$x]->added_by;
				$userdata[$x]=User::find($id[$x]);
				$hosid=$data[$x]->associated_with;
				$hospitaldata[$x]=Hospital::find($hosid);
			}
			
			return view('updatedoctor.viewdoctor')->with('data',$data)->with('userdata',$userdata)->with('hospitaldata',$hospitaldata);
		}
		else{
			return view('login');
		}
	}
}