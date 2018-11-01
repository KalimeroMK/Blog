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
                        <span class="widget-caption">{!! trans('admin.slider.addimagetoslider') !!}</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">

                            {{ Form::model('sliders', array('route' => array('admin.slidercategory.store'), 'method' => 'POST', 'files'=>true)) }}
                            {!! csrf_field() !!}


                            <div class="input-group{{ $errors->has('image') ? ' has-error' : '' }}">
                           <span>
                            <span class=" btn-file">
                             {!! trans('admin.slider.chooseimage') !!}<input type="file"
                                                                             name="image">
                         </span>
                     </span>
                            </div>
                            <br/>
                            @if ($errors->has('image')) <p
                                class="alert alert-danger">{{ $errors->first('image') }}</p> @endif


                            <div class="form-group">
                                <label for="user">{!! trans('admin.slider.editor') !!}</label>
                                <select name="user_id" id="user" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                                @if(Auth::user()->id == $user->id) selected @endif >{{ $user->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <!-- Hidden inputs -->

                            <input type="hidden" name="creator" value="{{ Auth::user()->id  }}">
                            <input type="hidden" id="category_id" class="form-control" name="category_id"
                                   value="{{ $category->id  }}">


                            <button type="submit" class="btn btn-labeled shiny btn-warning btn-large"><i
                                    class="btn-label fa fa-plus"></i> Create
                            </button>
                            {!! Form::close() !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach(array_chunk($sliders->all(), 3) as $sliders)
            <div class="row">
                <div class="col-lg-offset-1 col-sm-offset-1 col-lg-10 col-sm-12 col-xs-12">
                    @foreach($sliders as $slider)
                        {{ Form::model('sliders', array('route' => array('admin.slidercategory.destroy'), 'method' => 'POST', 'files'=>true)) }}
                        <div class="col-md-4">
                            <input type="hidden" id="id" class="form-control" name="id"
                                   value="{{ $slider->id  }}">
                            <img src="/images/sliders/medium/{{$slider->image}}" class="img-responsive"/>

                            <button type="submit" class="btn btn-danger">Delete</button>

                        </div>
                        {!! Form::close() !!}
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
