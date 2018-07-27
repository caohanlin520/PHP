@extends("layout.admin")
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/Index/index')}}">首页</a> &raquo; <a href="{{url('admin/Navigator/navigator')}}">导航管理</a> &raquo; 添加导航
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/Navigator/navigator/create')}}"><i class="fa fa-plus"></i>新增导航</a>
                <a href="{{url('admin/Navigator/navigator')}}"><i class="fa fa-recycle"></i>全部导航</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url("admin/Navigator/navigator")}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>

                    <tr>
                        <th><i class="require">*</i>导航名称：</th>
                        <td>
                            <input type="text" class="lg" name="navigator_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>导航标题：</th>
                        <td>
                            <input type="text" class="lg" name="navigator_allias">
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>导航地址：</th>
                        <td>
                            <input type="text" class="lg" name="navigator_url" value="http://">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>导航排序：</th>
                        <td>
                            <input type="text" class="lg" name="navigator_order">
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection