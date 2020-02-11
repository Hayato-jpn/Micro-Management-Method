@extends('layouts.profile')
@section('title', 'あなたの必要栄養素')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>あなたの必要栄養素</h2>
            </div>
            <div class="col-md-8 mx-auto">
                <p>デイリー総摂取カロリー / 小数点以下は切り捨て表記</p>
                <!-- ここに計算結果を入れる -->
                <h3>{{ $profile->total_calorie }}</h3>
                <p>kcal</p>
            </div>
            <div class="col-md-8 mx-auto">
                <p>内訳はコチラ↓</p>
                <p>タンパク質(g)</p>
                <p>{{ $profile->protein }} g</p>
                <p>炭水化物(g)</p>
                <p>{{ $profile->carbohydrate }} g</p>
                <p>脂質(g)</p>
                <p>{{ $profile->lipid }} g</p>
            </div>
            <div class="col-md-8 mx-auto">
                <p>ちなみに、</p>
                <!-- ここに計算結果を入れる -->
                <h3>{{ $profile->bmr }}</h3>
                <p>kcalがあなたの一日の基礎代謝です。</p>
            </div>
        </div>
        <p>入力プロフィールデータ</p>
        
        <div class="form-group row">
            <label class="col-md-2">性別</label>
            @if ($profile->sex == 'man')
                <p><?php echo '男'; ?></p>
            @else
                <p><?php echo '女'; ?></p>
            @endif
        </div>
        <div class="form-group row">
            <label class="col-md-2">身長</label>
            <p>{{ $profile->height }} cm</p>
        </div>
        <div class="form-group row">
            <label class="col-md-2">体重</label>
            <p>{{ $profile->weight }} kg</p>
        </div>
        <div class="form-group row">
            <label class="col-md-2">年齢</label>
            <p>{{ $profile->age }} 歳</p>
        </div>
        <div class="form-group row">
            <label class="col-md-2">アクティブ度</label>
            @if ($profile->active == 'low')
                <p><?php echo '【低】座り仕事が多く、一日の運動は歩いたり階段を上ったりする程度'; ?></p>
            @elseif ($profile->active == 'normal')
                <p><?php echo '【普通】立ち仕事や重労働が多く、比較的一日中動き回っている'; ?></p>
            @else
                <p><?php echo '【高】立ち仕事や重労働が多く、それに加えジムでトレーニングを行っている'; ?></p>
            @endif
        </div>
        <div class="form-group row">
            <label class="col-md-2">目的</label>
            @if ($profile->purpose == 'diet')
                <p><?php echo '減量(ダイエット)'; ?></p>
            @elseif ($profile->purpose == 'keep')
                <p><?php echo '現状維持'; ?></p>
            @else
                <p><?php echo '増量'; ?></p>
            @endif
        </div>
        
        <!-- ここに編集ボタンを設置させる -->
        <p>入力プロフィールを編集する場合はコチラ(👇)から</p>
        <div>
            <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
        </div>
    </div>
@endsection