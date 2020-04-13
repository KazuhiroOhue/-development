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

        /*
        フォームから画像が送信されてきたら、保存して、$memos->image_path に画像のパスを保存する
        isset：変数に値が入っているかどうかをチェックする関数
        store('public/image')を設定すると、storage/appの下にpublic/imageディレクトリが作成され、そこにファイルが保存される
        */
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
        //複数のワードで検索
        //値を取得
        $cond_name = $request->input('cond_name');
        $cond_rank = $request->input('cond_rank');
        $cond_type = $request->input('cond_type');
        
        //検索QUERY
        $query = Memos::query();
        
        if (!empty($cond_name)) {
            $query->where('name', 'like', '%'.$cond_name.'%');
        }
        
        if (!empty($cond_rank)) {
            $query->where('rank', 'like', '%'.$cond_rank.'%');
        }    
        
        if (!empty($cond_type)) {
            $query->where('type', 'like', '%'.$cond_type.'%');
        }
        
        $posts = $query->paginate(10);
        
        $hash = array(
            'cond_name' => $cond_name,
            'cond_rank' => $cond_rank,
            'cond_type' => $cond_type,
            'posts' => $posts,
            );
        
        return view('admin.memos.index')->with($hash);
        
        /*
        //１つのワードで検索↓↓↓
        
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            // 検索されたら検索結果を取得する
            $posts = Memos::where('name', $cond_name)->paginate(10);
        } else {
            // それ以外はすべてのメモを取得する
            $posts = Memos::paginate(10);
        }
        return view('admin.memos.index', ['posts' => $posts, 'cond_name' => $cond_name]);
        */
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

        return view('admin.memos.detail',['memos' => $memos]);
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
