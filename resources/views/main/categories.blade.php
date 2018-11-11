@extends('layouts.main')
@include('layouts.menu')

@section('content')

<section>

    <div class="container">
        <div class="row">
            <!-- main start -->
            <!-- ================ -->
            <div class="col-9">
                <div class="row">
                    <!-- page-title start -->
                    <!-- ================ -->
                 {{--    <h1>{{ $category->name }}</h1>
                    {!! $category->description !!} --}}
                    <!-- page-title end -->

                    @foreach($category->getImmediateDescendants() as $descendant)
                    <!-- masonry grid item start -->
                    <div class="col-12">
                        @if($descendant->post_image)
                        <div class="col-4">
                            <img src="" alt="">
                            <img src="/images/categories/{{ $descendant->post_image }}" alt="">
                            <a class="overlay-link" href="/categories/{{ $descendant->slug }}""><i
                                class="fa fa-link"></i></a>
                            </div>
                            @endif
                            <div class="col-8">
                                <header>
                                    <h2><a href="/categories/{{ $descendant->slug }}">{{ $descendant->name }}</a></h2>

                                </header>
                                <div class="blogpost-content">
                                    <p>{!! strip_tags(str_limit($descendant->description,100,'...')) !!}</p>
                                </div>
                                <footer class="clearfix">

                                    <div class="link pull-right"><i class="icon-link"></i><a
                                        href="/categories/{{ $descendant->slug }}">Повеќе</a>
                                    </div>
                                </footer>
                            </div>
                            <!-- masonry grid item end -->
                            @endforeach

                            <!-- masonry grid start -->
                            <!-- ================ -->
                                <div class="col-12">
<div class="row">
                                    @foreach($post as $posts)
                                    <!-- masonry grid item start -->
                                    <!-- blogpost start -->
                                    <div class="col-4">
                                    <a class="overlay-link" href="/posts/{{ $posts->slug }}"><img src="{{$posts->post_image}}" alt="{{$posts->title}}"></a>
                                    </div>
                                    <div class="col-8">
                                            <h2><a href="/posts/{{ $posts->slug }}">{{ $posts->title }}</a></h2>

                                        <div class="blogpost-content">
                                            <p>{!! strip_tags(str_limit($posts->content_raw,400,'...')) !!}</p>
                                        </div>
                                        <footer class="clearfix">

                                            <div class="link pull-right"><i class="icon-link"></i><a
                                                href="/posts/{{ $posts->slug }}">Повеќе</a>
                                            </div>
                                        </footer>
                                    </div>
                                    @endforeach

                        {{ $post->links() }}

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- main-container end -->
                @endsection
