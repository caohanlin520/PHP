<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\CommonController;
use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends CommonController
{
    //
    public function index(){

//        dd($hot);

        //图文列表6篇，带分页
        $data= Article::orderBy('art_time','desc')->paginate(6);

        //友情链接
        $links = Links::orderBy('links_order','desc')->get();

        return view('Home.index',compact('hot','data','new','links'));
    }

    public function cate($cate_id){
        $field = Category::find($cate_id);
        //图文列表6篇，带分页
        $data= Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);
        $submenu = Category::where('cate_pid',$cate_id)->get();
        return view('Home.list',compact('field','data','submenu'));
    }



    public function article($art_id){
        $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
//        dd($field);
        $article['pre']=Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();

        $article['next']=Article::where('art_id','>',$art_id)->orderBy('art_id')->first();
        $data = Article::where(['cate_id'=>$field->cate_id])->where('art_id','!=',$field->art_id)->orderBy('art_id',$art_id)->take(6)->get();
        return view('Home.new',compact('field','article','data'));
    }
}
