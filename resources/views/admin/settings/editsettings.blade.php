@extends('layouts.app')

@section('scripts')
    <!-- Google Maps -->
    <script type="text/javascript"
            src="http://maps.googleapis.com/maps/api/js?&libraries=places&key=AIzaSyA75bnzyJ_5j2Ger9Erjo1Q-0XucnZbst4"></script>
    <script type="text/javascript" src="/js/maps.js"></script>

    $(document).ready(function () {
    // Google Maps


    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: {{ $settings->lat }}, lng: {{ $settings->lng }} },
    zoom: 10
    });

    var marker = new google.maps.Marker({
    position: {lat: {{ $settings->lat }}, lng: {{ $settings->lng }} },
    map: map,
    draggable: true
    });

    var input = document.getElementById('searchmap');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

    google.maps.event.addListener(searchBox, 'places_changed', function () {
    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();
    var i, place;
    for (i = 0; place = places[i]; i++) {
    bounds.extend(place.geometry.location);
    marker.setPosition(place.geometry.location);
    }
    map.fitBounds(bounds);
    map.setZoom(8);

    });

    google.maps.event.addListener(marker, 'position_changed', function () {
    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();

    $('#lat').val(lat);
    $('#lng').val(lng);
    });


    $("form").bind("keypress", function (e) {
    if (e.keyCode == 13) {
    $("#searchmap").attr('value');
    //add more buttons here
    return false;
    }
    });

    });

    </script>
    @endsection



    @section('content')
    <
    div
    class
    = "col-lg-10" >
        < div
    class
    = "row" >
        < div
    class
    = "col-lg-offset-1 col-sm-offset-1 col-lg-10 col-sm-12 col-xs-12" >

        @if(Session::has('flash_message'))
        < div
    class
    = "alert alert-success" >
        {{ Session::get('flash_message') }}
        < /div>
        @endif

        < div
    class
    = "widget" >
        < div
    class
    = "widget-header bordered-bottom bordered-warning" >
        < span
    class
    = "widget-caption" > Подесувања < /span>
        < /div>
        < div
    class
    = "widget-body" >

        < div
    class
    = "img-refferal" >
        @if(!!$settings->logo)
        < img
    class
    = "img-responsive"
    src = "/img/logo/thumbnails/{{ $settings->logo }}"
    alt = "{{ $settings->title }}" / >
        @endif
        < /div>
        < br / >


        < div
    id = "horizontal-form" >

        {{--{{ Form::model('settings', array('route' => array('admin.settings.update'), 'method' => 'PUT','role' => 'form','files' => true)) }}--}}
        {!! Form::model('settings', ['action' => ['SettingsController', $settings->id], 'method' => 'PUT']) !!}

        {!! csrf_field() !!}


        < div
    class
    = "input-group{{ $errors->has('image') ? ' has-error' : '' }}" >
        < span
    class
    = "input-group-btn" >
        < span
    class
    = "btn btn-info shiny btn-file" >
        < i
    class
    = "btn-label fa fa-image" > < /i> Browse... <input type="file" name="logo">
        < /span>
        < /span>
        < input
    type = "text"
    class
    = "form-control"
    readonly = "" >
        < /div>
        < br / >
        @if ($errors->has('image')) < p
    class
    = "alert alert-danger" >{{ $errors->first('image') }}< /p> @endif

            <div class="form-group">
        < label
    for= "title" > Наслов < /label>
        < input type = "text"
    name = "title"
    class
    = "form-control"
    value = "{{ $settings->title }}" >
        < /div>
        @if ($errors->has('title')) < p
    class
    = "alert alert-danger" >{{ $errors->first('title') }}< /p> @endif

            <div class="form-group">
        < label > Главна
    адреса: <
    /label>
    < input
    name = "mainurl"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->mainurl }}" >
        < /div>
        @if ($errors->has('mainurl')) < p
    class
    = "alert alert-danger" >{{ $errors->first('mainurl') }}< /p> @endif


            <div class="form-group">
        < label > Email
    адреса: <
    /label>
    < input
    name = "email"
    type = "email"
    class
    = "form-control"
    value = "{{ $settings->email }}" >
        < /div>
        @if ($errors->has('email')) < p
    class
    = "alert alert-danger" >{{ $errors->first('email') }}< /p> @endif

            <div class="form-group">
        < label > Адреса
    : <
    /label>
    < input
    name = "address"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->address }}" >
        < /div>
        @if ($errors->has('address')) < p
    class
    = "alert alert-danger" >{{ $errors->first('address') }}< /p> @endif

            <div class="form-group">
        < label > Телефон
    : <
    /label>
    < input
    name = "phone"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->phone }}" >
        < /div>
        @if ($errors->has('phone')) < p
    class
    = "alert alert-danger" >{{ $errors->first('phone') }}< /p> @endif

            <div class="form-group">
        < label > Twitter
    : <
    /label>
    < input
    name = "twitter"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->twitter }}" >
        < /div>
        @if ($errors->has('twitter')) < p
    class
    = "alert alert-danger" >{{ $errors->first('twitter') }}< /p> @endif

            <div class="form-group">
        < label > Facebook
    : <
    /label>
    < input
    name = "facebook"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->facebook }}" >
        < /div>
        @if ($errors->has('facebook')) < p
    class
    = "alert alert-danger" >{{ $errors->first('facebook') }}< /p> @endif

            <div class="form-group">
        < label > Skype
    : <
    /label>
    < input
    name = "skype"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->skype }}" >
        < /div>
        @if ($errors->has('skype')) < p
    class
    = "alert alert-danger" >{{ $errors->first('skype') }}< /p> @endif

            <div class="form-group">
        < label > LinkedIn
    : <
    /label>
    < input
    name = "linkedin"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->linkedin }}" >
        < /div>
        @if ($errors->has('linkedin')) < p
    class
    = "alert alert-danger" >{{ $errors->first('linkedin') }}< /p> @endif

            <div class="form-group">
        < label > Google
    Plus: <
    /label>
    < input
    name = "gplus"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->gplus }}" >
        < /div>
        @if ($errors->has('gplus')) < p
    class
    = "alert alert-danger" >{{ $errors->first('gplus') }}< /p> @endif

            <div class="form-group">
        < label > Youtube
    : <
    /label>
    < input
    name = "youtube"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->youtube }}" >
        < /div>
        @if ($errors->has('youtube')) < p
    class
    = "alert alert-danger" >{{ $errors->first('youtube') }}< /p> @endif

            <div class="form-group">
        < label > Flickr
    : <
    /label>
    < input
    name = "flickr"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->flickr }}" >
        < /div>
        @if ($errors->has('flickr')) < p
    class
    = "alert alert-danger" >{{ $errors->first('flickr') }}< /p> @endif

            <div class="form-group">
        < label > Pinterest
    : <
    /label>
    < input
    name = "pinterest"
    type = "text"
    class
    = "form-control"
    value = "{{ $settings->pinterest }}" >
        < /div>
        @if ($errors->has('pinterest')) < p
    class
    = "alert alert-danger" >{{ $errors->first('pinterest') }}< /p> @endif

            <div class="form-group">
        < input
    type = "text"
    id = "searchmap"
    class
    = "form-control" >
        < div
    id = "map-canvas" > < /div>
        < /div>


        < div
    class
    = "form-group" >
        < label
    for= "description" > Опис < /label>
        < textarea class
    = "ckeditor"
    id = "elm3"
    name = "description" >{{ $settings->description }}< /textarea>
        < /div>
        @if ($errors->has('description')) < p
    class
    = "alert alert-danger" >{{ $errors->first('description') }}< /p> @endif


            <div class="form-group">
        < label
    for= "user" > Translator < /label>
        < select name = "user_id"
    id = "user"
    class
    = "form-control" >
        @foreach ($users as $user)
        < option
    value = "{{ $user->id }}"
    @if($settings->user_id == $user->id) selected @endif >{{ $user->name }}< /option>
    @endforeach

    < /select>
    < /div>


    < div
    class
    = "form-group" >
        < p > Workflow
    : <
    /p>
    @foreach($workflows as $workflow)
    < div
    class
    = "form-check-inline" >
        < label
    class
    = "form-check-label" >
        < input
    type = "checkbox"
    class
    = "form-check-input"
    name = "workflow_id"
    value = "{{ $workflow->id }}"
    @if($workflow->id  == 1) checked @endif>
    < /label>
    < span
    class
    = "text" > {{ $workflow->name }}< /span>
        < /div>

        @endforeach
        < /div>


        <!-- Hidden inputs -->


        < input
    type = "hidden"
    id = "lat"
    class
    = "form-control"
    name = "lat"
    value = "{{ $settings->lat }}" >
        < input
    type = "hidden"
    id = "lng"
    class
    = "form-control"
    name = "lng"
    value = "{{ $settings->lng }}" >
        < input
    type = "hidden"
    id = "id"
    class
    = "form-control"
    name = "id"
    value = "{{ $settings->id }}" >

        < button
    type = "submit"
    class
    = "btn btn-labeled shiny btn-warning btn-large" > < i
    class
    = "btn-label fa fa-plus" > < /i> Обнови
        < /button>
        {!! Form::close() !!}


        < /div>
        < /div>
        < /div>
        < /div>
        < /div>
        < /div>

@endsection
