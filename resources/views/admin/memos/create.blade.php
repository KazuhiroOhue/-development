@extends('layouts.admin')

@section('title', '技メモを追加する')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>技メモを追加する</h2>
                <form action="{{ action('Admin\MemosController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">技名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">段位</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="rank"> 
                                {{-- configディレクトリのrank.phpファイルに記載した配列を呼び出す --}}
                                @foreach(config('rank') as $key => $score)
                                    <option value="{{ $score }}">{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">段位（旧課程）</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="rank2"> 
                                {{-- configディレクトリのrank2.phpファイルに記載した配列を呼び出す --}}
                                @foreach(config('rank2') as $key => $score)
                                    <option value="{{ $score }}">{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">拳系（プルダウンメニューから選択）</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="type"> 
                                {{-- configディレクトリのtype.phpファイルに記載した配列を呼び出す --}}
                                @foreach(config('type') as $key => $score)
                                    <option value="{{ $score }}">{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20" maxlength="255">{{ old('body') }}</textarea>
                            <p>全角255文字まで入力できます。<span id="txtlmt">0</span></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">状態</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="status"> 
                                {{-- configディレクトリのstatus.phpファイルに記載した配列を呼び出す --}}
                                @foreach(config('status') as $key => $score)
                                    <option value="{{ $score }}">{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="追加" onclick="return check()">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    //送信前の確認機能を追加
        function check(){
            if (window.confirm('この内容でよろしいですか？')) {
                //window.alert('追加されました');
		        return true;
	        } else {
		        return false;
	        }
        }
    //残り文字数を表示   
        $(function () {
            $("textarea").keyup(function(){
                var txtcount = $(this).val().length;
                $("#txtlmt").text(txtcount);
                if(txtcount == 0){
                    $("#txtlmt").text("0");
                } 
                if(txtcount >= 200){
                    $("#txtlmt").css("color","#d577ab");
                } else {
                    $("#txtlmt").css("color","#333");
                }
            });
        });
    </script>
@endsection