@extends('layouts.profile')
@section('title', 'あなたの必要栄養素')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>あなたの必要栄養素</h2>
            </div>
            <div class="col-md-8 mx-auto">
                <p>結果</p>
                <!-- ここに計算結果を入れる -->
                @if ($profile->sex == 'man')
                    <?php $output = 10 * $profile->weight + 6.25 * $profile->height - 5 * $profile->age + 5; ?>
                @else
                    <?php $output = 10 * $profile->weight + 6.25 * $profile->height - 5 * $profile->age - 161; ?>
                @endif
                <h3><?php echo $output; ?></h3>
                <p>kcalがあなたの一日の基礎代謝です。</p>
            </div>
            <div class="col-md-8 mx-auto">
                <p>そして、</p>
                <!-- ここに計算結果を入れる -->
                <p>kcalがあなたが必要な一日の総摂取カロリーです。</p>
            </div>
            <div class="col-md-8 mx-auto">
                <p>内訳はコチラ↓</p>
                <p>タンパク質(g)</p>
                <p>炭水化物(g)</p>
                <p>脂質(g)</p>
            </div>
            <!-- ここに編集ボタンを設置させる -->
        </div>
    </div>
@endsection