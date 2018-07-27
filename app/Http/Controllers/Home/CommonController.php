<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Model\Navigator;
use App\Http\Model\Article;

class CommonController extends Controller
{
    //
    public function __construct ()
    {
        //最新发布文章6片
        $new = Article::orderBy('art_time','desc')->take(6)->get();
        //点击量最高的6篇文章
        $hot = Article::orderBy('art_view','desc')->take(6)->get();
        $navigator = Navigator::all();
        \View::share('navigator',$navigator);
        \View::share('new',$new);

        \View::share('hot',$hot);

    }
}
