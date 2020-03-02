<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Contact; //Contactモデル追加
use Illuminate\Support\Facades\Auth; //追加

class ProfileController extends Controller
{
    //
    public function add(Request $request) {
        $user = Auth::user();
        $user_id = Auth::id();
        
        $profile = Profile::find($request->id);
        if (!(empty($profile))) {
            return view('admin.profile.edit', ['profile_form' => $profile, 'user_id' => $user_id]);
        } else {
            return view('admin.profile.create', ['user_id' => $user_id]);   
        }
    }
    
    public function create(Request $request) {
        //validation
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/data');
    }
    
    public function edit(Request $request) {
        $user = Auth::user();
        $user_id = Auth::id();
        
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            return view('admin.profile.create',  ['user_id' => $user_id]);   
        } else {
            return view('admin.profile.edit', ['profile_form' => $profile, 'user_id' => $user_id]);   
        }
    }
    
    public function update(Request $request) {
        // Validationをかける
          $this->validate($request, Profile::$rules);
          // News Modelからデータを取得する
          $profile = Profile::find($request->id);
          // 送信されてきたフォームデータを格納する
          $profile_form = $request->all();
          unset($profile_form['_token']);
    
          // 該当するデータを上書きして保存する
          $profile->fill($profile_form)->save();
    
          return redirect('admin/profile/data');
    }
    
    public function data(Request $request) {
        //ログインユーザーID取得、基礎代謝計算に必要な項目取得
        $user = Auth::user();
        $user_id = Auth::id();
        
        // ↓これだと正常な挙動になる
        $profile = Profile::where('id', $user_id)->first();
        // $profile = Profile::where('id', $user_id)->select('id', 'height', 'weight', 'age', 'sex', 'active', 'purpose')->all();
        //☝︎これだとエラー表示になる
        
        if (empty($profile)) {
            return redirect('admin/profile/create');
        } else {
            return view('admin.profile.data',  ['profile' => $profile]);
        }
    }
}
