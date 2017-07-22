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
        <h1>Edit Attribute
            <small class="text-muted">
            </small>
        </h1>
    </div>

    {!! Form::model($attribute, [
        'method' => 'PUT',
        'route' => ['admin.attributes.update', $attribute],
        'id'=>'form-site'
    ]) !!}
        <div class="form-group row">
            {!! Form::label('name', 'Name for admin', [
                'class'=>'col-2 col-form-label'
            ]) !!}
            <div class="col-10">
                {!! Form::text('name', null, [
                    'class'=> 'form-control'
                ]) !!}
            </div>
        </div>
        <fieldset class="form-group mb-4">
            <legend class="col-form-legend">Name on site</legend>
            @foreach($attribute->translations as $attributeTranslation)
                <div class="form-group row">
                    {!! Form::label('display_name', $attributeTranslation->siteTranslation->language_name, [
                        'class'=>'col-2 col-form-label'
                    ]) !!}
                    <div class="col-10">
                        {!! Form::text('display_name['.$attributeTranslation->id.']', $attributeTranslation->name, [
                            'class'=> 'form-control'
                        ]) !!}
                    </div>
                </div>
            @endforeach
        </fieldset>
        <fieldset class="form-group mb-4">
            <legend class="col-form-legend">Values</legend>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Admin name
                            </th>
                            @foreach ($attribute->translations as $attributeTranslation)
                                <th>
                                    {{$attributeTranslation->siteTranslation->language_name}}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attribute->values as $attributeValue)
                            <tr>
                                <td>
                                    {!! Form::text('values['.$attributeValue->id.']', $attributeValue->name, [
                                            'class'=> 'form-control'
                                        ]) !!}
                                </td>
                                @foreach ($attributeValue->translations as $attributeValueTranslation)
                                    <td>
                                        {!! Form::text('valueTranslations['.$attributeValueTranslation->id.']', $attributeValueTranslation->name, [
                                            'class'=> 'form-control'
                                        ]) !!}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
        </fieldset>


    {!! Form::close() !!}

@endsection