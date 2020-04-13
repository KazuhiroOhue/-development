@extends('layouts.admin')
@section('title', 'ようこそ‼')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <section class="card bg-dark border-0">
                <img class="card-image-top" src="images/welcome.jpg" alt="welcome">
                <div class="card-content text-center">
                    <h1>こんにちは‼︎</h1>
                    <p>今回、少林寺拳法の技の練習で使えるメモのアプリを作ってみました。</p>
                </div>
                <div class="card-link row justify-content-around">
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