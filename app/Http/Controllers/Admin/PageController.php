<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use DB;
use App\Models\{
    Site,
    SiteTranslation,
    Page,
    PageTranslation
};

class PageController extends Controller
{
    public function index(){
        return view('admin.pages.pages.index', [
                'sites' => Site::with('pages.translations')->get(),
            ]);
    }

    public function create(Site $site){
        $pageLanguageOptions = $site->translations->pluck('language_name', 'id');
        return view('admin.pages.pages.create', [
            'site' => $site,
            'pageLanguageOptions' => $pageLanguageOptions
        ]);
    }
    
    public function store(Request $request, Site $site){
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required|unique_with:page_translations,site_translation_id,url'
            ]);
            
        //TODO: validate site_translation_id
        
        DB::transaction(function () use ($request, $site) {
            try {
                    $page = $site
                        ->pages()->save(
                            new Page()
                            );

                    $page->translations()->save(
                            new PageTranslation($request->all())
                        );

                    } catch (\Exception $e) {
                        DB::rollback();
                         return redirect()->back()
                          ->withErrors(['error' => $e->getMessage()]);
                    }
            });
            return redirect()->route('admin.pages.index');
    }
    
    public function destroy(Request $request)
    {
        if ($request->selected) {
            DB::transaction(function () use ($request) {
                try {
                    PageTranslation::whereIn('id', $request->selected)->delete();
                    Page::has('translations', '=', DB::raw(0))->delete();
                } catch (\Exception $e) {
                    DB::rollback();
                     return redirect()->back()
                          ->withErrors(['error' => $e->getMessage()]);
                }
            });
        }
        return redirect()->route('admin.pages.index');
    }
    
        

}
