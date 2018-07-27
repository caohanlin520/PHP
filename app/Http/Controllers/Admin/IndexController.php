<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\User;




use App\Http\Requests;

class IndexController extends CommonController
{
    //

    public function index(){
        return view("admin.index");


    }

    public function info(){
        return view('admin.info');


    }
    //退出后台管理系统
    public function quit(){
        session(['user'=>null]);
        return redirect("admin/Login/login");
    }

    //修改密码
    public function changePassword(){
        if($input = Input::all()){
            $rules = [
                'password'=>'required | between:6,20|confirmed' ,
            ];
            $message=[

                'password.required'=>'新密码不能为空',
                'password.between'=>'密码长度必须在6-20之间',
                'password.confirmed'=>'新密码输入不一致',

            ];
            $validator = \Validator::make($input,$rules,$message);
            if($validator->passes()){
                $user = User::first();
                $original_password = $user->password;
                $input_original_password = $input['password_o'];
                if($original_password == $input_original_password){
                    $user->password = $input['password'];
                    $user->update();
                }else{
                    return back()->with('errors','原密码错误！');
                }


            }else{

                return back()->withErrors($validator);

            }
//            dd($input);
        }else{
            return view('admin.changePassword');
        }

    }

}
