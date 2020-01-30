<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;

class FoodController extends Controller
{
    //
    public function add() {
        return view('admin.food.create');
    }
    
    public function create(Request $request) {
        //validation
        $this->validate($request, Food::$rules);

        $food = new Food;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $food->fill($form);
        $food->save();
        
        return redirect('admin/food/create');
    }
    
    public function edit() {
        return view('admin.food.edit');
    }
    
    public function update() {
        return redirect('admin/food/edit');
    }
    
    public function index(Request $request) {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Food::where('food', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Food::all();
      }
      return view('admin.food.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
