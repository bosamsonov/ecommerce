@extends('admin.modules.page.page')

@section('content')

    <div class="page-header">
            <h1>Products</h1>
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
                        <a href="{!! URL::route('admin.products.create', $site->id)!!}"
                           class="btn btn-primary">
                            Create product
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection