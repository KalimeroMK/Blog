@extends('layouts.admin')
@section('header_title')
    {{ trans('admin.posts.pages.index.header') }}
@endsection
@section('content')

    <div class="col-lg-10">
        <div class="row card" >
            <div class="col-lg-12">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <p><a class="btn btn-labeled " href="/admin/categories/create"> <i
                            class="btn-label fa fa-plus"></i>{!! trans('admin.category.addcategory') !!}</a></p>
            </div>
            <div class="col-lg-12 ">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-themesecondary">
                        <i class="widget-icon fa fa-tags themesecondary"></i>
                        <span class="widget-caption themesecondary">{!! trans('admin.category.listcategory') !!}</span>
                    </div><!--Widget Header-->
                    <div class="tree well">
                        {!! $list !!}
                    </div>
                </div>
            </div>
        </div>

@endsection
