@extends('layouts.admin')
@section('title', '技メモを編集する')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>技メモを編集する</h2>
                <form action="{{ action('Admin\MemosController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">技名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $memos_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="rank">段位</label>
                        <div class="col-md-10">
                            <select class="form-control" name="rank"> 
                                @foreach(config('rank') as $key => $score)
                                    <option value="{{ $score }}" @if($memos_form->rank == $score) selected @endif>{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">段位（旧課程）</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="rank2"> 
                                @foreach(config('rank2') as $key => $score)
                                    <option value="{{ $score }}" @if($memos_form->rank2 == $score) selected @endif>{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="type">拳系</label>
                        <div class="col-md-10">
                            <select class="form-control" name="type">
                                @foreach(config('type') as $key => $score)
                                    <option value="{{ $score }}" @if($memos_form->type == $score) selected @endif>{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20" maxlength="255">{{ $memos_form->body }}</textarea>
                            <p>全角255文字まで入力できます。<span id="txtlmt">0</span></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $memos_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">状態</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="status"> 
                                {{-- configディレクトリのstatus.phpファイルに記載した配列を呼び出す --}}
                                @foreach(config('status') as $key => $score)
                                    <option value="{{ $score }}" @if($memos_form->status == $score) selected @endif>{{ $score }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $memos_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新" onclick="return check();">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    //送信前の確認機能を追加
        function check() {
            if (window.confirm('この内容でよろしいですか？')) {
                //window.alert('更新されました');
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