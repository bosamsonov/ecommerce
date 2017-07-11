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
            <a href="{!! URL::route('admin.sites.index')!!}"
               class="btn btn-secondary">
                <i class="fa fa-reply" aria-hidden="true"></i>
            </a>
        </div>
        <h1>Add Site</h1>
    </div>

    {!! Form::open([
        'route' => 'admin.sites.store',
        'id'=>'form-site'
    ]) !!}
        <div class="form-group row">
            {!! Form::label('name', 'Name', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::text('name', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('language_name', 'Language Name', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::text('language_name', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('language_code', 'Language Code', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::text('language_code', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('host', 'Host', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::text('host', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('theme', 'Theme', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::select('theme', $themes, null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
    {!! Form::close() !!}

@endsection