<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pages;
use App\Doctor;
use App\Hospital;
use App\Specialty;



class FrontController extends Controller{



   
    public function home(){
    return view('pages.home')
    ->with('options', Specialty::all()->unique('specialisation'));

   }



    public function about(){


     return view('pages.about')
     ->with('title', 'about')
      ->with('options', Specialty::all()->unique('specialisation'));

    }


    public function list_doctor(){

     return view('pages.doctor')
     ->with('title', 'Search Doctor')
     ->with('doctors', Doctor::paginate(8))
      ->with('options', Specialty::all()->unique('specialisation'));


    }


    public function doctor_view($id){
    
    return view('pages.doctor_view')
     ->with('title','Doctor Information')
     ->with('doctor', Doctor::find($id))
      ->with('options', Specialty::all()->unique('specialisation'));


    }


    public function list_hospital(){
  

     return view('pages.hospital')
     ->with('title', 'Search Hospital')
     ->with('hospitals', Hospital::paginate(8))
      ->with('options', Specialty::all()->unique('specialisation'));

    }


    public function item_view($id){
    
    return view('pages.hospital_item')
     ->with('title','Hospital Information')
     ->with('hospital', Hospital::find($id))
      ->with('options', Specialty::all()->unique('specialisation'));


    }


    public function list_specialty(){

     return view('pages.specialty')
     ->with('title','Search Specialty')
     ->with('options', Specialty::all()->unique('specialisation'));
    
    }


   


    }
