@extends('layouts.app')
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
                        <span class="widget-caption">Промена на слајдер: {{ strip_tags($slider->title) }}</span>
                    </div>
                    <div class="widget-body">

                        <div class="img-slider">
                            @if(!!$slider->image)
                                <img class="img-responsive" src="/images/slider/medium/{{ $slider->imagemedium }}"
                                     alt="{{ $slider->title }}"/>
                            @endif
                        </div>
                        <br/>


                        <div id="horizontal-form">

                            {{ Form::model('slider', array('route' => array('admin.slider.update', $slider->id), 'method' => 'PUT','files' => true)) }}
                            {!! csrf_field() !!}


                            <div class="input-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <span class="input-group-btn">
                                <span class="btn btn-info shiny btn-file">
                                    <i class="btn-label fa fa-image"> </i> Browse... <input type="file" name="image">
                                </span>
                            </span>
                                <input type="text" class="form-control" readonly="">
                            </div>
                            <br/>
                            @if ($errors->has('image')) <p
                                class="alert alert-danger">{{ $errors->first('image') }}</p> @endif

                            <div class="form-group">
                                <label for="title">Наслов</label>
                                <input type="text" name="title" class="form-control" value="{{ $slider->title }}"/>
                            </div>
                            @if ($errors->has('title')) <p
                                class="alert alert-danger">{{ $errors->first('title') }}</p> @endif


                            <div class="form-group">
                                <label for="link">Линк: </label>
                                <input type="text" class="form-control" id="link" name="link"
                                       value="{{ $slider->link }}"/>
                            </div>
                            @if ($errors->has('link')) <p
                                class="alert alert-danger">{{ $errors->first('link') }}</p> @endif


                            <div class="form-group">
                                <label for="description">Опис</label>
                                <textarea class="ckeditor" id="elm3"
                                          name="description">{{ $slider->description }}</textarea>
                            </div>
                            @if ($errors->has('description')) <p
                                class="alert alert-danger">{{ $errors->first('description') }}</p> @endif


                            <div class="form-group">
                                <label for="user">Уредник</label>
                                <select name="user_id" id="user" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                                @if($slider->user_id == $user->id) selected @endif >{{ $user->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!-- Hidden inputs -->

                            <input type="hidden" name="creator" value="{{ $slider->creator }}">


                            <button type="submit" class="btn btn-labeled shiny btn-warning btn-large"><i
                                    class="btn-label fa fa-plus"></i> {!! trans('admin.slider.update') !!}
                            </button>
                            {!! Form::close() !!}


                            {{ Form::model('slider', array('route' => array('admin.slider.destroy', $slider->id), 'method' => 'DELETE', 'id' => 'slider'))}}
                            {!! csrf_field() !!}

                            <button type="submit" class="btn btn-labeled shiny btn-danger delete"><i
                                    class="btn-label fa fa-trash"></i> {!! trans('admin.slider.delete') !!}
                            </button>
                            {{ Form::close() }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
