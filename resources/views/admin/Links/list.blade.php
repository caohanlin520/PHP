@extends('layout.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/Index/index')}}">首页</a> &raquo; <a href="{{url('admin/Links/links')}}">链接管理</a>
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
                    <a href="{{url('admin/Links/links/create')}}"><i class="fa fa-plus"></i>新增链接</a>
                    <a href="{{url('admin/Links/links')}}"><i class="fa fa-recycle"></i>全部链接</a>
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
                        <th>链接名称</th>
                        <th>链接标题</th>
                        <th>链接地址</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" onchange = "changeOrder(this,{{$v->links_id}})" value="{{$v->links_order}}">
                        </td>
                        <td class="tc">{{$v->links_id}}</td>
                        <td>
                            <a href="#">{{$v->links_name}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v->links_title}}</a>
                        </td>
                        <td>{{$v->links_url}}</td>
                        <td>
                            <a href="{{url("admin/Links/links/$v->links_id/edit")}}">修改</a>
                            <a href="javascript:; "onclick="delcate({{$v->links_id}})">删除</a>
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
    function changeOrder(obj,links_id) {
        var links_order = $(obj).val();

        $.post('{{url("admin/Links/changeOrder")}}',
            {"_token":"{{csrf_token()}}",
                "links_id":links_id,"links_order":links_order}, function (data) {

                if(data.status==0){
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }

        });

    }
    function delcate(links_id) {

        layer.confirm('您确定要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/Links/links/')}}/"+links_id,{"_method":"delete","_token":"{{csrf_token()}}"},function (data) {

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
