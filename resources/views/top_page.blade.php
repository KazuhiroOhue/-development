@extends('layouts.admin')
@section('title', 'ようこそ‼')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <section class="card">
                <img class=card-image src="images/welcome.jpg" alt="welcome">
                <div class="card-content">
                    <h4>いらっしゃいませ</h4>
                    <p>説明～～～～～</p>
                </div>
                <div class="card-link">
                    <p class="bt">
                        <a href="{{ route('login') }}">ログイン</a>
                    </p>
                    <p class="bt">
                        <a href="{{ route('register') }}">新規登録</a>
                    </p>
                </div>        
            </section>
        </div>    
    </div>
</div>
@endsection