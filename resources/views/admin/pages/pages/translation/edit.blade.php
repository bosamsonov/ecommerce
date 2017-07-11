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
        <h1>Edit Page</h1>
    </div>

    {!! Form::model($pageTranslation, [
        'method' => 'PUT',
        'route' => ['admin.pages.translation.update', $pageTranslation->page_id, $pageTranslation],
        'id'=>'form-site'
    ]) !!}
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
                  {!! Form::checkbox('is_enabled', true, null) !!}
                <!--<input class="form-check-input" type="checkbox" value="1" name="is_enabled" checked>-->
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
    {!! Form::close() !!}

@endsection