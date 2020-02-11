@extends('layouts.profile')
@section('title', 'マクロバランス新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>今日における各栄養素摂取量</h2>
                <p>トータルカロリー</p>
                <h3><?php echo $output;?></h3>
                <p>タンパク質</p>
                <p>脂質</p>
                <p>炭水化物</p>
                <p>連続達成日</p>
                <p>今日食べたもの一覧を下記に表示させる</p>
            </div>
        </div>
    </div>
@endsection