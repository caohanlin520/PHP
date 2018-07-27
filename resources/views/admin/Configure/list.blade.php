@extends('layout.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/Index/index')}}">首页</a> &raquo; <a href="{{url('admin/Configure/configure')}}">配置管理</a>
    </div>
    <!--面包屑导航 结束-->

    <!--结果页快捷搜索框 开始-->
    <div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择配置:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class = "result_titile">
                <h3>配置管理</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/Configure/configure/create')}}"><i class="fa fa-plus"></i>新增配置</a>
                    <a href="{{url('admin/Configure/configure')}}"><i class="fa fa-recycle"></i>全部配置</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>配置名称</th>
                        <th>配置标题</th>
                        <th>配置内容</th>
                        <th>配置说明</th>
                        <th>字段类型</th>
                        <th>类型值</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" onchange = "changeOrder(this,{{$v->configure_id}})"value="{{$v->configure_order}}">
                        </td>
                        <td class="tc">{{$v->configure_id}}</td>
                        <td>
                            <a href="#">{{$v->configure_name}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v->configure_title}}</a>
                        </td>
                        <td>{{$v->configure_content}}</td>
                        <td>{{$v->configure_tips}}</td>
                        <td>{{$v->field_type}}</td>
                        <td>{{$v->field_value}}</td>
                        <td>
                            <a href="{{url("admin/Configure/configure/$v->configure_id/edit")}}">修改</a>
                            <a href="javascript:; "onclick="delconfigure({{$v->configure_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach

                </table>






                <div class="page_list">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
<script>
    function changeOrder(obj,configure_id) {
        var configure_order = $(obj).val();

        $.post('{{url("admin/Configure/changeOrder")}}',
            {"token":"{{csrf_token()}}",
                "configure_id":configure_id,"configure_order":configure_order}, function (data) {

                if(data.status===0){
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }

        });

    }
    function delconfigure(configure_id) {

        layer.confirm('您确定要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/Configure/configure/')}}/"+configure_id,{"_method":"delete","_token":"{{csrf_token()}}"},function (data) {

                location.href = location.href;
                if(data.status==0){
                    layer.msg(data.msg,{icon:6});
                }else{
                    layer.msg(data.msg,{icon:5});
                }

            })
        });
    }





</script>
@endsection()
