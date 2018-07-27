@extends('layout.admin')
@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="{{url('home/Index/index')}}" class="active">首页</a></li>
				<li><a href="{{url('admin/Index/info')}}">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：admin</li>
				<li><a href="{{url('admin/Index/changePassword')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/Index/quit')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->
	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
				<ul class="sub_menu">
					{{--<li><a href="{{url('admin/Category/category/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li>--}}
					<li><a href="{{url('admin/Category/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
					{{--<li><a href="{{url('admin/Article/article/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加文章</a></li>--}}
					<li><a href="{{url('admin/Article/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>文章列表</a></li>
					<li><a href="tab.html" target="main"><i class="fa fa-fw fa-list-alt"></i>tab页</a></li>
					<li><a href="img.html" target="main"><i class="fa fa-fw fa-image"></i>图片列表</a></li>
				</ul>s
			</li>
			<li>
				<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/Links/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>友情链接</a></li>
					<li><a href="{{url('admin/Navigator/navigator')}}" target="main"><i class="fa fa-fw fa-database"></i>导航信息</a></li>
					<li><a href="{{url('admin/Configure/configure')}}" target="main"><i class="fa fa-fw fa-cubes"></i>配置信息</a></li>

				</ul>
			</li>

		</ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/Index/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
	</div>
@endsection()


	<!--底部 结束-->