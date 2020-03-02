<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table = 'food';
    protected $guarded = array('id');
    
    public static $rules = array(
        'user_id' => 'required',
        'eat_date' => 'required',
        'eat_time' => 'required| filled',
        'food' => 'required',
        'protein' => 'required',
        'carbohydrate' => 'required',
        'lipid' => 'required',
    );
    
    public static function getTodayProtein($foods) {
        $todayProtein = 0;
        foreach ($foods as $food) {
            $todayProtein += $food->protein;
        }
        
        return $todayProtein;
    }
    
    public static function getTodayCarbohydrate($foods) {
        $todayCarbohydrate = 0;
        foreach ($foods as $food) {
            $todayCarbohydrate += $food->carbohydrate;
        }
        
        return $todayCarbohydrate;
    }
    
    public static function getTodayLipid($foods) {
        $todayLipid = 0;
        foreach ($foods as $food) {
            $todayLipid += $food->lipid;
        }
        
        return $todayLipid;
    }
    
    public static function getTodayCalorie($todayProtein, $todayCarbohydrate, $todayLipid) {
        $output = floor($todayProtein * 4 + $todayCarbohydrate * 4 + $todayLipid * 9);
        return $output;
    }
    
    public static function getGoalPercentageCalorie($todayCalorie, $totalCalorie) {
        $output = floor($todayCalorie / $totalCalorie * 100);
        return $output;
    }
}
