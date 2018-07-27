<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;


require_once 'code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {

        if($input = Input::get()){
            session_start();
            $code = new \Code();
            $_code = $code->get();


            if(strtolower($input['code'])!=strtolower($_code)){
                echo "验证码错误";
                return view("admin.login")->with("msg","验证码错误");
            }


            $user = User::first();
            if($user->user_name != $input['username'] || $user->password!= $input['password']){
                echo "用户名或者密码错误";
                return back()->with('msg','用户名或者密码错误！');
            }


            session(['user'=>$user]);
            return redirect("admin/Index/index");


        }
        return view('admin.login');
    }

    public function code()
    {
        session_start();

        $code = new \Code;
        $code->make();
    }







}
