@extends('layouts.admin')
@section('title', '技メモを編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="memos col-md-8 mx-auto">
                <h2 class="name">
                    {{ $memos->name }}
                </h2>
                <h5 class="date">
                    {{ $memos->updated_at->format('Y年m月d日') }}更新
                </h5>
                
                @if ( $memos->status == "編集中" ) 
                    <span class="text-info">※このメモは編集中です</span>
                @elseif ( $memos->status == "要確認‼" )
                    <span class="text-danger">※確認事項があります！！</span>
                @endif
                
                <div class="row">
                    <label class="col-md-2" for="rank">修得段位</label>
                    <div class="col-md-10">
                        {{ $memos->rank }}
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2" for="rank2">修得段位<br>（旧課程）</label>
                    <div class="col-md-10">
                        {{ $memos->rank2 }}
                        @empty($memos->rank2)
                         <p>？？</p>
                        @endempty
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2" for="type">拳系</label>
                    <div class="col-md-10">
                        {{ $memos->type }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $memos->body }}
                    </div>
                </div>
                <div class="image col-md-6 text-right mt-4">
                    @if ($memos->image_path)
                        <a href="{{ asset('storage/image/' . $memos->image_path) }}" data-lightbox="abc" data-title="技メモ">
                            <img src="{{ asset('storage/image/' . $memos->image_path) }}">
                        </a>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ action('Admin\MemosController@edit',['id' => $memos->id]) }}" role="button" class="btn btn-primary">編集</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ action('Admin\MemosController@delete',['id' => $memos->id]) }}" role="button" class="btn btn-primary" onclick="return check();">削除</a>   
                    </div>
                    <div class="col-md-4">
                        <a href="{{ action('Admin\MemosController@index') }}" role="button" class="btn btn-primary">一覧に戻る</a>
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