@extends('layouts.profile')
@section('title', 'お問い合わせ完了')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お問い合わせありがとうございました！</h2>
                <p>確認し、必要に応じて数営業日以内に返信致します。<br>今後とも、Macro-Management-Method / マクロ管理法 を宜しくお願い致します。</p>
                <p><a href="{{ url('admin/food/top') }}">TOPへ戻る</a></p>
                <img src="https://dietgenius.jp/wp-content/uploads/2017/09/book_banner.jpg"></img>
            </div>
        </div>
    </div>
@endsection