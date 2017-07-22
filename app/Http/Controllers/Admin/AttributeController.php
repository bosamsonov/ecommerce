<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\{
    Site,
    SiteTranslation,
    Attribute,
    AttributeTranslation,
    AttributeValue,
    AttributeValueTranslation
};

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        $sites = Site::with('attributeTranslationsOnePerAttribute.attribute.translations.siteTranslation')->get();

        return view('admin.pages.attributes.index', [
            'sites'=>$sites
        ]);
    }
    
    public function create(Site $site)
    {
        $pageLanguageOptions = $site->translations->pluck('language_name', 'id');
        return view('admin.pages.attributes.create', [
            'site' => $site,
            'pageLanguageOptions' => $pageLanguageOptions
        ]);
    }
    
    public function store(Request $request, Site $site)
    {
        dd($request->all());
        $this->validate($request, [
                'name' => 'required|unique:attributes',
                'display_name' => 'required',
                'options.*.name' => 'required',
                'options.*.admin_name' => 'required'
            ]);
        //TODO: validate site_translation_id
        
        //TODO:CREATE TRANSACTION
        
        die();
        
        $attribute = Attribute::create($request->only(['name']));
        $attribute->translations()
                ->save(
                        new AttributeTranslation(
                            array_merge(
                                $request->only('site_translation_id'), [
                                    'name' => $request->display_name    
                                ])
                            )
                    );
        foreach ($request->options as $option) {
            $attribute->values()
                ->save(
                    new AttributeValue([
                        'name' => $option['admin_name']
                        ])
                )->translations()
                    ->save(
                        new AttributeValueTranslation(
                            array_merge(
                                $request->only('site_translation_id'), [
                                    'name' => $option['name']
                                ])
                            )
                        );
        }

        return redirect()->route('admin.attributes.index');
    }
    
    public function edit(Attribute $attribute)
    {
        $attribute = Attribute::with(['translations.siteTranslation', 'values.translations'])->find($attribute)->first();
        return view('admin.pages.attributes.edit', [
            'attribute' => $attribute
            ]);
    }
    
    public function update(Request $request, Attribute $attribute)
    {
        dd($request->all());
    }
    
}
