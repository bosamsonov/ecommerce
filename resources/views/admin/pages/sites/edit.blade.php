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
        <h1>Edit Site {{$site->name}}</h1>
    </div>

    {!! Form::model($site, [
        'route' => ['admin.sites.update', $site],
        'method' => 'put',
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
            {!! Form::label('url', 'URL', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::text('url', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
    {!! Form::close() !!}

@endsection