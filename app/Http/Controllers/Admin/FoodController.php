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
        
        return redirect('admin/food');
    }
    
    public function edit(Request $request) {
        $food = Food::find($request->id);
        if (empty($food)) {
            abort(404);
        }
        return view('admin.food.edit', ['food_form' => $food]);
    }
    
    public function update(Request $request) {
        // Validationをかける
        $this->validate($request, Food::$rules);
        // News Modelからデータを取得する
        $food = Food::find($request->id);
        // 送信されてきたフォームデータを格納する
        $food_form = $request->all();
        unset($food_form['_token']);

        // 該当するデータを上書きして保存する
        $food->fill($food_form)->save();
        return redirect('admin/food/');
    }
    
    public function delete(Request $request) {
        // 該当するNews Modelを取得
        $food = Food::find($request->id);
        // 削除する
        $food->delete();
        return redirect('admin/food/');
    }
    
    public function index(Request $request) {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Food::where('food', 'like', "%{$cond_title}%")->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Food::all();
      }
      return view('admin.food.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
