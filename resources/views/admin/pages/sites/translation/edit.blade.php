@extends('admin.modules.page.page')

@section('content')

    <div class="page-header">
        <div class="float-right">

            <a href="{!! URL::route('admin.sites.index')!!}"
               class="btn btn-secondary">
                <i class="fa fa-reply" aria-hidden="true"></i>
            </a>
        </div>
        <h1 class="h1">Edit Site
            <small class="text-muted">
                {{$site->name}}
            </small>
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-3 push-lg-9 col-xl-2 push-xl-10">
             <ul class="nav nav-pills flex-lg-column" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#general" id="general-tab" role="tab" data-toggle="tab">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#languages" role="tab" data-toggle="tab">Languages</a>
                </li>
        
            </ul>
        </div>
        <div class="col-lg-9 pull-lg-3 pr-lg-4 col-xl-10 pull-xl-2">
            <div class="tab-content mt-4 mt-lg-0">
                <div role="tabpanel" class="tab-pane fade show active" id="general">
                    <h2 class="h2 hidden-md-down">General</h2>
                    {!! Form::model($site, [
                        'route' => ['admin.sites.update', $site],
                        'method' => 'put',
                        'id'=>'form-site'
                        ]) !!}
                        <div class="form-group  @if ($errors->has('name')) has-danger @endif row">
                            {!! Form::label('name', 'Name', [
                                'class'=>'col-2 col-form-label'
                            ]) !!}
                            <div class="col-10">
                                {!! Form::text('name', null, [
                                    'class'=> 'form-control'
                                ]) !!}
                            </div>
                        </div>
                        <button type="submit"
                                class="btn btn-primary"
                        >
                            <!--<i class="fa fa-floppy-o" aria-hidden="true"></i>-->
                            Save
                        </button>
                    {!! Form::close() !!} 
                </div>
                <div role="tabpanel" class="tab-pane fade" id="languages">
                    <div>
                        <div class="float-lg-right">
                            <a href="{!! URL::route('admin.sites.create')!!}"
                               class="btn btn-primary">
                                Add language
                            </a>
                        </div>
                        <h2 class="h2 hidden-md-down">Languages</h2>
                    </div>
                    {!! Form::open([
                        'route' => 'admin.sites.destroy',
                        'method' => 'delete',
                        'id'=>'form-sites'
                    ]) !!}
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);">
                                    </th>
                                    <th>
                                        Language Name
                                    </th>
                                    <th>
                                        Language Code
                                    </th>
                                    <th>
                                        Language Type
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Sort Order
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($site->translations as $siteTranslation)
                                    <tr>
                                        <td>
                                            {!! Form::checkbox('selected[]', $siteTranslation->id, false) !!}
                                        </td>
                                        <td>
                                            {{$siteTranslation->language_name}}
                                        </td>
                                        <td>
                                            {{$siteTranslation->language_code}}
                                        </td>
                                        <td>
                                            {{$siteTranslation->language_type}}
                                            @if ($siteTranslation->language_type == 'host')
                                                <b>{{$siteTranslation->host}}</b>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($siteTranslation->is_enabled)
                                                <span class="badge badge-success">Enabled</span>
                                            @else
                                                <span class="badge badge-warning">Disabled</span>
                                            @endif
                                            
                                            @if ($siteTranslation->is_default)
                                                <span class="badge badge-default">Default</span>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="{!! URL::route('admin.languages.order', [$siteTranslation, 'order=1']) !!}"
                                                class="btn btn-primary btn-sm {!! ($loop->first)?'disabled':'' !!}"
                                            >
                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                            </a>
                                            <a href="{!! URL::route('admin.languages.order', [$siteTranslation, 'order=-1']) !!}"
                                                class="btn btn-primary btn-sm {!! ($loop->last)?'disabled':'' !!}"
                                            >
                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                                                                <td>
                                            <!--<a href="{!! URL::route('admin.sites.edit', $site->id)!!}"-->
                                            <!--    class="btn btn-primary">-->
                                            <!--    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>-->
                                            <!--</a>-->
                                            <!--{{--{!! link_to_route('admin.sites.edit', 'Edit', $site->id) !!}--}}-->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                  
                        
                    {!! Form::close() !!}
                     
                 </div>
            </div>
        </div>
   
    </div>




   


@endsection