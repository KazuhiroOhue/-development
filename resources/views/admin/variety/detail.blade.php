@extends('layouts.admin')
@section('title', 'メモを編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="variety col-md-8 mx-auto">
                <h2 class="title">
                    {{ $variety->title }}
                </h2>
                <h5 class="date">
                    {{ $variety->updated_at->format('Y年m月d日') }}更新
                </h5>
                
                @if ( $variety->status == "編集中" ) 
                    <span class="text-info">※このメモは編集中です</span>
                @elseif ( $variety->status == "要確認‼" )
                    <span class="text-danger">※確認事項があります！！</span>
                @endif
                
                <div class="row">
                    <div class="col-md-12" for="body">
                        {{ $variety->body }}
                    </div>
                </div>
                <div class="image col-md-6 text-right mt-4">
                    @if ($variety->image_path)
                        <a href="{{ asset('storage/image/' . $variety->image_path) }}" data-lightbox="abcd" data-title="メモいろいろ">
                            <img src="{{ asset('storage/image/' . $variety->image_path) }}">
                        </a>
                    @endif
                </div>
                <br>
                <div class="row justify-content-around">
                    <p class="bt"><a href="{{ action('Admin\VarietyController@edit',['id' => $variety->id]) }}">編集</a></p>
                    <p class="bt"><a href="{{ action('Admin\VarietyController@delete',['id' => $variety->id]) }}" onclick="return check();">削除</a></p>
                    <p class="bt"><a href="{{ action('Admin\VarietyController@index') }}">一覧に戻る</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        function check (){
            if (window.confirm('本当に削除してよろしいですか？')) {
                //window.alert('削除されました');
		        return true;
	        } else {
		        return false;
	        }
        }
    </script>
@endsection