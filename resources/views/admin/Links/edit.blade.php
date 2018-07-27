@extends("layout.admin")
@section('content')
    <div class="result_wrap">
        <div class="result_title">
            <h3>修改密码</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(!is_string($errors))

                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif

        </div>
    </div>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/Index/index')}}">首页</a> &raquo; <a href="{{url('admin/Links/links')}}">分类管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/Links/links/create')}}"><i class="fa fa-plus"></i>新增分类</a>
                <a href="{{url('admin/Links/links')}}"><i class="fa fa-recycle"></i>全部分类</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/Links/links/'.$field->links_id)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>


                    <tr>
                        <th><i class="require">*</i>链接名称：</th>
                        <td>
                            <input type="text" class="lg" name="links_name" value="{{$field->links_name}}">
                            <p>分类名称必须填写</p>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>链接标题：</th>
                        <td>
                            <input type="text" class="lg" name="links_title" value="{{$field->links_title}}">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>


                    <tr>
                        <th><i class="require">*</i>链接地址：</th>
                        <td>
                            <input type="text" class="lg" name="links_url" value="{{$field->links_url}}" value="http://">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>链接排序：</th>
                        <td>
                            <input type="text" class="lg" name="links_order" value="{{$field->links_order}}">
                            <p>标题可以写30个字</p>
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