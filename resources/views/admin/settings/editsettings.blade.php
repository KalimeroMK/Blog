@extends('layouts.admin')
@section('header_title')
    {{ trans('admin.posts.pages.index.header') }}
@endsection
@section('content')

    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-offset-1 col-sm-offset-1 col-lg-10 col-sm-12 col-xs-12">

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif

                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-warning">
                        <span class="widget-caption"> Подесувања </span></div>
                    <div class="widget-body">
                        <div class="img-refferal">
                            @if(!!$settings->logo)
                                <img class="img-responsive" src="/images/logo/thumbnails/{{ $settings->logo }}"
                                     alt="{{ $settings->title }}" / >
                            @endif
                        </div>
                        <br / >
                        <div id="horizontal-form">

                            {{ Form::model($settings, array('route' => array('admin.settings.update', $settings->id), 'method' => 'PUT','files' => true)) }}


                            {!! csrf_field() !!}


                            <div class="input-group{{ $errors->has('image') ? ' has-error' : '' }}"><span
                                    class="input-group-btn">
                                    <span class="btn btn-info shiny btn-file"><i class="btn-label fa fa-image"> </i> Browse... <input
                                            type="file" name="logo">
                                    </span>
                                </span>
                            </div>
                            <br / >
                            @if ($errors->has('image')) <p
                                class="alert alert-danger">{{ $errors->first('image') }}</p> @endif

                            <div class="form-group">
                                <label for="title"> Наслов </label><input type="text" name="title"
                                                                          class="form-control"
                                                                          value="{{ $settings->title }}">
                            </div>
                            @if ($errors->has('title')) <p
                                class="alert alert-danger">{{ $errors->first('title') }}</p> @endif

                            <div class="form-group">
                                <label> Главна адреса: </label>
                                <input name="mainurl" type="text" class="form-control"
                                       value="{{ $settings->mainurl }}">
                            </div>
                            @if ($errors->has('mainurl')) <p
                                class="alert alert-danger">{{ $errors->first('mainurl') }}</p> @endif
                            <div class="form-group">
                                <label> Email адреса: </label><input name="email" type="email"
                                                                     class="form-control"
                                                                     value="{{ $settings->email }}">
                            </div>
                            @if ($errors->has('email'))
                                <p class="alert alert-danger">{{ $errors->first('email') }}</p> @endif

                            <div class="form-group">
                                <label> Адреса : </label>
                                <input name="address" type="text" class="form-control"
                                       value="{{ $settings->address }}">
                            </div>
                            @if ($errors->has('address')) <p
                                class="alert alert-danger">{{ $errors->first('address') }}</p> @endif

                            <div class="form-group">
                                <label> Телефон : </label>
                                <input name="phone" type="text" class="form-control"
                                       value="{{ $settings->phone }}">
                            </div>
                            @if ($errors->has('phone')) <p
                                class="alert alert-danger">{{ $errors->first('phone') }}</p> @endif

                            <div class="form-group">
                                <label> Twitter : </label> <input name="twitter" type="text" class=
                                "form-control" value="{{ $settings->twitter }}">
                            </div>
                            @if ($errors->has('twitter')) < p class = "alert alert-danger"
                            >{{ $errors->first('twitter') }}</p> @endif

                            <div class="form-group">
                                <label> Facebook : </label>
                                <input name="facebook" type="text" class="form-control"
                                       value="{{ $settings->facebook }}">
                            </div>
                            @if ($errors->has('facebook')) <p
                                class="alert alert-danger">{{ $errors->first('facebook') }}
                            </p> @endif

                            <div class="form-group">
                                <label> Skype : </label>
                                <input name="skype" type="text" class="form-control"
                                       value="{{ $settings->skype }}">
                            </div>
                            @if ($errors->has('skype')) < p class ="alert alert-danger"
                            >{{ $errors->first('skype') }}</p> @endif

                            <div class="form-group">
                                <label> LinkedIn : </label>
                                <input name="linkedin" type="text" class="form-control"
                                       value="{{ $settings->linkedin }}">
                            </div>
                            @if ($errors->has('linkedin')) < p class = "alert alert-danger"
                            >{{ $errors->first('linkedin') }}</p> @endif

                            <div class="form-group">
                                <label> Google Plus: </label>
                                <input name="gplus" type="text" class="form-control"
                                       value="{{ $settings->gplus }}">
                            </div>
                            @if ($errors->has('gplus')) < p
                            class
                            = "alert alert-danger" >{{ $errors->first('gplus') }}<
                            /p> @endif

                            <div class="form-group">
                                <label> Youtube : </label> <input name="youtube" type="text" class=
                                "form-control" value="{{ $settings->youtube }}">
                            </div>
                            @if ($errors->has('youtube')) <p
                                class="alert alert-danger">{{ $errors->first('youtube') }}</p> @endif

                            <div class="form-group">
                                <label> Flickr : </label>
                                <input name="flickr" type="text" class="form-control"
                                       value="{{ $settings->flickr }}">
                            </div>
                            @if ($errors->has('flickr')) <p
                                class="alert alert-danger">{{ $errors->first('flickr') }}</p> @endif
                            <div class="form-group">
                                <label> Pinterest : </label>
                                <input name="pinterest" type="text" class="form-control"
                                       value="{{ $settings->pinterest }}">
                            </div>
                            @if ($errors->has('pinterest'))
                                <p class="alert alert-danger">{{ $errors->first('pinterest') }}</p> @endif

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="description"> Опис </label>
                                    <textarea class="ckeditor" id="elm3"
                                              name="description">{{ $settings->description }}</textarea>
                                </div>
                                @if ($errors->has('description')) <p
                                    class="alert alert-danger">{{ $errors->first('description') }}<
                                    /p> @endif


                                <div class="form-group">
                                    <label for="user"> Translator </label>
                                    <select name="user_id" id="user" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                    @if($settings->user_id == $user->id)selected @endif>{{ $user->name }}
                                            </option>
                                    @endforeach
                                </div>

                                <!-- Hidden inputs -->

                                <input type="hidden" id="id" class="form-control"
                                       name="id" value="{{ $settings->id }}">

                                <button type="submit"
                                        class="btn btn-labeled shiny btn-warning btn-large">
                                    <i class="btn-label fa fa-plus"> </i> Обнови
                                </button>
                                {!! Form::close() !!}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
