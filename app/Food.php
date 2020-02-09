<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table = 'food';
    protected $guarded = array('id');
    
    public static $rules = array(
        'eat_date' => 'required',
        'eat_time' => 'required| filled',
        'food' => 'required',
        'protein' => 'required',
        'carbohydrate' => 'required',
        'lipid' => 'required',
    );
}
