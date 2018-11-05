{!! csrf_field() !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<meta name="_token" content="{!! csrf_token() !!}"/>

<div class="row">
    <div class="col-md-8">
        <div class="form-group has-feedback row {{ $errors->has('tag') ? ' has-error ' : '' }}">
            {!! Form::label('tag', trans('forms.create-tag.labels.tag'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('tag', $tag, [
                    'id' => 'tag',
                    'class' => 'form-control',
                    'placeholder' => trans('forms.create-tag.labels.tag')
                ]) !!}
            </div>
            @if ($errors->has('tag'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('tag') }}</strong>
                    </span>
                </div>
            @endif
        </div>

    </div>
</div>
