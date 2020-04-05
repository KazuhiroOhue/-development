<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Variety;


class VarietyController extends Controller
{
    //
    public function add()
    {
        return view('admin.variety.create');
    }
    
    public function create(Request $request)
    {
        
        // Varidationを行う
        $this->validate($request, Variety::$rules);

        $variety = new Variety;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $variety->image_path = basename($path);
        } else {
            $variety->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $variety->fill($form);
        $variety->save();
      
        return redirect('admin/variety');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Variety::where('title', 'like','%'.$cond_title.'%')->paginate(10);
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Variety::paginate(10);
        }
        return view('admin.variety.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    //↓追加Action↓
    public function detail(Request $request)
    {
        $variety = Variety::find($request->id);
        
        return view('admin.variety.detail',['variety' => $variety]);
    }
    
    public function edit(Request $request)
    {
        // Variety Modelからデータを取得する
        $variety = Variety::find($request->id);
        if (empty($variety)) {
            abort(404);    
        }
        return view('admin.variety.edit', ['variety_form' => $variety]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Variety::$rules);
        // News Modelからデータを取得する
        $variety = Variety::find($request->id);
        // 送信されてきたフォームデータを格納する
        $variety_form = $request->all();
        /*
        if〜が無いと、
        画像を変更した際にエラーになるらしい。
        */
        if (isset($variety_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $variety->image_path = basename($path);
            unset($variety_form['image']);
        } elseif (isset($request->remove)) {
            $variety->image_path = null;
            unset($variety_form['remove']);
        }
        
        unset($variety_form['_token']);

        // 該当するデータを上書きして保存する
        $variety->fill($variety_form)->save();
    
        return redirect('admin/variety/');
    }
    
    public function delete(Request $request)
    {
        // 該当するVariety Modelを取得
        $variety = Variety::find($request->id);
        // 削除する
        $variety->delete();
        return redirect('admin/variety/');
    }  
}
