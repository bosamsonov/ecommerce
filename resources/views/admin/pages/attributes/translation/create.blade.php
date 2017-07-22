@extends('admin.modules.page.page')

@section('content')
    <div class="page-header">
        <div class="pull-right">
            <button type="submit"
                    class="btn btn-primary"
                    form="form-site"
            >
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
            </button>
            <a href="{!! URL::route('admin.attributes.index')!!}"
               class="btn btn-secondary">
                <i class="fa fa-reply" aria-hidden="true"></i>
            </a>
        </div>
        <h1>Add Translation
            <small class="text-muted">
                for attribute {!!$attribute->name!!}
            </small>
        </h1>
    </div>

    {!! Form::open([
        'route' => ['admin.attributes.translation.store', $site, $attribute],
        'id'=>'form-site'
    ]) !!}
                <div class="form-group row">
            {!! Form::label('site_translation_id', 'Language', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::select('site_translation_id', $pageLanguageOptions, null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
            <div class="form-group row">
            {!! Form::label('display_name', 'Name on site', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::text('display_name', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        
        @foreach($attribute->values as $value)
            <div id="options">
                <div class="form-group row">
                    {!! Form::label('options', $value->name, [
                        'class'=>'col-2 col-form-label'
                    ]) !!}
                    <div class="col-10">
                        {!! Form::text('options['.$value->id.']', null, [
                            'class'=> 'form-control'
                        ]) !!}
                    </div>
                </div>
            </div>
        @endforeach

    {!! Form::close() !!}

@endsection