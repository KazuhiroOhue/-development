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
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\VarietyController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right">タイトルで検索する</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-warning" value="検索">
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
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="40%">タイトル</th>
                                        <th width="40%">更新日</th>
                                        <th width="10%">状態</th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>
                            </tbody>
                            @foreach($posts as $variety)
                            <tr>
                                <th>{{$variety->title }}</th> 
                                <th>{{$variety->updated_at->format('Y年m月d日') }}</th>
                                <th>
                                    @if ($variety->status == "編集中")
                                    <span class="badge badge-warning">編集中</span>
                                    @elseif ($variety->status == "要確認‼")
                                    <span class="badge badge-danger">要確認‼︎</span>
                                    @else
                                    <span class="badge">︎完了</span>
                                    @endif
                                </th>
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