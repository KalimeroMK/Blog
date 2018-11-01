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
                        <span class="widget-caption">Подесувања</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">

                            {{ Form::model('settings', array('route' => array('admin.settings.store'), 'method' => 'POST', 'files'=>true)) }}

                            <div class="input-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                         <span class="input-group-btn"><br>
                            <span>
                               Избери лого... <input type="file"
                                                     name="logo">
                           </span>
                       </span>
                            </div>
                            <br/>
                            @if ($errors->has('logo')) <p
                                    class="alert alert-danger">{{ $errors->first('logo') }}</p> @endif

                            <div class="form-group">
                                <label for="title">Наслов на страната</label>
                                <input type="text" name="title" class="form-control"></input>
                            </div>
                            @if ($errors->has('title')) <p
                                    class="alert alert-danger">{{ $errors->first('title') }}</p> @endif


                            <div class="form-group">
                                <label>Главна адреса: </label>
                                <input name="mainurl" type="text" class="form-control">
                            </div>
                            @if ($errors->has('mainurl')) <p
                                    class="alert alert-danger">{{ $errors->first('mainurl') }}</p> @endif


                            <div class="form-group">
                                <label>Email адреса: </label>
                                <input name="email" type="email" class="form-control">
                            </div>
                            @if ($errors->has('email')) <p
                                    class="alert alert-danger">{{ $errors->first('email') }}</p> @endif

                            <div class="form-group">
                                <label>Адреса: </label>
                                <input name="address" type="text" class="form-control">
                            </div>
                            @if ($errors->has('address')) <p
                                    class="alert alert-danger">{{ $errors->first('address') }}</p> @endif

                            <div class="form-group">
                                <label>Телефон: </label>
                                <input name="phone" type="text" class="form-control">
                            </div>
                            @if ($errors->has('phone')) <p
                                    class="alert alert-danger">{{ $errors->first('phone') }}</p> @endif

                            <div class="form-group">
                                <label>Twitter: </label>
                                <input name="twitter" type="text" class="form-control">
                            </div>
                            @if ($errors->has('twitter')) <p
                                    class="alert alert-danger">{{ $errors->first('twitter') }}</p> @endif

                            <div class="form-group">
                                <label>Facebook: </label>
                                <input name="facebook" type="text" class="form-control">
                            </div>
                            @if ($errors->has('facebook')) <p
                                    class="alert alert-danger">{{ $errors->first('facebook') }}</p> @endif

                            <div class="form-group">
                                <label>Skype: </label>
                                <input name="skype" type="text" class="form-control">
                            </div>
                            @if ($errors->has('skype')) <p
                                    class="alert alert-danger">{{ $errors->first('skype') }}</p> @endif

                            <div class="form-group">
                                <label>LinkedIn: </label>
                                <input name="linkedin" type="text" class="form-control">
                            </div>
                            @if ($errors->has('linkedin')) <p
                                    class="alert alert-danger">{{ $errors->first('linkedin') }}</p> @endif

                            <div class="form-group">
                                <label>Google Plus: </label>
                                <input name="gplus" type="text" class="form-control">
                            </div>
                            @if ($errors->has('gplus')) <p
                                    class="alert alert-danger">{{ $errors->first('gplus') }}</p> @endif

                            <div class="form-group">
                                <label>Youtube: </label>
                                <input name="youtube" type="text" class="form-control">
                            </div>
                            @if ($errors->has('youtube')) <p
                                    class="alert alert-danger">{{ $errors->first('youtube') }}</p> @endif

                            <div class="form-group">
                                <label>Flickr: </label>
                                <input name="flickr" type="text" class="form-control">
                            </div>
                            @if ($errors->has('flickr')) <p
                                    class="alert alert-danger">{{ $errors->first('flickr') }}</p> @endif

                            <div class="form-group">
                                <label>Pinterest: </label>
                                <input name="pinterest" type="text" class="form-control">
                            </div>
                            @if ($errors->has('pinterest')) <p
                                    class="alert alert-danger">{{ $errors->first('pinterest') }}</p> @endif


                            <div class="form-group">
                                <input type="text" id="searchmap" class="form-control">
                                <div id="map-canvas"></div>
                            </div>


                            <div class="form-group">
                                <label for="description">Детален текст</label>
                                <textarea class="ckeditor" id="elm3" name="description"></textarea>
                            </div>
                            @if ($errors->has('description')) <p
                                    class="alert alert-danger">{{ $errors->first('description') }}</p> @endif


                            <div class="form-group">
                                <label for="user">Корисник</label>
                                <select name="user_id" id="user" class="form-control">

                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                                @if(Auth::user()->id == $user->id) selected @endif >{{ $user->name }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group">
                                <p>Workflow: </p>
                                @foreach($workflows as $workflow)
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="workflow_id"
                                                   value="{{ $workflow->id }}" @if($workflow->id  == 1) checked @endif>
                                        </label>
                                        <span class="text"> {{ $workflow->name }}</span>
                                    </div>

                                @endforeach
                            </div>


                            <!-- Hidden inputs -->

                            <input type="hidden" name="creator" value="{{ Auth::user()->id  }}">
                            <input type="hidden" id="lat" class="form-control" name="lat">
                            <input type="hidden" id="lng" class="form-control" name="lng">

                            <button type="submit" class="btn btn-labeled shiny btn-warning btn-large"><i
                                        class="btn-label fa fa-plus"></i> Зачувај
                            </button>
                            {!! Form::close() !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection


   @section('scripts')
    <!-- Google Maps -->
    <script type="text/javascript"
            src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyA75bnzyJ_5j2Ger9Erjo1Q-0XucnZbst4"></script>
    <script type="text/javascript" src="/js/maps.js"></script>
@endsection