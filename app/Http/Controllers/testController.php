<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class testController extends Controller
{
    //
    public function index(){
        $data = [
            'name' => "华仔",
            'age' => 26
        ];
        $data1 = [
            12,34
        ];
        $name = "kl;ajdf";
//        return view("welcome1")->with("name",$name);
        return view("welcome1",compact("data1"));

    }
}
