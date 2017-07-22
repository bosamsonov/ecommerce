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
        <h1>Add Attribute
            <small class="text-muted">
                for site {!! $site->name !!}
            </small>
        </h1>
    </div>

    {!! Form::open([
        'route' => ['admin.attributes.store', $site->id],
        'id'=>'form-site'
    ]) !!}
        <script id="attributeTemplate" type="text/x-handlebars-template">
            <fieldset id="attribute@{{id}}">
                <div class="form-group row">
                    {!! Form::label('attribute[@{{attributeId}}][name]', 'Name for admin', [
                        'class'=>'col-2 col-form-label'
                    ]) !!}
                    <div class="col-10">
                        {!! Form::text('attribute[@{{attributeId}}][name]', null, [
                            'class'=> 'form-control'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('attribute[@{{attributeId}}][site_translation_id]', 'Language', [
                        'class'=>'col-2 col-form-label'
                    ]) !!}
                    <div class="col-10">
                        {!! Form::select('attribute[@{{attributeId}}][site_translation_id]', $pageLanguageOptions, null, [
                            'class'=> 'form-control'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('attribute[@{{attributeId}}][display_name]', 'Name on site', [
                        'class'=>'col-2 col-form-label'
                    ]) !!}
                    <div class="col-10">
                        {!! Form::text('attribute[@{{attributeId}}][display_name]', null, [
                            'class'=> 'form-control'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-10 offset-2">
                        <button type="button" class="btn btn-primary">
                            Add option
                        </button>
                    </div>
    
                </div>
            </fieldset>
        </script>
        <script id="attributeOptionsTemplate" type="text/x-handlebars-template">
            <div id="options">
                <div class="form-group row">
                    {!! Form::label('attribute[@{{attributeId}}][options]', 'Options', [
                        'class'=>'col-2 col-form-label'
                    ]) !!}
                    <div class="col-4">
                        {!! Form::text('attribute[@{{attributeId}}][options][@{{attributeOptionId}}][admin_name]', null, [
                            'class'=> 'form-control'
                        ]) !!}
                    </div>
                    <div class="col-4">
                        {!! Form::text('attribute[@{{attributeId}}][options][@{{attributeOptionId}}][name]', null, [
                            'class'=> 'form-control'
                        ]) !!}
                    </div>
                </div>
            </div>
        </script>
    {!! Form::close() !!}

@endsection