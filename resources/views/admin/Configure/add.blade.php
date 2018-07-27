@extends("layout.admin")
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/Index/index')}}">首页</a> &raquo; <a href="{{url('admin/Configure/configure')}}">配置信息管理</a> &raquo; 添加商品
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
                <a href="{{url('admin/Configure/configure/create')}}"><i class="fa fa-plus"></i>新增配置信息</a>
                <a href="{{url('admin/Configure/configure')}}"><i class="fa fa-recycle"></i>全部配置信息</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url("admin/Configure/configure")}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                   

                    <tr>
                        <th><i class="require">*</i>配置信息名称：</th>
                        <td>
                            <input type="text" class="lg" name="configure_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>配置信息标题：</th>
                        <td>
                            <input type="text" class="lg" name="configure_title">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>配置信息排序：</th>
                        <td>
                            <input type="text" class="lg" name="configure_order">
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>配置信息类型：</th>
                        <td>
                            <input type="radio"  name="field_type" value = 'input' onclick="showTr()">input
                            <input type="radio"  name="field_type" value = 'textarea' onclick="showTr()">textarea
                            <input type="radio"  name="field_type" value = 'radio' onclick="showTr()">radio

                        </td>
                    </tr>

                    <tr class="field_value">
                        <th><i class="require">*</i>配置信息类型值：</th>
                        <td>
                            <input type="text" class="lg" name="field_value">
                        </td>
                    </tr>
                    <tr>
                        <th>配置信息说明：</th>
                        <td>
                            <textarea name="configure_tips"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>配置信息内容：</th>
                        <td>
                            <textarea name="configure_content"></textarea>
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
    <script>
        showTr();
        function showTr() {

            var type = $('input[name = field_type]:checked').val()
            if(type == 'radio'){
                $('.field_value').show();
            }else{
                $('.field_value').hide();
            }

        }
    </script>
@endsection