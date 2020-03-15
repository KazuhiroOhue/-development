<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Memos;

class MemosController extends Controller
{
    public function add()
    {
        return view('admin.memos.create');
    }
    
    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Memos::$rules);

        $memos = new Memos;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$memos->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $memos->image_path = basename($path);
        } else {
            $memos->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $memos->fill($form);
        $memos->save();
        
        //↓テキストだとredirect('admin/memos/create')
        return redirect('admin/memos');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Memos::where('name', $cond_title)->get();
        } else {
            // それ以外はすべてのメモを取得する
            $posts = Memos::all();
        }
        return view('admin.memos.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    //↓追加Action↓
    public function detail(Request $request)
    {
        $memos = Memos::find($request->id);
        
        return view('admin.memos.detail',['memos' => $memos]);
    }
    
    public function edit(Request $request)
    {
        // Memos Modelからデータを取得する
        $memos = Memos::find($request->id);
        if (empty($memos)) {
            abort(404);    
        }
        return view('admin.memos.edit', ['memos_form' => $memos]);
    }


    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Memos::$rules);
        // Memos Modelからデータを取得する
        $memos = Memos::find($request->id);
        // 送信されてきたフォームデータを格納する
        $memos_form = $request->all();
        /*
        if〜が無いと、
        画像を変更した際にエラーになるらしい。
        */
        if (isset($memos_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $memos->image_path = basename($path);
            unset($memos_form['image']);
        } elseif (isset($request->remove)) {
            $memos->image_path = null;
            unset($memos_form['remove']);
        }
        unset($memos_form['_token']);

        // 該当するデータを上書きして保存する
        $memos->fill($memos_form)->save();

        return redirect('admin/memos');
    }
    
    public function delete(Request $request)
    {
        // 該当するMemos Modelを取得
        $memos = Memos::find($request->id);
        // 削除する
        $memos->delete();
        return redirect('admin/memos/');
  }  
    
}
