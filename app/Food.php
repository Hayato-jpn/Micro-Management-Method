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
    
    // //作業中
    // //今日摂取タンパク質
    // public function getTodayTotalProteinAttribute() {
    //     return $this->protein;
    // }
    
    // //今日摂取炭水化物
    // public function getTodayTotalCarbohydrateAttribute() {
    //     return $this->carbohydrate;
    // }
    
    // //今日摂取脂質
    // public function getTodayTotalLipidAttribute() {
    //     return $this->lipid;
    // }
    
    // //今日摂取カロリー
    // public function getTodayTotalCalorieAttribute() {
    //     $total = $this->today_total_protein * 4 + $this->today_total_carbohydrate * 4 + $this->today_total_lipid * 9;
    //     return $total;
    // }
}
