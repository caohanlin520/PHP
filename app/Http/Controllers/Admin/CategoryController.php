<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class CategoryController extends CommonController
{
    //get.admin/category 全部分类列表
    public function index(){
        $categorys = Category::orderBy('cate_id')->paginate(5);
//        dd($categorys);

        return view("admin.category.list")->with("data",$categorys);

    }


    //post.admin/category  提交添加分类
    public function store()
    {
        $input = Input::except("_token");
//        dd($input);
        $rule =[
            'cate_name'=>"required",
            'cate_title'=>"required",
            'cate_order'=>'required'

        ];
        $message = [
            "cate_name.required"=>"分类名称不能为空",
            "cate_title.required"=>"分类标题不能为空",
            "cate_order.required"=>"分类标题不能为空",

        ];

        $validator = \Validator::make($input,$rule,$message);

        if($validator->passes()){
            Category::create($input);
            return redirect("admin/Category/category");
        } else{
            return back()->withErrors($validator);

        }


    }


    //get.admin/category/create   添加分类
    public function create()
    {
        $data = Category::all();

        return view("admin.category.add")->with("data",$data);

    }

    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }

    //delete.admin/category/{category}   删除单个分类
    public function destroy($cate_id)
    {
        $re = Category::where("cate_id",$cate_id)->delete();
        Category::where("cate_pid",$cate_id)->update(['cate_pid'=>0]);

        if($re){
            $data = [
                'statis'=>0,
                'msg'=>'分类删除成功'
            ];
        }else{
            $data = [
                'statis'=>0,
                'msg'=>'分类删除失败'
            ];
        }
        return $data;


    }

    //put.admin/category/{category}    更新分类
    public function update($cate_id)
    {

        $input = Input::except("_method","_token");
        $re = Category::where("cate_id",$cate_id)->update($input);
        if ($re==1){
            return redirect('admin/Category/category');
        }else{
            return back()->withErrors("errors","分类信息跟新失败");
        }


    }

    //get.admin/category/{category}/edit  编辑分类
    public function edit($cate_id)
    {
        $field = Category::find($cate_id);
        $data = Category::all();
        return view("admin.category.edit",compact("field","data"));

    }


    public function changeOrder(){
        $input = Input::all();

//        dd($input);

        $cate = Category::find($input['cate_id']);
        $cate->cate_order= $input['cate_order'];
        $re = $cate->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '分类排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分类排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }


}
