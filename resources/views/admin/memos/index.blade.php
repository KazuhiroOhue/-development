@extends('layouts.admin')
@section('title', '登録した技の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>技メモ一覧</h2>
        </div>
        
        <a href="{{ asset('images/IMG_7016.jpg') }}" data-lightbox="abc" data-title="ロバ">
            <img src="{{ asset('images/IMG_7016-thumbnail.jpg') }}" alt="ロバ">
        </a>
        
        
        
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\MemosController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
        </div>
        <p class="open">検索する</p>
        <div id="slideBox">
            
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\MemosController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">技名</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">取得段位</label>
                        <div class="col-md-3">
                            <select type="text" class="form-control" name="cond_rank">
                                @foreach(config('rank') as $key => $score)
                                    <option value="{{ $score }}" @if($cond_rank == $score) selected @endif>{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">拳系</label>
                        <div class="col-md-3">
                            <select type="text" class="form-control" name="cond_type">
                                @foreach(config('type') as $key => $score)
                                    <option value="{{ $score }}" @if($cond_type == $score) selected @endif>{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-4">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="list-memos col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <tbody>
                            <thead>
                                <tr>
                                    <th width="20%">技名</th>
                                    <th width="20%">更新日</th>
                                    <th width="20%">段位</th>
                                    <th width="20%">拳系</th>
                                </tr>
                            </thead>
                        </tbody>
                        @foreach($posts as $memos)
                        <tr>
                            <th>{{$memos->name }}</th> 
                            <th>{{$memos->updated_at->format('Y年m月d日') }}</th>
                            <th>{{$memos->rank }}</th>
                            <th>{{$memos->type }}</th>
                            <td>
                                <div>
                                    <a href="{{ action('Admin\MemosController@detail', ['id' => $memos->id]) }}">詳細</a>
                                </div>
                            </td>
                        </tr>  
                        @endforeach
                    </table>
                    <div class="paginate">
                        {!! $posts->appends(['cond_name'=>$cond_name,'cond_rank'=>$cond_rank,'cond_type'=>$cond_type])->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection