<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('info')
    <meta name="keywords" content="个人博客,后盾个人博客,个人博客模板,后盾" />
    <meta name="description" content="后盾个人博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
    <link href="{{asset('style/home/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('style/home/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('style/home/css/style.css')}}" rel="stylesheet">

    <script src="{{asset('style/js/modernizr.js')}}"></script>
</head>
<body>
<header>
    <div id="logo"><a href="/"></a></div>
    <nav class="topnav" id="topnav">
        @foreach($navigator as $n)<a href="{{$n->navigator_url}}"><span>{{$n->navigator_name}}</span><span class="en">{{$n->navigator_allias}}</span></a>@endforeach
    </nav>
</header>
@section('content')
    <h3>
        <p>最新<span>文章</span></p>
    </h3>
    <ul class="rank">
        @foreach($new as $n)<li><a href="{{$n->art_title}}" title={{$n->art_title}} target="_blank">{{$n->art_title}}</a></li>@endforeach
    </ul>
    <h3 class="ph">
        <p>点击<span>排行</span></p>
    </h3>
    <ul class="paih">
        @foreach($hot as $h)
            <li><a href="/" title="{{$h->art_title}}" target="_blank">{{$h->art_title}}</a></li>
        @endforeach

    </ul>
    @show
<footer>
    <p>Design by 后盾网 <a href="http://www.miitbeian.gov.cn/" target="_blank">http://www.houdunwang.com</a> <a href="/">网站统计</a></p>
</footer>
<script src="{{asset('style/js/silder.js')}}"></script>
</body>
</html>