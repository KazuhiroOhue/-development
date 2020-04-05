@extends('layouts.admin')
@section('title', 'メモを編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="title col-md-12">
                {{ $variety->title }}
            </div>
            <div class="date">
                {{ $variety->updated_at->format('Y年m月d日') }}
            </div>
        </div>
        <div class="variety">
            <div class="row">
                <div class="text col-md-8">
                    <div class="body mt-3">
                        {{ $variety->body }}
                    </div>
                </div>
                <div class="image col-md-4 mt-4">
                    @if ($variety->image_path)
                        <a href="{{ asset('storage/image/' . $variety->image_path) }}" data-lightbox="abcd" data-title="メモいろいろ">
                            <img src="{{ asset('storage/image/' . $variety->image_path) }}">
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ action('Admin\VarietyController@edit',['id' => $variety->id]) }}" role="button" class="btn btn-primary">編集</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ action('Admin\VarietyController@delete',['id' => $variety->id]) }}" role="button" class="btn btn-primary" onclick="return check();">削除</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ action('Admin\VarietyController@index') }}" role="button" class="btn btn-primary">一覧に戻る</a>
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