@extends('admin.modules.page.page')

@section('content')

    <div class="page-header">
            <div class="pull-right">
                <a href="{!! URL::route('admin.sites.create')!!}"
                   class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </a>
                <button type="submit"
                        class="btn btn-danger"
                        onclick="confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?') ? $('#form-sites').submit() : false;"
                >
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
            </div>
            <h1>Sites</h1>
    </div>


    {!! Form::open([
        'route' => 'admin.sites.destroy',
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
                        Name
                    </th>
                    <th>
                        URL
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($sites as $site)
                    <tr>
                        <td>
                            {!! Form::checkbox('selected[]', $site->id, false) !!}
                        </td>
                        <td>
                            {{$site->name}}
                        </td>
                        <td>
                            {{$site->url}}
                        </td>
                        <td>
                            <a href="{!! URL::route('admin.sites.edit', $site->id)!!}"
                                class="btn btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            {{--{!! link_to_route('admin.sites.edit', 'Edit', $site->id) !!}--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {!! Form::close() !!}
@endsection