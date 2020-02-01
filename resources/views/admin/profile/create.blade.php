@extends('layouts.profile')
@section('title', 'マクロバランス新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>マクロバランス新規登録</h2>
                <h3>マクロ管理法とは</h3>
                <p>性別、身長、体重、年齢と活動量から１日に必要な三大栄養素（タンパク質・炭水化物・脂質の３つ。マクロ栄養素とも呼ぶ）を割り出し、それに沿って食べるだけの超シンプルな食事法です。</p>
                <p>下記では、アメリカで最もポピュラーな計算式の中の一つを用いており、下記に該当する数値を入力するだけで、簡単に一日に必要な摂取カロリーがわかります。</p>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <select class="form-control" name="sex">
                                <option value="">性別を選択して下さい</option>
                                <option value="man">男性</option>
                                <option value="woman">女性</option>
                            <!--<input type="text" class="form-control" name="sex" value="{{ old('title') }}">-->
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">身長</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="height" value="{{ old('height') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">体重</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="weight" value="{{ old('weight') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">年齢</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="age" value="{{ old('age') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">アクティブ度</label>
                        <div class="col-md-10">
                            <select class="form-control" name="active">
                                <option value="">アクティブ度を選択して下さい</option>
                                <option value="low">【低】座り仕事が多く、一日の運動は歩いたり階段を上ったりする程度</option>
                                <option value="normal">【普通】立ち仕事や重労働が多く、比較的一日中動き回っている</option>
                                <option value="high">【高】立ち仕事や重労働が多く、それに加えジムでトレーニングを行っている</option>
                            <!--<input type="text" class="form-control" name="active" value="{{ old('title') }}">-->
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">目的</label>
                        <div class="col-md-10">
                            <select class="form-control" name="purpose">
                                <option value="">目的を選択して下さい</option>
                                <option value="diet">減量</option>
                                <option value="keep">現状維持</option>
                                <option value="increase">増量</option>
                            <!--<input type="text" class="form-control" name="purpose" value="{{ old('title') }}">-->
                            </select>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="計算する">
                </form>
            </div>
        </div>
    </div>
@endsection