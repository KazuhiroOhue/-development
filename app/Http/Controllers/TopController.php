<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Memos;

class TopController extends Controller
{
    //未使用
    public function index(Request $request)
    {
        return view('top_page');
    }
}
