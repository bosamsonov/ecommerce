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
        <h1 class="h1">Add Translation
            <small class="text-muted">
                for {{$site->name}}
            </small>
        </h1>
    </div>
    
    {!! Form::open([
        'route' => ['admin.sites.translation.store', $site],
        'id'=>'form-site'
    ]) !!}
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
            {!! Form::label('language_type', 'Type', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::select('language_type', [
                    'path' => 'Path',
                    'subdomain' => 'Subdomain',
                    'host' => 'Host'
                ], 'path', [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        
        <div class="form-group row" id="hostFormGroup">
            {!! Form::label('host', 'Host', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::text('host', $site->translations->where('is_default', true)->first()->host, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        
        <div class="form-group row">
            {!! Form::label('is_enabled', 'Enable', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::checkbox('is_enabled', true, true, [
                ]) !!}
            </div>
        </div>
        
        <div class="form-group row">
            {!! Form::label('is_default', 'Make Default', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::checkbox('is_default', true, false, [
                ]) !!}
            </div>
        </div>
        
        <div id="currentDefault">
            <h3>Change Currently Default Translation</h3>
            
            <div class="form-group row">
                {!! Form::label('affected_type', 'Type', [
                    'class'=>'col-2 col-form-label'
                ]) !!}
                <div class="col-10">
                    {!! Form::select('affected_type', [
                        'path' => 'Path',
                        'subdomain' => 'Subdomain',
                        'host' => 'Host' 
                    ], 'path', [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
            </div>
            
            <div class="form-group row">
                {!! Form::label('affected_host', 'Host', [
                    'class'=>'col-2 col-form-label'
                ]) !!}
                <div class="col-10">
                    {!! Form::text('affected_host', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
            </div>
        </div>
        
    {!! Form::close() !!}



@endsection