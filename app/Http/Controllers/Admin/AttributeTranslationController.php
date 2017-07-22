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

class AttributeTranslationController extends Controller
{
    public function create(Site $site, Attribute $attribute)
    {
        $existingSiteTranslationIds = $attribute->translations->pluck('site_translation_id')->toArray();
        $pageLanguageOptions = $site->translations->whereNotIn('id', $existingSiteTranslationIds)->pluck('language_name', 'id');
        return view('admin.pages.attributes.translation.create', [
                'site'=>$site,
                'attribute' => $attribute,
                'pageLanguageOptions' => $pageLanguageOptions
            ]);
    }
    
    public function store(Request $request, Site $site, Attribute $attribute)
    {
        //TODO: check if all atrtribute values are present
        //TODO: check if site_translation_id is valid
        $this->validate($request, [
            'site_translation_id' => 'required',
            'display_name' => 'required',
            'options.*' => 'required'
            ]);
            
        $attribute->translations()
        ->save(
                new AttributeTranslation(
                    array_merge(
                        $request->only('site_translation_id'), [
                            'name' => $request->display_name    
                        ])
                    )
            );
            
        foreach ($request->options as $optionId => $optionName) {
            AttributeValue::find($optionId)->translations()
                    ->save(
                        new AttributeValueTranslation(
                            array_merge(
                                $request->only('site_translation_id'), [
                                    'name' => $optionName
                                ])
                            )
                        );
        }
            
            
        return redirect()->route('admin.attributes.index');
            
    }
}
