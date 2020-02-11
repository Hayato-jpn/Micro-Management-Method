@extends('layouts.admin')
@section('title', '登録済みFoodの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Food一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\FoodController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\FoodController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">Food名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">Number</th>
                                <th width="10%">日付</th>
                                <th width="10%">朝昼晩</th>
                                <th width="12%">食品名</th>
                                <th width="12%">タンパク質(g)</th>
                                <th width="12%">炭水化物(g)</th>
                                <th width="12%">脂質(g)</th>
                                <th width="10%">編集</th></th>
                                <th width="10%">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $i => $food)
                                <tr>
                                    <th>{{ $i + 1 }}</th>
                                    <td>{{ \Str::limit($food->eat_date, 100) }}</td>
                                    <td>{{ \Str::limit($food->eat_time, 100) }}</td>
                                    <td>{{ \Str::limit($food->food, 100) }}</td>
                                    <td>{{ \Str::limit($food->protein, 100) }}</td>
                                    <td>{{ \Str::limit($food->carbohydrate, 100) }}</td>
                                    <td>{{ \Str::limit($food->lipid, 100) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\FoodController@edit', ['id' => $food->id]) }}">編集</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\FoodController@delete', ['id' => $food->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection