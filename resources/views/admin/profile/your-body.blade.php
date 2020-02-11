@extends('layouts.profile')
@section('title', 'プロフィール計算結果')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール計算結果</h2>
                <p>※小数点以下は切り捨て表記</p>
                <div class="form-group row">
                    <label class="col-md-2">目標</label>
                    <div class="col-md-10">
                        <h3>{{ $profile->total_calorie }} kcal</h3>
                    </div>
                    <p>※1日に摂取するカロリー推奨値</p>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">内訳</label>
                    <div class="col-md-10">
                        <h3>タンパク質 {{ $profile->protein }} g</h3>
                        <h3>炭水化物 {{ $profile->carbohydrate }} g</h3>
                        <h3>脂質 {{ $profile->lipid }} g</h3>
                    </div>
                    <p>※合計カロリーから割り出す三大栄養素必要量</p>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">基礎代謝</label>
                    <div class="col-md-10">
                        <h3>{{ $profile->bmr }} kcal</h3>
                    </div>
                    <p>※何もしなくても生きているだけで消化するカロリー</p>
                </div>
            </div>
            <div class="col-md-8 mx-auto">
                <h2>プロフィールデータ</h2>
                <div class="form-group row">
                    <label class="col-md-2">性別</label>
                    <div class="col-md-10">
                        @if ($profile->sex == 'man')
                            <p><?php echo '男'; ?></p>
                        @else
                            <p><?php echo '女'; ?></p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">身長</label>
                    <div class="col-md-10">
                        <p>{{ $profile->height }} cm</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">体重</label>
                    <div class="col-md-10">
                        <p>{{ $profile->weight }} kg</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">年齢</label>
                    <div class="col-md-10">
                        <p>{{ $profile->age }} 歳</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">アクティブ度</label>
                    <div class="col-md-10">
                        @if ($profile->active == 'low')
                            <p><?php echo '【アクティブ度-低】座り仕事が多く、一日の運動は歩いたり階段を上ったりする程度'; ?></p>
                        @elseif ($profile->active == 'normal')
                            <p><?php echo '【アクティブ度-普通】立ち仕事や重労働が多く、比較的一日中動き回っている'; ?></p>
                        @else
                            <p><?php echo '【アクティブ度-高】立ち仕事や重労働が多く、それに加えジムでトレーニングを行っている'; ?></p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">目的</label>
                    <div class="col-md-10">
                        @if ($profile->purpose == 'diet')
                            <p><?php echo '減量(ダイエット)'; ?></p>
                        @elseif ($profile->purpose == 'keep')
                            <p><?php echo '現状維持'; ?></p>
                        @else
                            <p><?php echo '増量'; ?></p>
                        @endif
                    </div>
                </div>
                <p>※プロフィールを編集する場合は、<a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">コチラ</a>をタップして下さい。</p>
            </div>
        </div>
    </div>
@endsection