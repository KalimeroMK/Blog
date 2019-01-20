@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.dashboard.title') }}
@endsection

@section('template_description')
@endsection

@section('header_title')
    {{ trans('admin.dashboard.header') }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">
                    {!! trans('admin.dashboard.welcome-card-title', ['username' => Auth::user()->name]) !!}
                </h5>
                <p class="card-category">
                        <p class="mtb-15">{!!$post->title!!}</p>

                </p>
            </div>
            <hr>
            <div class="card-body ">
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

            </div>
            @foreach($post->tags as $tag)
            <a href="/tags/{{ $tag->tag }}"><span class="badge badge-primary">{{ $tag->tag }}</span></a>
                    @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
