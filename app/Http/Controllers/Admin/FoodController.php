<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    //
    public function add() {
        return view('admin.food.create');
    }
    
    public function create(Request $request) {
        return redirect('admin/food/create');
    }
    
    public function edit() {
        return view('admin.food.edit');
    }
    
    public function update() {
        return redirect('admin/food/edit');
    }
}
