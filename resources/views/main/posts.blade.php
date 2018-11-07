@extends('layouts.main')
<title>{{$post->title}}</title>
<!-- Schema.org markup for Google+ -->
<meta name="description" content="Официјален веб портал на  Македонска правлславна црква Европска епархија"/>
<meta name="keywords"
      content="pravoslavna, crkva, православие, pravoslavie, црква, Бог, религија, bog, religija, manastir, gospodi, isus hristos, bogorodica"/>
<meta name="robots" content="index, follow">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link type="text/plain" rel="author" href="http://tge.mk/humans.txt"/>
<meta itemprop="name" content="{{$post->title}}">
<meta itemprop="description" content="{!! str_limit(strip_tags($post->content_raw), 300, '...')!!}">
<meta itemprop="image" content="{{$post->post_image}}">
<!-- Twitter Card data -->
<meta name="twitter:card" content="{{$post->post_image}}">
<meta name="twitter:site" content="@zaebalovek">
<meta name="twitter:title" content="{{$post->title}}">
<meta name="twitter:description" content="{!! str_limit(strip_tags($post->content_raw), 300, '...')!!}">
<meta name="twitter:creator" content="@zaebalovek">
<meta name="twitter:image" content="{{$post->post_image}}">
<!-- Open Graph data -->
<meta property="fb:app_id" content="1192823797520220"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://tge.mk/post/{{ $post->slug }}"/>
<meta property="og:title" content="{{$post->title}}"/>
<meta property="og:image" content="{{$post->post_image}}"/>
<meta property="og:description" content="{!! str_limit(strip_tags($post->content_raw), 300, '...')!!}"/>
<meta property="og:locale" content="en_US"/>
<meta name="author" content="Zoran Shefot Bogoevski">
@include('layouts.menu')
@section('content')
    <!--Header End-->
    <section style="margin-top: 2%">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-8">


                        @if( !empty($slider['user_id']))
                            <img src="{{$post->post_image}}" alt="{{$post->title}}">

                        @else
                            <main role="main">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach($sliders as $key => $slider)
                                            <li data-target="#myCarousel" data-slide-to="{{ $key }}"
                                                @if ($key == 0) class="active" @else @endif ></li>
                                        @endforeach

                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach($sliders as $key => $slider)

                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                                                <img src="/images/sliders/{{$slider->imagethumb}}" alt="image">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                @endif

                                <p class="mtb-15">{!!$post->content_raw!!}</p>

                                <div class="float-left-right text-center mt-40 mt-sm-20">

                                    <ul class="mb-30 list-li-mt-10 list-li-mr-5 list-a-plr-15 list-a-ptb-7 list-a-bg-grey list-a-br-2 list-a-hvr-primary ">
                                        @foreach($post->tags as $tag)
                                            <li><a href="/tags/{{ $tag->tag }}">{{ $tag->tag }}</a></li>
                                        @endforeach

                                    </ul>
                                    <ul class="mb-30 list-a-bg-grey list-a-hw-radial-35 list-a-hvr-primary list-li-ml-5">
                                        <li class="mr-10 ml-0">Share</li>
                                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="ion-social-google"></i></a></li>
                                        <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                    </ul>

                                </div>
                    </div>
                    <div class="col-4">
                        <div class="sidebarBlog">
                            <aside class="widget">
                                <div class="fb-page" data-href="https://www.facebook.com/tgemk/" data-tabs="timeline"
                                     data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                                     data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/tgemk/" class="fb-xfbml-parse-ignore"><a
                                            href="https://www.facebook.com/tgemk/">Тетовско - Гостиварска
                                            Епархија</a>
                                    </blockquote>
                                </div>

                                <a class="twitter-timeline"
                                   href="https://twitter.com/tgemk"
                                   data-tweet-limit="4">
                                    Tweets by tgemk</a>
                                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

