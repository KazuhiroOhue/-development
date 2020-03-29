@extends('layouts.admin')
@section('title', '技メモを編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="memos col-md-8 mx-auto">
                <div class="row">
                    <div class="text col-md-10">
                        <div class="name">
                            {{ $memos->name }}
                        </div>
                        <div class="date">
                            {{ $memos->updated_at->format('Y年m月d日') }}
                        </div>
                        <div class="rank">
                            {{ $memos->rank }}
                        </div>
                        <div class="type">
                            {{ $memos->type }}
                        </div>
                        <div class="body mt-3">
                            {{ $memos->body }}
                        </div>
                        <div class="image col-md-6 text-right mt-4">
                            @if ($memos->image_path)
                               <img src="{{ asset('storage/image/' . $memos->image_path) }}">
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ action('Admin\MemosController@edit',['id' => $memos->id]) }}" role="button" class="btn btn-primary">編集</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ action('Admin\MemosController@delete',['id' => $memos->id]) }}" role="button" class="btn btn-primary" onclick="return check();">削除</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    //送信前の確認機能を追加
        function check() {
            if (window.confirm('本当に削除してよろしいですか？')) {
                //window.alert('削除されました');
		        return true;
	        } else {
		        return false;
	        }
        }
    </script>
@endsection