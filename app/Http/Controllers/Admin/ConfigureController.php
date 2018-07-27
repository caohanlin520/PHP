<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Configure;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class ConfigureController extends CommonController
{
    //
    //GET|HEAD admin/Configure/configure
    public function index(){
        $data = Configure::orderBy('configure_order')->paginate(5);
//        dd($data);

        return view("admin.Configure.list",compact('data'));

    }
    // POST admin/Configure/configureƒ
    public function store(){

        $input = Input::except('_token');
        $ruler = [
            'configure_name'=>'required',

        ];
        $message = [
            'configure_name.required'=>'配置信息名称不能为空',

        ];
        $validator = \Validator::make($input,$ruler,$message);

        if($validator->passes()){
            $re = Configure::create($input);

            if($re){
                return redirect("admin/Configure/configure");

            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        } else{
            return back()->withErrors($validator);

        }

    }
    // GET|HEAD admin/Configure/configure/create
    public function create(){

        return view('admin.Configure.add');

    }
    //DELETE   admin/Configure/configure/{configure}
    public function destroy($configure_id){
        $re = Configure::where("configure_id",$configure_id)->delete();

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
    //PUT|PATCH dmin/Configure/configure/{configure}
    public function update($link_id){
        $input = Input::except('_token','_method');

        $re = Configure::where('configure_id',$link_id)->update($input);
        if($re){
            return redirect('admin/Configure/configure');
        }else{
            return back()->with('errors','配置信息修改失败！');
        }

    }
    //GET|HEAD  admin/Configure/configure/{configure}
    public function show(){

    }

    //GET|HEAD admin/Configure/configure/{configure}/edit
    public function edit($configure_id){
        $field = Configure::find($configure_id);
        return view('admin.Configure.edit')->with('field',$field);

    }
    
    
    public function changeOrder(){
        $input = Input::all();

        $cate = Configure::find($input['configure_id']);

        $cate->configure_order= $input['configure_order'];
        $re = $cate->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '配置信息排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '配置信息排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

}
