<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profile';
    protected $guarded = array('id');
    
    public static $rules = array(
        'sex' => 'required | filled',
        'height' => 'required',
        'weight' => 'required',
        'age' => 'required',
        'active' => 'required | filled',
        'purpose' => 'required | filled',
    );
}
