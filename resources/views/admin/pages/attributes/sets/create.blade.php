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
            <a href="{!! URL::route('admin.attributes.sets.index')!!}"
               class="btn btn-secondary">
                <i class="fa fa-reply" aria-hidden="true"></i>
            </a>
        </div>
        <h1 class="h1">Create attribute set
            <small class="text-muted">
                for {{$site->name}}
            </small>
        </h1>
    </div>
    
    
    {!! Form::open([
        'route' => ['admin.attributes.sets.store', $site],
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
        <fieldset>
            <legend>Attributes</legend>
            @foreach($attributes as $attributeId=>$attributeName)
                <div class="form-group row">
                    <div class="form-check col-12">
                      <label class="form-check-label">
                            {!! Form::checkbox('attributes[]', $attributeId, null, [
                                'class'=> 'form-check-input'
                            ]) !!}
                            {{$attributeName}}
                      </label>
                    </div>
                </div>
            @endforeach
         </fieldset>

    {!! Form::close() !!}

    
@endsection