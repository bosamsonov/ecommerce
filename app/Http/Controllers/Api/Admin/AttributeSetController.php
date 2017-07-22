<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Site,
    AttributeSet,
    AttributeTranslation
};

class AttributeSetController extends Controller
{
    public function showSiteAttributes(Site $site){
        
        // $sites = Site::all()->transform(function ($site, $key) {
        //     $siteTranslationIds = $site->translations->pluck('id');
        //     $siteAttributeIds = AttributeTranslation::whereIn('site_translation_id', $siteTranslationIds)->groupBy('attribute_id')->select('attribute_id')->get()->pluck('attribute_id')->toArray();
        //     $siteAttributeSets = AttributeSet::whereHas('attributes', function($q) use ($siteAttributeIds){
        //         $q->whereIn('attribute_id', $siteAttributeIds);
        //     })->get();

        //     $site->attributeSets = $siteAttributeSets;
        //     return $site;
        // });
        // dd($site);
        // $site->load(['translations' => function($q){
        //     $q->addSelect(['site_translation_id', 'language_name']);
        // }]);

        // dd($site->translations->toArray());
        // $site->translations->transform(function($st){
        //     dump($st);
        // });
        // die();

        return response()->json(
            $site
                ->translations()
                ->select(['id', 'language_name'])
                ->get()
                ->transform(function ($siteTranslation) use ($site) {
                    $siteTranslationAttributeIds = AttributeTranslation::where('site_translation_id', $siteTranslation->id)
                                                        ->groupBy('attribute_id')
                                                        ->get()
                                                        ->pluck('attribute_id')
                                                        ->toArray();

                    $siteTranslationAttributeSets = collect(
                        AttributeSet::select('id', 'name')
                            ->with([
                                'attributes' => function($q) use ($siteTranslation){
                                    $q->addSelect('attributes.id','attributes.name')
                                        ->with('values');
                                }])
                            ->whereHas('attributes', function($q) use ($siteTranslationAttributeIds){
                                $q->whereIn('attribute_id', $siteTranslationAttributeIds);
                            })
                            ->get()
                            ->toArray()
                        )
                        ->transform(function($attributeSet){
                            $attributeSet['attributes'] = collect($attributeSet['attributes'])
                                                            ->keyBy('id')
                                                            ->transform(function($attributes){
                                                                $attributes['values'] = collect($attributes['values'])
                                                                    ->keyBy('id')
                                                                    ->transform(function($attribute){
                                                                        return collect($attribute)->only('name');
                                                                    });
                                                                return $attributes;
                                                            })->transform(function($attribute){
                                                                return collect($attribute)->only(['name', 'values']);
                                                            });
                            return $attributeSet;
                        });
                    
                $siteTranslation->attributeSets = $siteTranslationAttributeSets->keyBy('id');
                return collect($siteTranslation)->only('id', 'attributeSets');
        })->keyBy('id'));
        
        // {
        //     site_translation_id: {
        //         attributes: {
        //             attribute_id: {
        //                 name
        //             },
        //         }
        //     }
        // }
        
        
        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'CA'
        // ]);
    }
}
