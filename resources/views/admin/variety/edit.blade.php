@extends('layouts.admin')
@section('title', 'メモを編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1>メモを編集</h1>
                <form action="{{ action('Admin\VarietyController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $variety_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $variety_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $variety_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">状態</label>
                        <div class="col-md-5">
                            <select type="text" class="form-control" name="status"> 
                                {{-- configディレクトリのstatus.phpファイルに記載した配列を呼び出す --}}
                                @foreach(config('status') as $key => $score)
                                    <option value="{{ $score }}" @if($variety_form->status == $score) selected @endif>{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 offset-md-2">
                            <input type="hidden" name="id" value="{{ $variety_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-warning" value="更新" onclick="return check();">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function check() {
            if (window.confirm('この内容でよろしいですか？')) {
                //window.alert('更新されました');
		        return true;
	        } else {
		        return false;
	        }
        }
    </script>
@endsection