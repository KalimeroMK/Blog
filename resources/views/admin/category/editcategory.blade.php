@extends('layouts.admin')
@section('header_title')
    {{ trans('admin.posts.pages.index.header') }}
@endsection
@section('content')

    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12">
                <legend>{!! trans('admin.category.categoryedit') !!}: {{  $category->name }}</legend>

                <div class="row">
                    <div class="col-lg-12">
                        <a href="/admin/sliders/{{ $category->id }}/category"
                           class="btn-label fa fa-plus">{!! trans('admin.category.addslider') !!}</a>
                    </div>
                </div>
                <div style="margin-bottom: 50px"></div>
                {{ Form::model($categories, array('route' => array('admin.categories.update', $category->id), 'method' => 'PUT','files' => true)) }}


                <div class="img-blog">
                    @if(!!$category->image)
                        <img class="img-responsive" src="/img/categories/medium/{{ $category->image }}"
                             alt="{{ $category->name }}"/>
                    @endif
                </div>
                <br/>


                <div class="img-blog">
                    @if(!!$category->file)
                        <a href="/files/categories/{{ $category->file }}"/>{{ $category->file }}</a>
                    @endif
                </div>
                <br/>


                <div class="form-group">
                    <label for="name">{!! trans('admin.category.categorytitle') !!}</label>
                    <input type="text" class="form-control" id="categoryname" name="name"
                           placeholder="Enter category name" value="{{  $category->name }}">
                </div>
                @if ($errors->has('name')) <p class="alert alert-danger">{{ $errors->first('name') }}</p> @endif


                <div class="input-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <span>
                <span class=" btn-file">
                    {!! trans('admin.category.chooseimage') !!}... <input type="file" name="image">
                </span>
            </span>
                </div>

                <br/>
                <div class="input-group{{ $errors->has('file') ? ' has-error' : '' }}">
            <span>
                <span class=" btn-file">
                    {!! trans('admin.category.choosefile') !!}... <input type="file" name="file">
                </span>
            </span>
                </div>
                <br/>

                <div class="form-group">
                    <label for="name">{!! trans('admin.category.filename') !!}</label>
                    <input type="text" class="form-control" id="filename" name="filename" placeholder="Enter file name"
                           value="{{  $category->filename }}">
                </div>


                @if ($errors->has('image')) <p class="alert alert-danger">{{ $errors->first('image') }}</p> @endif


                <div class="form-group">
                    <label for="description">{!! trans('admin.category.categorydesc') !!}</label>
                    <textarea class="ckeditor" id="elm3" name="description">{{ $category->description }}</textarea>
                </div>
                @if ($errors->has('description')) <p
                    class="alert alert-danger">{{ $errors->first('description') }}</p> @endif


                <button type="submit" class="btn btn-default">{!! trans('admin.category.update') !!}</button>
                {!! Form::close() !!}
            </div>
        </div>
        <div style="padding-bottom: 20px;"></div>
        <div class="row">
            <div class="col-lg-12">
                {{ Form::model('category', array('route' => array('admin.categories.destroy', $category->id), 'method' => 'DELETE', 'id' => $category->id))}}
                {!! csrf_field() !!}

                <button type="submit" class="btn btn-labeled shiny btn-danger delete"><i
                        class="btn-label fa fa-trash"></i> Delete
                </button>
                {{ Form::close() }}
            </div>
        </div>


    </div>



@endsection
