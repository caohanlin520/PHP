<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use App\Http\Model\Navigator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use Symfony\Component\DomCrawler\Link;

class NavigatorController extends CommonController
{
    //GET|HEAD admin/Navigator/navigator
    public function index(){
        $data = Navigator::orderBy('navigator_order')->paginate(5);
//        dd($data);

        return view("admin.Navigator.list",compact('data'));

    }
    // POST admin/Navigator/navigatorƒ
    public function store(){

        $input = Input::except('_token');
        $ruler = [
            'navigator_name'=>'required',
            'navigator_url'=>'required',
        ];
        $message = [
            'navigator_name.required'=>'链接名称不能为空',
            'navigator_url.required'=>'链接url不能为空',

        ];
        $validator = \Validator::make($input,$ruler,$message);

        if($validator->passes()){
            $re = Navigator::create($input);

            if($re){
                return redirect("admin/Navigator/navigator");

            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        } else{
            return back()->withErrors($validator);

        }

    }
    // GET|HEAD admin/Navigator/navigator/create
    public function create(){

        return view('admin.Navigator.add');

    }
    //DELETE   admin/Navigator/navigator/{navigator}
    public function destroy($navigator_id){
        $re = Navigator::where("navigator_id",$navigator_id)->delete();

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
    //PUT|PATCH dmin/Navigator/navigator/{navigator}
    public function update($link_id){
        $input = Input::except('_token','_method');

        $re = Navigator::where('navigator_id',$link_id)->update($input);
        if($re){
            return redirect('admin/Navigator/navigator');
        }else{
            return back()->with('errors','链接修改失败！');
        }

    }
    //GET|HEAD  admin/Navigator/navigator/{navigator}
    public function show(){

    }

    //GET|HEAD admin/Navigator/navigator/{navigator}/edit
    public function edit($navigator_id){
        $field = Navigator::find($navigator_id);
        return view('admin.Navigator.edit')->with('field',$field);

    }


    public function changeOrder(){
        $input = Input::all();

//        dd($input);

        $navigator = Navigator::find($input['navigator_id']);
        $navigator->navigator_order= $input['navigator_order'];
        $re = $navigator->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '链接排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '链接排序排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }
}
