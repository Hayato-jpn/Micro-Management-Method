<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    //
    public function add() {
        $user = Auth::user();
        $user_id = Auth::id();
        
        return view('admin.food.create', ['user_id' => $user_id]);
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
        $user = Auth::user();
        $user_id = Auth::id();
        
        $food = Food::find($request->id);
        if (empty($food)) {
            abort(404);
        }
        return view('admin.food.edit', ['food_form' => $food, 'user_id' => $user_id]);
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
    
    public function refresh(Request $request) {
        // 該当するNews Modelを取得
        $food = Food::find($request->id);
        // 削除する
        $food->delete();
        return redirect('admin/food/today');
    }
    
    public function index(Request $request) {
        //ログインユーザーID取得、基礎代謝計算に必要な項目取得
        $user = Auth::user();
        $user_id = Auth::id();
        $cond_title = $request->cond_title;
        //したい事(ログインユーザーが登録したFoodのみを表示させたい)
        if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Food::where('user_id', $user_id)->where('food', 'like', "%{$cond_title}%")->get(); //where('id', $user_id)を追加
      } else {
          // それ以外はすべての登録食事を取得する
          $posts = Food::where('user_id', $user_id)->get(); //where('id', $user_id)を追加
      }
      return view('admin.food.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    //作業中
    public function today(Request $request) {
        $user = Auth::user();
        $user_id = Auth::id();
        
        $profile = Profile::where('id', $user_id)->select('id', 'height', 'weight', 'age', 'sex', 'active', 'purpose')->first();
        
        //Foodマイグレーションファイルから本日データを$foodに入れる
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        // $foods = Food::where('eat_date', $today)->select('eat_time', 'food', 'protein', 'lipid', 'carbohydrate')->all();
        $posts = Food::where('user_id', $user_id)->where('eat_date', $today)->get();
        $post = Food::where('user_id', $user_id)->where('eat_date', $today)->first();
        
        if (empty($post)) {
            return redirect('admin/food/create');
        } elseif (empty($profile)) {
            return redirect('admin/profile/create');
        } else {
            return view('admin.food.today',  ['profile' => $profile, 'posts' => $posts]);
        }
    }
    
    public function top() {
        return view('admin.food.top');
    }
}
