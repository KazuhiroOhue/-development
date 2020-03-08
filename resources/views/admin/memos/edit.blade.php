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
                            <select type="rank" class="form-control" name="rank"> 
                            {{-- 要確認！！！！ --}}
                                @foreach(config('rank') as $key => $value)
                                    <option value="{{ $key }}" @if($memos_form->rank == $value) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="type">拳系</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="type" value="{{ $memos_form->type }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $memos_form->body }}</textarea>
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
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $memos_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection