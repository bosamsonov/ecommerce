@extends('admin.modules.page.page')

@section('content')

    <div class="page-header">
            <div class="pull-right">
                <a href="{!! URL::route('admin.languages.create')!!}"
                   class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </a>
                <button type="submit"
                        class="btn btn-danger"
                        onclick="confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?') ? $('#form-languages').submit() : false;"
                >
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
            </div>
            <h1>Languages</h1>
    </div>


    {!! Form::open([
        'route' => 'admin.languages.destroy',
        'method' => 'delete',
        'id'=>'form-languages'
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
                        Code
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Sort Order
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($languages as $language)
                    <tr>
                        <td>
                            @if(!$language->default)
                                {!! Form::checkbox('selected[]', $language->id, false) !!}
                            @endif
                        </td>
                        <td>
                            {{$language->name}}
                        </td>
                        <td>
                            {{$language->code}}
                        </td>
                        <td>
                            {{($language->enabled)?'Enabled':'Disabled'}}
                            <b>{{($language->default)?'Default':''}}</b>
                        </td>
                        <td>
                            <a href="{!! URL::route('admin.languages.order', [$language, 'order=1']) !!}"
                                class="btn btn-primary {!! ($loop->first)?'disabled':'' !!}"
                            >
                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                            </a>
                            <a href="{!! URL::route('admin.languages.order', [$language, 'order=-1']) !!}"
                               class="btn btn-primary {!! ($loop->last)?'disabled':'' !!}"
                            >
                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                            </a>

                        </td>
                        <td>
                            <a href="{!! URL::route('admin.languages.edit', $language)!!}"
                                class="btn btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {!! Form::close() !!}
@endsection