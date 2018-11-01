@extends('layouts.main')
@include('layouts.menu')
@section('content')

    <!-- section start -->
    <!-- ================ -->
    <section class="clearfix pv-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="isotope-container row grid-space-10">
                        @foreach(array_chunk($categories->all(), 4) as $categories)
                            <div class="row">
                                @foreach($categories as $category)
                                    <div class="col-md-3 col-sm-6 isotope-item {{ $category->slug }}">
                                        <div class="image-box shadow bordered text-center mb-20">
                                            <div class="overlay-container">
                                                <div class="img-container">
                                                    <img src="/assets/img/categories/medium/{{ $category->image }}"
                                                         alt="{{ $category->name }}">
                                                </div>
                                                <div class="overlay-top">
                                                    <div class="text">
                                                        <h3>
                                                            <a href="/categories/{{ $category->slug }}">{!! $category->name !!}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="overlay-bottom">
                                                    <p class="small">{{ $category->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
    <!-- section end -->
@endsection