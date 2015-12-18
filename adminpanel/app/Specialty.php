<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Specialty extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */


    protected $table = 'Specialties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'specialisation','category_id','contact_number', 'doctor_name','status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
 //   protected $hidden = ['password', 'remember_token'];
}

