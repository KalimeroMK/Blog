@extends('layouts.admin')
@section('header_title')
    {{ trans('admin.posts.pages.index.header') }}
@endsection
@section('content')

    <div class="col-lg-10">
        <div class="row card">
            <div class="col-lg-12">
                @if($status)
                    {{ Form::model($categories, array('route' => array('admin.categories.store'), 'method' => 'POST', 'files'=>true)) }}
                    {!! csrf_field() !!}
                    <legend>{!! trans('admin.category.addcategory') !!}</legend>
                    <div class="form-group">
                        <label for="name">{!! trans('admin.category.categorytitle') !!}</label>
                        <input type="text" class="form-control" id="categoryname" name="name"
                               placeholder="Enter category name">
                    </div>
                    @if ($errors->has('name')) <p class="alert alert-danger">{{ $errors->first('name') }}</p> @endif

                    <div class="form-group">
                        <label for="parent_id">{!! trans('admin.category.subcategory') !!}</label>

                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="null">{!! trans('admin.category.maincategory') !!}</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">@for ($i = 0; $i < $category->depth; $i++)
                                        - @endfor {{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    {!! Form::close() !!}
                @else

                    {{ Form::model('categories', array('route' => array('admin.categories.store'), 'method' => 'POST', 'files'=>true)) }}
                    {!! csrf_field() !!}
                    <legend>{!! trans('admin.category.addcategory') !!}</legend>
                    <div class="form-group">
                        <label for="name">{!! trans('admin.category.categorytitle') !!}</label>
                        <input type="text" class="form-control" id="categoryname" name="name"
                               placeholder="{!! trans('admin.category.insertcatogorytitle') !!}">
                    </div>
                    @if ($errors->has('name')) <p class="alert alert-danger">{{ $errors->first('name') }}</p> @endif

                    <input type="hidden" name="parent_id" value="null">
                    <button type="submit" class="btn btn-default">{!! trans('admin.category.addcategory') !!}</button>
                    {!! Form::close() !!}

                @endif
            </div>
        </div>
    </div>
@endsection
