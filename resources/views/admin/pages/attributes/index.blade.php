@extends('admin.modules.page.page')

@section('content')

    <div class="page-header">
        <h1>Product attributes</h1>
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
                        <a href="{!! URL::route('admin.attributes.create', $site->id)!!}"
                           class="btn btn-primary">
                            Create attribute
                        </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Language
                                    </th>
                                    <th>
                                        Name on site
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($site->attributeTranslationsOnePerAttribute as $attributeTranslationOnePerAttribute)
                                    @foreach($attributeTranslationOnePerAttribute->attribute->translations as $attributeTranslation)
                                        <tr>
                                            @if ($loop->first)
                                                <td rowspan="{!!$attributeTranslationOnePerAttribute->attribute->translations->count()!!}">{{$attributeTranslationOnePerAttribute->attribute->name}}</td>
                                            @endif
                                            <td>{{$attributeTranslation->siteTranslation->language_name}}</td>
                                            <td>{{$attributeTranslation->name}}</td>
                                            @if ($loop->first)
                                                <td rowspan="{!! $attributeTranslationOnePerAttribute->attribute->translations->count() !!}" class="align-middle">
                                                    <a href="{!! route('admin.attributes.edit', [$attributeTranslationOnePerAttribute->attribute]) !!}" class="btn btn-primary">
                                                        Edit
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    @if ($attributeTranslationOnePerAttribute->attribute->translations->count() < $site->translations->count())
                                    <tr>
                                            <td colspan="3">
                                                <a class="btn btn-primary" href="{{route('admin.attributes.translation.create', [$site, $attributeTranslationOnePerAttribute->attribute])}}">Add translation</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!$loop->last)
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            
                        </table>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection