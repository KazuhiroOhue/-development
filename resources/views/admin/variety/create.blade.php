@extends('layouts.admin')

@section('title', 'メモの追加')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>新しいメモを追加</h2>
                <form action="{{ action('Admin\VarietyController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="追加" onclick="return check();">
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