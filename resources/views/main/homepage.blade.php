@extends('layouts.main')
@include('layouts.menu')
@section('content')
        <div class="clearfix"></div>

<div class="container">
    <div class="h-600x h-sm-auto">
        <div class="h-2-3 h-sm-auto oflow-hidden">

            <div class="pb-5 pr-5 pr-sm-0 float-left float-sm-none w-2-3 w-sm-100 h-100 h-sm-300x">

                @foreach($post as $index => $posts)
                @if($index < 1)
                <a class="pos-relative h-100 dplay-block" href="/posts/{{ $posts->slug }}">

                    <div class="img-bg bg-grad-layer-6"
                    style="background: url({{$posts->post_image}}) no-repeat center;
                    background-size: cover;"></div>

                    <div class="abs-blr color-white p-20 bg-sm-color-7">
                        <h3 class="mb-15 mb-sm-5 font-sm-13"><b>{{ $posts->title }}</b></h3>
                        <ul class="list-li-mr-20">
                            <li>by <span
                                class="color-primary"><b></b></span> {!!  $posts->created_at !!}
                            </li>
                            {{--<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>--}}
                            {{--<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>30</li>--}}
                        </ul>
                    </div><!--abs-blr -->
                </a><!-- pos-relative -->
                @endif
                @endforeach
            </div><!-- w-1-3 -->

            <div class="float-left float-sm-none w-1-3 w-sm-100 h-100 h-sm-600x">
                @foreach($post as $index => $posts)
                @if($index > 1 && $index < 4 )
                <div class="pl-5 pb-5 pl-sm-0 ptb-sm-5 pos-relative h-50">

                    <a class="pos-relative h-100 dplay-block" href="/posts/{{ $posts->slug }}">

                        <div class="img-bg bg-grad-layer-6"
                        style="background: url({{$posts->post_image}}) no-repeat center;
                        background-size: cover;"></div>

                        <div class="abs-blr color-white p-20 bg-sm-color-7">
                            <h4 class="mb-10 mb-sm-5"><b>{{ $posts->title }}</b></h4>
                            <ul class="list-li-mr-20">
                                <li>{!!  $posts->created_at !!}</li>
                                {{--<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>--}}
                                {{--<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>30</li>--}}
                            </ul>
                        </div><!--abs-blr -->
                    </a><!-- pos-relative -->

                </div><!-- w-1-3 -->
                @endif
                @endforeach

            </div><!-- float-left -->

        </div><!-- h-2-3 -->

        <div class="h-1-3 oflow-hidden">
            @foreach($post as $index => $posts)
            @if($index > 4 && $index < 8 )
            <div
            class="pr-5 pr-sm-0 pt-5 float-left float-sm-none pos-relative w-1-3 w-sm-100 h-100 h-sm-300x">
            <a class="pos-relative h-100 dplay-block" href="/posts/{{ $posts->slug }}">

                <div class="img-bg bg-grad-layer-6"
                style="background: url({{$posts->post_image}}) no-repeat center;
                background-size: cover;"></div>

                <div class="abs-blr color-white p-20 bg-sm-color-7">
                    <h4 class="mb-10 mb-sm-5"><b>{{ $posts->title }}</b></h4>
                    <ul class="list-li-mr-20">
                        <li>{!!  $posts->created_at !!}</li>
                        {{--<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>--}}
                        {{--<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>30</li>--}}
                    </ul>
                </div><!--abs-blr -->
            </a><!-- pos-relative -->
        </div><!-- w-1-3 -->
        @endif
        @endforeach


    </div><!-- h-2-3 -->
</div><!-- h-100vh -->
</div><!-- container -->
<div class="container">
    <div class="row">
        <div class="col-8">
                            <h4 class="p-title"><b>RECENT NEWS</b></h4>

            <div class="row">
                @foreach($post as $index => $posts)
                @if($index > 8 && $index <= 9 )
                <div class="col-6">
                    <img src="{{$posts->post_image}}" alt="{{$posts->title}}">
                    <h4 class="pt-20"><a href="/posts/{{ $posts->slug }}"><b>{{ $posts->title }}</b></a>
                    </h4>
                    <ul class="list-li-mr-20 pt-10 pb-20">
                        <li class="color-lite-black">
                            {!!  $posts->created_at !!}
                        </li>
                        {{--<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i><b>30,190</b></li>--}}
                        {{--<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i><b>47</b></li>--}}
                    </ul>
                    <p>{!! str_limit(strip_tags($posts->content_raw),160, $end = '...' ) !!}</p>
                </div><!-- col-sm-6 -->
                @endif
                @endforeach
                <div class="col-6">
                    @foreach($post as $index => $posts)
                    @if($index > 9 && $index < 14 )
                    <a class="oflow-hidden pos-relative mb-20 dplay-block"
                    href="/posts/{{ $posts->slug }}">
                    <div class="wh-100x abs-tlr"><img src="{{$posts->post_image}}"
                      alt="{{$posts->title}}">
                  </div>
                  <div class="ml-120 min-h-100x">
                    <h5><b>{{$posts->title}}</b></h5>
                    <h6 class="color-lite-black pt-10">  {!!  $posts->created_at !!}</h6>
                </div>
            </a><!-- oflow-hidden -->
            @endif
            @endforeach
        </div><!-- col-sm-6 -->
        @foreach($post as $index => $posts)
        @if($index > 14 && $index < 21 )
        <div class="col-6">
            <img src="{{$posts->post_image}}" alt="{{$posts->title}}">
            <h4 class="pt-20"><a href="/posts/{{ $posts->slug }}"><b>{{$posts->title}}</b></a></h4>
            <ul class="list-li-mr-20 pt-10 mb-30">
                <li class="color-lite-black">
                    {!!  $posts->created_at !!}
                </li>
                <li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
                <li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>47</li>
            </ul>
        </div><!-- col-sm-6 -->
        @endif
        @endforeach
    </div>
</div>
<div class="col-4">
    <h4 class="p-title"><b>POPULAR POSTS</b></h4>
    @foreach($post as $index => $posts)
        @if($index > 21 && $index < 27 )
    <a class="oflow-hidden pos-relative mb-20 dplay-block" href="/posts/{{ $posts->slug }}">
        <div class="wh-100x abs-tlr"><img src="{{$posts->post_image}}" alt="{{$posts->title}}"></div>
        <div class="ml-120 min-h-100x">
            <h5><b>{{$posts->title}}</b></h5>
            <h6 class="color-lite-black pt-10">
            {!!  $posts->created_at !!}
        </h6>
        </div>
    </a><!-- oflow-hidden -->
 @endif
        @endforeach

</div>
</div>
</div>
</section>
@endsection

