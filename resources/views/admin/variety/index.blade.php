@extends('layouts.admin')
@section('title', 'メモいろいろ 一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>メモいろいろ 一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\VarietyController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\VarietyController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
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
            <div class="list-variety col-md-12 mx-auto">
                <div class="row">
                        <tbody>
                            @foreach($posts as $variety)
                                
                                <div class="post">
                                    <div class="row">
                                        <div class="text col-md-6">
                                            <div class="date">
                                                {{ $variety->updated_at->format('Y年m月d日') }}
                                            </div>
                                            <div class="title">
                                                {{ str_limit($variety->title, 150) }}
                                            </div>
                                            <div class="body mt-3">
                                                {{ str_limit($variety->body, 1500) }}
                                            </div>
                                            
                                            <div>
                                                <a href="{{ action('Admin\VarietyController@detail', ['id' => $variety->id]) }}">詳細</a>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            @endforeach
                        </tbody>
                    
                </div>
            </div>
        </div>
    </div>
@endsection