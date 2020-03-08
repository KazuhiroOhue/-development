<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Variety;

class VarietyController extends Controller
{
    public function index(Request $request)
    {
        $posts = Variety::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // variety/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('variety.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
