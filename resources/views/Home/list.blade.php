@extends('layout.home')
@section('info')
    <title>{{$field->cate_name}}}</title>
    <meta name="keywords" content="{{$field->cate_keywords}}" />
    <meta name="description" content="{{$field->cate_description}}" />
@endsection
@section('content')
<article class="blogs">
    <h1 class="t_nav"><span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span><a href="{{url('home/Index/index')}}" class="n1">网站首页</a><a href="{{url('home/Index/cate/'.$field->cate_id)}}" class="n2">{{$field->cate_name}}</a></h1>
    <div class="newblog left">

        @foreach($data as $d)
            <h2>{{$d->art_title}}</h2>
            <p class="dateview"><span>发布时间{{date('Y-M-d',$d->art_time)}}</span><span>作者：{{$d->art_editor}}</span><span>分类：[<a href="{{url('home/Index/cate/'.$field->cate_id)}}">{{$field->cate_name}}</a>]</span></p>
            <figure><img src="{{asset('style/home/images/001.png')}}"></figure>
            <ul class="nlist">
                <p>{!! $d->art_content !!}</p>
                <a title="{{$d->art_title}}" href="{{url('home/Index/article/'.$d->art_id)}}" target="_blank" class="readmore">阅读全文>></a>
            </ul>
            <div class="line"></div>
        @endforeach
        <div class="line"></div>
        <div class="blank"></div>
        <div class="ad">
            <img src="{{asset('style/home/images/ad.png')}}">
        </div>
        <div class="page">

            {{$data->links()}}

        </div>
    </div>
    <aside class="right">
        @if($submenu)
        <div class="rnav">
            <ul>
                @foreach($submenu as $k=>$s)
                    <li class="rnav{{$k+1}}"><a href="{{asset('home/Index/cate/'.$s->cate_id)}}" target="_blank">{{$s->cate_name}}</a></li>
                @endforeach

            </ul>
        </div>
        @endif
        <div class="news">
            @parent
        </div>
        <div class="visitors">
            <h3><p>最近访客</p></h3>
            <ul>

            </ul>
        </div>
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
        </script>
        <!-- Baidu Button END -->
    </aside>
</article>
@endsection();
