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
            <a href="{!! URL::route('admin.pages.index')!!}"
               class="btn btn-secondary">
                <i class="fa fa-reply" aria-hidden="true"></i>
            </a>
        </div>
        <h1>Add Product
            <small class="text-muted">
                for site {!! $site->name !!}
            </small>
        </h1>
    </div>

    {!! Form::open([
        'route' => ['admin.products.store', $site->id],
        'files'=>true,
        'id'=>'form-site'
    ]) !!}
        <input id="site_id" type="hidden" value="{{$site->id}}">
        <div class="form-group row">
            {!! Form::label('site_translation_id', 'Language', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::select('site_translation_id', $pageLanguageOptions, null, [
                    'class'=> 'form-control',
                    'onchange'=>"page.renderAttributeSets()"
                ]) !!}
            </div>
        </div>
        
        <div id="attributeSet"></div>
        <div id="attributeSetAttributes"></div>
        
        <script id="attributeSetTemplate" type="text/x-handlebars-template">
            <div class="form-group row">
                <label for="attribute_set_id" class="col-2 col-form-label">Attribute set</label>
                <div class="col-10">
                    <select class="form-control" id="attribute_set_id" name="attribute_set_id" onchange="page.renderAttributeSetAttributes()">
                        @{{#each attributeSets}}
                            <option value="@{{id}}">@{{name}}</option>
                        @{{/each}}
                    </select>
                </div>
            </div>
        </script>
        <script id="attributeSetAttributesTemplate" type="text/x-handlebars-template">
            @{{#each attributes}}
                <div class="form-group row">
                    <label for="attribute_value_id" class="col-2 col-form-label">@{{name}}</label>
                    <div class="col-10">
                        <select class="form-control"name="attribute_value_id[]">
                            <option></option>
                            @{{#each values}}
                                <option value="@{{@key}}">@{{name}}</option>
                            @{{/each}}
                        </select>
                    </div>
                </div>
                
            @{{/each}}
        </script>
        
        
        <div class="form-group row">
            {!! Form::label('title', 'Title', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-8">
                {!! Form::text('title', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
            <div class="form-check col-2 align-middle">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="1" name="is_enabled" checked>
                Enabled
              </label>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('url', 'Url', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::text('url', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        <fieldset class="form-group mb-4">
            <legend class="col-form-legend">SEO</legend>
            <div class="form-group row">
                {!! Form::label('seo_title', 'Title', [
                    'class'=>'col-2 col-form-label'
                ]) !!}
                <div class="col-10">
                    {!! Form::text('seo_title', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('seo_keywords', 'Keywords', [
                    'class'=>'col-2 col-form-label'
                ]) !!}
                <div class="col-10">
                    {!! Form::text('seo_keywords', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('seo_description', 'Description', [
                    'class'=>'col-2 col-form-label'
                ]) !!}
                <div class="col-10">
                    {!! Form::textarea('seo_description', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            {!! Form::label('content', 'Content', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::textarea('content', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('images', 'Images', [
                    'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                <input type="file" name="images[]" multiple />
            </div>
        </div>
    {!! Form::close() !!}

@endsection