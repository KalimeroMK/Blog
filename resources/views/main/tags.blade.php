@extends('layouts.main')
@include('layouts.menu')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                            @foreach($post as $posts)
                                <!-- masonry grid item start -->
                                    <!-- blogpost start -->
                                    <div class="col-4">
                                        <a class="overlay-link" href="/posts/{{ $posts->slug }}"><img
                                                src="{{$posts->post_image}}" alt="{{$posts->title}}"></a>
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
                <dic class="col-3">

                </dic>
            </div>
    </section>
    <!-- main-container end -->
@endsection
