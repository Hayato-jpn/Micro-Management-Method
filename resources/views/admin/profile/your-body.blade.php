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
                @if ($profile->sex == 'man')
                    <?php $output = floor(10 * $profile->weight + 6.25 * $profile->height - 5 * $profile->age + 5); ?>
                @else
                    <?php $output = floor(10 * $profile->weight + 6.25 * $profile->height - 5 * $profile->age - 161); ?>
                @endif
                
                @if ($profile->active == 'low')
                    <?php $totalCalory = $output * 1.2; ?>
                @elseif ($profile->active == 'normal')
                    <?php $totalCalory = $output * 1.55; ?>
                @else
                    <?php $totalCalory = $output * 1.725; ?>
                @endif
                
                @if ($profile->purpose == 'diet')
                    <?php $totalCalory = $totalCalory * 0.8; ?>
                @elseif ($profile->purpose == 'keep')
                    <?php $totalCalory = $totalCalory * 1; ?>
                @else
                    <?php $totalCalory = $totalCalory * 1.2; ?>
                @endif
                <h3><?php echo floor($totalCalory); ?></h3>
                <p>kcal</p>
            </div>
            <div class="col-md-8 mx-auto">
                <p>内訳はコチラ↓</p>
                <!--<?php $protein = $profile->weight * 2; ?>  タンパク質計算式-->
                <!--<?php $lipid = floor($totalCalory * 0.25 / 9);?>  脂質計算式-->
                <!--<?php $carbohydrate = floor(($totalCalory - $protein * 4 - $lipid * 9) / 4);?>   炭水化物計算式-->
                <p>タンパク質(g)</p>
                <p><?php echo $protein; ?> g</p>
                <p>炭水化物(g)</p>
                <p><?php echo $carbohydrate; ?> g</p>
                <p>脂質(g)</p>
                <p><?php echo $lipid; ?> g</p>
            </div>
            <div class="col-md-8 mx-auto">
                <p>ちなみに、</p>
                <!-- ここに計算結果を入れる -->
                @if ($profile->sex == 'man')
                    <?php $output = floor(10 * $profile->weight + 6.25 * $profile->height - 5 * $profile->age + 5); ?>
                @else
                    <?php $output = floor(10 * $profile->weight + 6.25 * $profile->height - 5 * $profile->age - 161); ?>
                @endif
                <h3><?php echo $output; ?></h3>
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