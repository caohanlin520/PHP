@extends('layout.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/Index/index')}}">首页</a> &raquo; <a href="{{url('admin/Navigator/navigator')}}">导航管理</a>
    </div>
    <!--面包屑导航 结束-->

    <!--结果页快捷搜索框 开始-->
    <div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
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
                <h3>分类管理</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/Navigator/navigator/create')}}"><i class="fa fa-plus"></i>新增导航</a>
                    <a href="{{url('admin/Navigator/navigator')}}"><i class="fa fa-recycle"></i>全部导航</a>
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
                        <th>导航名称</th>
                        <th>导航标题</th>
                        <th>导航地址</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" onchange = "changeOrder(this,{{$v->navigator_id}})" value="{{$v->navigator_order}}">
                        </td>
                        <td class="tc">{{$v->navigator_id}}</td>
                        <td>
                            <a href="#">{{$v->navigator_name}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v->navigator_title}}</a>
                        </td>
                        <td>{{$v->navigator_url}}</td>
                        <td>
                            <a href="{{url("admin/Navigator/navigator/$v->navigator_id/edit")}}">修改</a>
                            <a href="javascript:; "onclick="delcate({{$v->navigator_id}})">删除</a>
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
    function changeOrder(obj,navigator_id) {
        var navigator_order = $(obj).val();

        $.post('{{url("admin/Navigator/changeOrder")}}',
            {"_token":"{{csrf_token()}}",
                "navigator_id":navigator_id,"navigator_order":navigator_order}, function (data) {

                if(data.status==0){
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }

        });

    }
    function delcate(navigator_id) {

        layer.confirm('您确定要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/Navigator/navigator/')}}/"+navigator_id,{"_method":"delete","_token":"{{csrf_token()}}"},function (data) {

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
