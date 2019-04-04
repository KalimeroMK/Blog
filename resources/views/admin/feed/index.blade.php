@extends('layouts.app')

@section('content')
    <div class="header">
        <h1><a href="{{ $permalink }}">{{ $title }}</a></h1>
    </div>

    @foreach ($items as $item)
        <div class="item">
            {{--<img src="{!! $item->get_thumbnail() !!}" />--}}
            <h2><a href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a></h2>
            <p>{!! $item->get_description() !!}  </p>


            <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
        </div>
    @endforeach
@endsection
