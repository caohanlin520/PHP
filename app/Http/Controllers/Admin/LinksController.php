<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use App\Http\Model\Links;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use Symfony\Component\DomCrawler\Link;

class LinksController extends CommonController
{
    //GET|HEAD admin/Links/links
    public function index(){
        $data = Links::orderBy('links_order')->paginate(5);
//        dd($data);

        return view("admin.Links.list",compact('data'));

    }
    // POST admin/Links/links
    public function store(){

        $input = Input::except('_token');
        $ruler = [
            'links_name'=>'required',
            'links_url'=>'required',
        ];
        $message = [
            'links_name.required'=>'链接名称不能为空',
            'links_url.required'=>'链接url不能为空',

        ];
        $validator = \Validator::make($input,$ruler,$message);

        if($validator->passes()){
            $re = Links::create($input);

            if($re){
                return redirect("admin/Links/links");

            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        } else{
            return back()->withErrors($validator);

        }

    }
    // GET|HEAD admin/Links/links/create
    public function create(){

        return view('admin.Links.add');

    }
    //DELETE   admin/Links/links/{links}
    public function destroy($links_id){
        $re = Links::where("links_id",$links_id)->delete();

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
    //PUT|PATCH dmin/Links/links/{links}
    public function update($link_id){
        $input = Input::except('_token','_method');

        $re = Links::where('links_id',$link_id)->update($input);
        if($re){
            return redirect('admin/Links/links');
        }else{
            return back()->with('errors','链接修改失败！');
        }

    }
    //GET|HEAD  admin/Links/links/{links}
    public function show(){

    }

    //GET|HEAD admin/Links/links/{links}/edit
    public function edit($links_id){
        $field = Links::find($links_id);
        return view('admin.Links.edit')->with('field',$field);

    }


    public function changeOrder(){
        $input = Input::all();

//        dd($input);

        $links = Links::find($input['links_id']);
        $links->links_order= $input['links_order'];
        $re = $links->update();
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
