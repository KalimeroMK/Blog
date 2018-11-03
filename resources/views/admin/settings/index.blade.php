@extends('layouts.admin')
@section('header_title')
    {{ trans('admin.posts.pages.index.header') }}
@endsection
@section('content')
    <div class="col-lg-10">
        <div class="row">
            <div class="col-md-12">

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                @foreach($settings as $setting)
                    <p><a class="btn btn-labeled " href="/admin/settings/{{ $setting->id }}/edit"> <i
                                    class="btn-label fa fa-plus"></i>Подесувања </a></p>
                @endforeach
            </div>
        </div>
        <div class="row"> <!-- /# card1 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Главна адреса</p>
                    </div>
                    <hr/>
                    <div class="media">

                        @foreach($settings as $setting)
                            {{ $setting->mainurl }}
                        @endforeach

                    </div>

                </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Наслов</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            {{ $setting->title }}
                        @endforeach

                    </div>

                </div>

            </div>
        </div> <!-- /# card1 -->

        <div class="row"> <!-- /# card2 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Email адреса</p>
                    </div>
                    <hr/>
                    <div class="media">

                        @foreach($settings as $setting)
                            {{ $setting->email }}
                        @endforeach

                    </div>

                </div>
                <!-- /# card -->
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Адреса</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            {{ $setting->address }}
                        @endforeach

                    </div>

                </div>
            </div>
        </div> <!-- /# card2 -->
        <div class="row"> <!-- /# card3 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Logo</p>
                    </div>
                    <hr/>
                    <div class="media">

                        @foreach($settings as $setting)
                            <img src="/images/logo/{{ $setting->logo }}" class="img-responsive"/>
                        @endforeach
                    </div>

                </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Опис</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            {!! $setting->description !!}
                        @endforeach
                    </div>

                </div>

            </div>
        </div> <!-- /# card3 -->
        <div class="row"> <!-- /# card4 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Телефон</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            {{ $setting->phone }}
                        @endforeach
                    </div>

                </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Facebook</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            @if($setting->facebook != NULL)
                                {{ $setting->facebook }}

                            @else
                                n/a
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
        </div> <!-- /# card4 -->



        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Twitter</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            @if($setting->twitter != NULL)
                                {{ $setting->twitter }}

                            @else
                                n/a
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Skype</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            @if($setting->skype != NULL)
                                {{ $setting->skype }}

                            @else
                                n/a
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>G-plus</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            @if($setting->gplus != NULL)
                                {{ $setting->gplus }}

                            @else
                                n/a
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Youtube</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            @if($setting->youtube != NULL)
                                {{ $setting->youtube }}

                            @else
                                n/a
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Flicker</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            @if($setting->flicker != NULL)
                                {{ $setting->flicker }}

                            @else
                                n/a
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <p>Pinterest</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            @if($setting->pinterest != NULL)
                                {{ $setting->pinterest }}

                            @else
                                n/a
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <p>Последни промени</p>
                    </div>
                    <hr/>
                    <div class="media">
                        @foreach($settings as $setting)
                            {{ $setting->updated_at->diffForHumans() }}
                        @endforeach
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection


