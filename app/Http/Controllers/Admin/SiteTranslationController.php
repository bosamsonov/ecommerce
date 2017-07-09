<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Site,
    SiteTranslation
};
use Validator;
use Illuminate\Validation\Rule;
use DB;

class SiteTranslationController extends Controller
{

    public function create(Site $site)
    {
        return view('admin.pages.sites.translation.create', [
            'site' => $site,
        ]);
    }
    
    public function store(Request $request, Site $site)
    {
        $siteTranslations = $site->translations();
        
        $defaultSite=$site->translations()->get()->where('is_default', true)->first();
        
        $defaultHost=$defaultSite->host;
        
        $this->validateTranslation($request, $site, $defaultSite, $defaultHost, null);
        
        $sortOrder = SiteTranslation::where('site_id', $site->id)->min('sort_order')-1;

        if($request->is_default){
            DB::transaction(function () use ($request, $site, $defaultSite, $defaultHost, $siteTranslations, $sortOrder) {
                try {

                        $affectedHost = strtolower($request->affected_type)=='host'?$request->affected_host:$request->host;

                        $defaultSite->update([
                            'is_default' => false,
                            'host' => $affectedHost,
                            'language_type' => $request->affected_type
                        ]);
                    
                        $siteTranslations->whereNotIn('language_type', ['host'])
                            ->update([
                                'host' => $request->host
                            ]);

                        
                        $site->translations()->save(new SiteTranslation(array_merge(
                                $request->only([
                                    'language_name',
                                    'language_code',
                                    'language_type',
                                    'is_enabled',
                                    'is_default',
                                    'host'
                                ]), [
                                    'sort_order' => $sortOrder
                                ]
                        )));
                        
                    } catch (\Exception $e) {
                        DB::rollback();
    
                        return redirect()->back()
                            ->withErrors(['error' => $e->getMessage()]);
                    }
            });
        
        } else {
            $host = $request->language_type=='host'?$request->host:$defaultHost;

            $site->translations()->save(new SiteTranslation(array_merge(
                    $request->only([
                        'language_name',
                        'language_code',
                        'language_type',
                        'is_enabled'
                    ]), [
                        'is_default' => false,
                        'host' => $host,
                        'sort_order' => $sortOrder
                    ]
            )));
     
        }
        
        return redirect()->back();

    }
    
    public function destroy(Request $request, Site $site)
    {
        $this->validate($request,[
                'selected'=>'required',
                'selected.*'=>Rule::notIn([$site->translations->where('is_default', 1)->first()->id])
            ]);
        
        SiteTranslation::whereIn('id', $request->selected)->delete();
        return redirect()->back();
    }
    
    
    public function edit(Site $site, SiteTranslation $siteTranslation)
    {
        return view('admin.pages.sites.translation.edit', [
            'site' => $site,
            'siteTranslation' => $siteTranslation,
        ]);
        
    }
    
    public function update(Request $request, Site $site, SiteTranslation $siteTranslation)
    {
        $siteTranslations = $site->translations();
        
        $defaultSite=($siteTranslation->is_default)?$siteTranslation:$site->translations()->get()->where('is_default', true)->first();
        
        $defaultHost=$defaultSite->host;
        $this->validateTranslation($request, $site, $defaultSite, $defaultHost, $siteTranslation);
        
        if ($siteTranslation->is_default) {
            DB::transaction(function() use ($request, $siteTranslation, $siteTranslations) {
                try {
                    if ($siteTranslation->host!=$request->host) {
                        $siteTranslations->whereNotIn('language_type', ['host'])
                        ->update([
                            'host' => $request->host
                        ]);
                    }
                    $siteTranslation->update($request->only([
                        'language_name',
                        'language_code',
                        'host'
                        ]));
                } catch (\Exception $e) {
                    DB::rollback();

                    return redirect()->back()
                        ->withErrors(['error' => $e->getMessage()]);
                }
            });
                
        } else {
            
            if($request->is_default){
                DB::transaction(function () use ($request, $site, $defaultSite, $defaultHost, $siteTranslations, $siteTranslation) {
                    try {
    
                            $affectedHost = strtolower($request->affected_type)=='host'?$request->affected_host:$request->host;
    
                            $defaultSite->update([
                                'is_default' => false,
                                'host' => $affectedHost,
                                'language_type' => $request->affected_type
                            ]);
                        
                            $siteTranslations->whereNotIn('language_type', ['host'])
                                ->update([
                                    'host' => $request->host
                                ]);
    
                            
                            $siteTranslation->update(
                                    $request->only([
                                        'language_name',
                                        'language_code',
                                        'language_type',
                                        'is_enabled',
                                        'is_default',
                                        'host'
                                    ])
                            );
                            
                        } catch (\Exception $e) {
                            DB::rollback();
        
                            return redirect()->back()
                                ->withErrors(['error' => $e->getMessage()]);
                        }
                });
            
            } else {
                $host = $request->language_type=='host'?$request->host:$defaultHost;
    
                $siteTranslation->update(array_merge(
                        $request->only([
                            'language_name',
                            'language_code',
                            'language_type',
                            'is_enabled'
                        ]), [
                            'is_default' => false,
                            'host' => $host
                        ]
                ));
         
            }
            
        }
        
        return redirect()->back();
      
    }
    
    private function validateTranslation($request, $site, $defaultSite, $defaultHost, $siteTranslation) 
    {
        
        $v = Validator::make(array_merge($request->all(),['site_id'=>$site->id]), [
            'is_default' => 'boolean',
            'is_enabled' => 'boolean|required_if:is_default,1',
            'language_name'=>'required|unique_with:site_translations,site_id,language_name'.(!is_null($siteTranslation)?','.$siteTranslation->id:''),
            'language_code'=>'required|unique_with:site_translations,site_id,language_code'.(!is_null($siteTranslation)?','.$siteTranslation->id:''),
            'host' => [
                    'required_if:language_type,host,is_default,1',
                    Rule::unique('site_translations')->where(function($query) use ($site){
                        $query->whereNotIn('site_id', [$site->id]);
                    })
                ],
            'language_type'=>Rule::in(['path','subdomain','host']),
        ]);
        
        $v->sometimes('language_type', Rule::in(['host']), function ($input) {
            return $input->is_default==true;
        });

        $v->sometimes('affected_host', 'required_if:affected_type,host', function ($input) {
            return $input->is_default==true;
        });
        
        $v->sometimes('affected_host', Rule::notIn([$request->host]), function ($input) {
            return $input->is_default==true && strtolower($input->affected_type)=='host';
        });
        
        $v->sometimes('host', Rule::notIn([$defaultHost]), function($input){
            return !$input->is_default && strtolower($input->language_type)=='host';
        });
        
        $v->validate();    
    }
    
    
}
