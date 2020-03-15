@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-box card">
                <div class="login-header card-header">いらっしゃいませ</div>

                <div class="login-body card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログインされました!
                    
                </div>
                    
                    {{-- 技ボタン追加 --}}
                <div class="col-md-4">
                    <a href="{{ action('Admin\MemosController@index') }}" role="button" class="btn btn-primary">技メモ</a>
                </div>
                
                {{-- メモボタン追加 --}}
                <div class="col-md-4">
                    <a href="{{ action('Admin\VarietyController@index') }}" role="button" class="btn btn-primary">メモいろいろ</a>
                </div>
                    
                
            </div>
        </div>
    </div>
</div>
@endsection
