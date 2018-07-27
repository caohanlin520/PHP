<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use App\Http\Model\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
class ArticleController extends CommonController
{
    //
    //get . admin/Article/article 全部分类列表
    public function index (){
        $data = Article::orderBy('art_id')->paginate(3);
//        $cate = Category::where()->find();

        return view("admin.Article.list")->with("data",$data);


    }


    //post . admin/Article/article 提交添加分类
    public function store (){
        $input = Input::except("_token");
//        dd($input);
        $rule =[
            'cate_id'=>"required",
            'art_title'=>"required",

        ];
        $message = [
            "cate_id.required"=>"文章分类不能为空",
            "art_title.required"=>"文章标题不能为空",

        ];
        $input['art_time'] = time();

        $validator = \Validator::make($input,$rule,$message);

        if($validator->passes()){
            $re = Article::create($input);
            if($re){
                return redirect("admin/Article/article");

            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        } else{
            return back()->withErrors($validator);

        }
    }


    //GET|HEAD . admin/Article/article/create 添加分类
    public function create (){
        $data = Category::all();

        return view("admin.Article.add")->with("data",$data);
    }

    //GET|HEAD . admin/Article/article/{article} 显示单个分类信息
    public function show  (){

    }
    //admin/Article/article/{article} PUT|PATCH 更新分类
    public function update($art_id){
        $input = Input::all();
        $input = Input::except("_method","_token","cate_name");
        $input['art_time'] = time();
//        dd($input);

        $re = Article::where("art_id",$art_id)->update($input);
        if($re==1){
            return redirect('admin/Article/article');
        }else{
            return back()->withErrors("errors","分类信息跟新失败");
        }

    }
    //DELETE | admin/Article/article/{article} 删除单个分类
    public function destroy ($art_id){
        $re = Article::where("art_id",$art_id)->delete();

        if($re){
            $data = [
                'status'=>0,
                'msg'=>'分类删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'分类删除失败'
            ];
        }
        return $data;



    }
    //admin/Article/article/{article}/edit GET|HEAD 编辑分类
    public function edit($art_id){
        $data = Category::all();
        $field = Article::find($art_id);
        $cate_id = $field['cate_id'];
        $cate_name = Category::find($cate_id);
        $field['cate_name'] = $cate_name['cate_name'];
        return view('admin.Article.edit',compact('data','field'));
    }
}
