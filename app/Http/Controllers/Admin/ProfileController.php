<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Support\Facades\Auth; //追加

class ProfileController extends Controller
{
    //
    public function add() {
        return view('admin.profile.create');
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
        
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request) {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);    
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
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
    
          return redirect('admin/profile/your-body');
    }
    
    public function body(Request $request) {
        //ログインユーザーID取得、基礎代謝計算に必要な項目取得
        $user = Auth::user();
        $user_id = Auth::id();
        $profile = Profile::where('id', $user_id)->select('id', 'height', 'weight', 'age', 'sex', 'active', 'purpose')->first();
        
        return view('admin.profile.your-body',  ['profile' => $profile]);
    }
    
}
