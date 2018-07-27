@extends('layout.home')

    @section('content')

        <div class="banner">
            <section class="box">
                <ul class="texts">
                    <p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>
                    <p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>
                    <p>加了锁的青春，不会再因谁而推开心门。</p>
                </ul>
                <div class="avatar"><a href="#"><span>后盾</span></a> </div>
            </section>
        </div>
        <div class="template">
            <div class="box">
                <h3>
                    <p><span>个人博客</span>模板 Templates</p>
                </h3>
                <ul>
                    @foreach($hot as $h)
                    <li><a href="/"  target="_blank"><img src="{{asset('style/home/images/01.jpg')}}"></a><span>{{$h->art_title}}</span></li>
                        @endforeach

                </ul>
            </div>
        </div>
        <article>
            <h2 class="title_tj">
                <p>文章<span>推荐</span></p>
            </h2>
            <div class="bloglist left">
                @foreach($data as $d)
                <h3>{{$d->art_title}}</h3>
                <figure><img src="{{asset('style/home/images/02.jpg')}}"></figure>
                <ul>
                    <p>{!!$d->art_content!!}</p>
                    <a title="/" href="/" target="_blank" class="readmore">阅读全文>></a>
                </ul>
                <p class="dateview"><span>{{date('Y-M-d',$d->art_time)}}</span><span>作者：{{$d->art_editor}}</span><span>个人博客：[<a href="/news/life/">程序人生</a>]</span></p>
                    @endforeach
                <div class = "page">
                    {{$data->links()}}
                </div>

            </div>
            <aside class="right">
                <div class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>
                <div class="news">
                    @parent
                    <h3 class="links">
                        <p>友情<span>链接</span></p>
                    </h3>
                    <ul class="website">
                        @foreach($links as $l)
                        <li><a href="{{$l->links_url}}" target="_blank">{{$l->links_name}}--{{$l->links_title}}</a></li>
                            @endforeach
                    </ul>
                </div>

                <!-- Baidu Button END -->
            </aside>
        </article>




    @endsection();
