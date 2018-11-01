@extends('layouts.app')

@section('scripts')

@endsection



@section('content')

	<div class="col-lg-10">
	<div class="row">
		<div class="col-lg-12">
			<div class="widget">
				<div class="widget-header bordered-bottom bordered-themesecondary">
					<i class="widget-icon fa fa-tags themesecondary"></i>
					<span class="widget-caption themesecondary">{{ $category->name }}</span>
				</div><!--Widget Header-->
				<div class="widget-body">
					<div class="row">
						<div class="col-md-8"><h2>{{ $category->name }}</h2></div>
						<div class="col-md-2">
							<a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-labeled shiny btn-warning edit"><i class="btn-label fa fa-edit"></i> Edit</a>
						</div>
						<div class="col-md-2">

							{{ Form::model($category, array('route' => array('admin.categories.destroy', $category->id), 'method' => 'DELETE', 'id' => 'deletecategory')) }}

							<button type="submit" class="btn btn-labeled shiny btn-danger"><i class="btn-label fa fa-trash"></i> Delete</button>
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
