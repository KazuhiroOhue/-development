@extends('layouts.admin')
@section('title', 'メモいろいろ 一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>メモいろいろ 一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p class="bt">
                    <a href="{{ action('Admin\VarietyController@add') }}">新規作成</a>
                </p>
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
                    <table class="table table-light table-hover">
                        <tbody>
                            <tbody>
                                <thead>
                                    <tr>
                                        <th width="40%">タイトル</th>
                                        <th width="40%">更新日</th>
                                    </tr>
                                </thead>
                            </tbody>
                            @foreach($posts as $variety)
                            <tr>
                                <th>{{$variety->title }}</th> 
                                <th>{{$variety->updated_at->format('Y年m月d日') }}</th>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\VarietyController@detail', ['id' => $variety->id]) }}">詳細</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="paginate">
                            {!! $posts->render() !!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection