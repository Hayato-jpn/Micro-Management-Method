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
    
    public function getBmrAttribute() {
        $val = ($this->sex == 'man') ? 5 : -161;
        $output = floor(10 * $this->weight + 6.25 * $this->height - 5 * $this->age + $val);
        return $output;
    }
    
    public function getActiveValueAttribute() {
        switch ($this->active) {
        case 'low':
            return 1.2;
        case 'normal':
            return 1.55;    
        default:
            return 1.725;
        }
    }
    public function getPurposeValueAttribute() {
        switch ($this->purpose) {
        case 'diet':
            return 0.8;
        case 'keep':
            return 1;
        case 'increase':
            return 1.2;
        }
    }
    
    public function getTotalCalorieAttribute() {
        return floor($this->bmr * $this->active_value * $this->purpose_value);
    }
    
    public function getProteinAttribute() {
        return $this->weight * 2;
    }
    
     public function getLipidAttribute() {
        return floor($this->total_calorie * 0.25 / 9);
    }
    
     public function getCarbohydrateAttribute() {
        return floor(($this->total_calorie - $this->protein * 4 - $this->lipid * 9) / 4);
    }
}
