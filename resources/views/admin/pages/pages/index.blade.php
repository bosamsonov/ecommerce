@extends('admin.modules.page.page')

@section('content')

    <div class="page-header">
            <h1>Pages</h1>
    </div>
    
    <div class="row">
        <div class="col-lg-3 push-lg-9 col-xl-2 push-xl-10">
            <ul class="nav nav-pills flex-lg-column" role="tablist">
                @foreach ($sites as $site)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif" href="#page{!! $site->id !!}" id="general-tab" role="tab" data-toggle="tab">{!!$site->name!!}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-9 pull-lg-3 pr-lg-4 col-xl-10 pull-xl-2">
            <div class="tab-content mt-4 mt-lg-0">
                @foreach ($sites as $site)
                    <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif" id="page{!!$site->id!!}">
                        <a href="{!! URL::route('admin.pages.create', $site->id)!!}"
                           class="btn btn-primary">
                            Create page
                        </a>
                        
                        {!! Form::open([
                            'route' => 'admin.pages.destroy',
                            'method' => 'delete',
                            'id'=>'form-sites'
                        ]) !!}
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);">
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Language
                                        </th>
                                        <th>
                                            URL
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($site->pages as $page)
                                        @foreach($page->translations as $pageTranslation)
                                            @if(!$loop->parent->first)
                                                <tr><td colspan="6"></td></tr>
                                            @endif
                                            
                                            <tr>
                                                <td>
                                                    {!! Form::checkbox('selected[]', $pageTranslation->id, false) !!}
                                                </td>
                                                <td>
                                                    {{$pageTranslation->title}}
                                                </td>
                                                <td>
                                                    {{$pageTranslation->siteTranslation->language_name}}
                                                </td>
                                                <td>
                                                    {{$pageTranslation->url}}
                                                </td>
                                                <td>
                                                    @if ($pageTranslation->is_enabled)
                                                        <span class="badge badge-success">Enabled</span>
                                                    @else
                                                        <span class="badge badge-danger">Disabled</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    Action
                                                </td>
                                            </tr>
                                            @if($site->translations->count() != $page->translations->count())
                                                <tr>
                                                    <tr><td></td><td colspan="5">Add translation</td></tr>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit"
                                    class="btn btn-danger"
                                    onclick="confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?') ? $('#form-sites').submit() : false;"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        {!!Form::close()!!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection