@extends('layouts.admin')
@section('title', 'メモを選択してください')

@section('content')
<div class="container">
    <h5>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </h5>
    <h3>どのメモを見ますか？</h3>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="login-box card">
                <div class=image>
                    <img class="card-img-top" src="images/memos.jpg" alt="技のイメージ画像">
                </div>
                <div class="login-body card-body">
                    <h4 class="card-title">技メモ</h4>
                    <p class="card-text">少林寺拳法の技についてのメモを作ることができます。修得段位・拳系別に検索も可能です。</p>
                    <p class="bt">
                        <a href="{{ action('Admin\MemosController@index') }}">一覧を見る</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="login-box card">
                <div class=image>
                    <img class="card-img-top" src="images/variety.jpg" alt="メモのイメージ画像">
                </div>
                <div class="login-body card-body">
                    <h4 class="card-title">メモいろいろ</h4>
                    <p class="card-text">技以外についてのメモを、自由に作ることができます。</p>
                    <p class="bt">
                        <a href="{{ action('Admin\VarietyController@index') }}">一覧を見る</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
