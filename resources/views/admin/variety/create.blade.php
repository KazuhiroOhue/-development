@extends('layouts.admin')
@section('title', 'メモの追加')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1>新しいメモを追加</h1>
                <form action="{{ action('Admin\VarietyController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">状態</label>
                        <div class="col-md-5">
                            <select type="text" class="form-control" name="status"> 
                                @foreach(config('status') as $key => $score)
                                    <option value="{{ $score }}">{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 offset-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-warning" value="追加" onclick="return check();">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function check() {
            if (window.confirm('この内容でよろしいですか？')) {
                //window.alert('追加されました');
		        return true;
	        } else {
		        return false;
	        }
        }
    </script>
@endsection