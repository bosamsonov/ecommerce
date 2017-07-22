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
    AttributeValueTranslation,
    AttributeSet
};

class AttributeSetController extends Controller
{
    public function index()
    {
        $sites = Site::all()->transform(function ($site, $key) {
            $siteTranslationIds = $site->translations->pluck('id');
            $siteAttributeIds = AttributeTranslation::whereIn('site_translation_id', $siteTranslationIds)->groupBy('attribute_id')->select('attribute_id')->get()->pluck('attribute_id')->toArray();
            $siteAttributeSets = AttributeSet::whereHas('attributes', function($q) use ($siteAttributeIds){
                $q->whereIn('attribute_id', $siteAttributeIds);
            })->get();

            $site->attributeSets = $siteAttributeSets;
            return $site;
        });
        
        return view('admin.pages.attributes.sets.index', [
            'sites'=>$sites
        ]);
    }
    
    public function create(Site $site)
    {

        $siteTranslationIds = $site->translations->pluck('id');
        $siteAttributeIds = AttributeTranslation::whereIn('site_translation_id', $siteTranslationIds)->groupBy('attribute_id')->select('attribute_id')->get()->pluck('attribute_id')->toArray();
        $attributes = Attribute::whereIn('id', $siteAttributeIds)->pluck('name', 'id');
       
        return view('admin.pages.attributes.sets.create', [
            'site'=>$site,
            'attributes'=>$attributes
        ]);
    }
    
    public function store(Request $request, Site $site)
    {
        //TODO: validate attribute IDS
        $this->validate($request, [
            'name'=>'required',
            'attributes'=>'required'
            ]);
        
        //TODO: TRANSACTION
        $attributeSet = AttributeSet::create($request->all());
        $attributeSet->attributes()->attach($request->all()['attributes']);
        
        return redirect()->route('admin.attributes.sets.index');
    }
    
    
    
  
    
}
