@extends('admin.modules.page.page')

@section('content')
    <div class="page-header">
        <div class="pull-right">
            <button type="submit"
                    class="btn btn-primary"
                    form="form-language"
            >
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
            </button>
            <a href="{!! URL::route('admin.languages.index')!!}"
               class="btn btn-secondary">
                <i class="fa fa-reply" aria-hidden="true"></i>
            </a>
        </div>
        <h1>Edit {{$language->name}} Language</h1>
    </div>

    {!! Form::model($language, [
        'route' => ['admin.languages.update', $language->id],
        'method' => 'PUT',
        'id'=>'form-language'
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
        {!! Form::label('code', 'Code', [
            'class'=>'col-2 col-form-label'
        ]) !!}
        <div class="col-10">
            {!! Form::text('code', null, [
                'class'=> 'form-control'
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('locale', 'Locale', [
            'class'=>'col-2 col-form-label'
        ]) !!}
        <div class="col-10">
            {!! Form::text('locale', null, [
                'class'=> 'form-control'
            ]) !!}
        </div>
    </div>
    @if(!$language->default)
        <div class="form-group row">
            {!! Form::label('enabled', 'Status', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::select('enabled', [
                    '1'=>'Enabled',
                    '0'=>'Disabled'
                ], null, [
                    'class'=>'form-control',
                    'onchange'=>"if(this.value=='0')$('[name=\'default\']').prop('checked',0);"
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('default', 'Default', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::checkbox('default', '1', null, [
                    'onclick'=>"if(this.checked)$('[name=\'enabled\']').prop('value', 1);"
                ]) !!}
            </div>
        </div>
    @endif
    {!! Form::close() !!}

@endsection