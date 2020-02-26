@extends('layouts.admin')
@section('title', '本日の進捗')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>本日の進捗</h2>
                <div class="form-group row">
                    <label class="col-md-2">摂取カロリー</label>
                    <div class="col-md-10">
                        <h3>{{ $food->protein }} kcal</h3>
                        <p>※1日に摂取可能（すべき）カロリー</p>
                    </div>
                </div>
                ちゃんと反映されるか試しているところ
                @foreach ($foods as $food)
                    <p>{{ $food->food }}</p>
                @endforeach
                <p>トータルカロリー</p>
                <h3>{{ $profile->total_calorie }}</h3>
                <p>タンパク質</p>
                <p>脂質</p>
                <p>炭水化物</p>
                <p>連続達成日</p>
                <p>今日食べたもの一覧を下記に表示させる</p>
            </div>
        </div>
    </div>
@endsection