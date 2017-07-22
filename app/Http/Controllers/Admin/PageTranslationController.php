<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Site,
    SiteTranslation,
    Page,
    PageTranslation
};

class PageTranslationController extends Controller
{
    public function create(Page $page)
    {
        // dd($page->site);
        // dd(self::getDesigns($page->site));
        $existingSiteTranslationIds = $page->translations->pluck('site_translation_id')->toArray();
        $pageLanguageOptions = $page->site->translations->whereNotIn('id', $existingSiteTranslationIds)->pluck('language_name', 'id');
        return view('admin.pages.pages.translation.create', [
                'page' => $page,
                'pageLanguageOptions' => $pageLanguageOptions
            ]);
    }
    
    public function store(Request $request, Page $page)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required|unique_with:page_translations,site_translation_id,url'
            ]);
            
        //TODO: validate site_translation_id
        //TODO: validate page and site_translation_id
        //TODO: remove duplication with same validation of PageController        
        $page->translations()->save(
            new PageTranslation($request->all())
        );
        
        return redirect()->route('admin.pages.index');
    }
    
    public function edit($page, PageTranslation $pageTranslation)
    {
        return view('admin.pages.pages.translation.edit', [
                'pageTranslation' => $pageTranslation
            ]);
    }
    
    public function update(Request $request, $page, PageTranslation $pageTranslation)
    {
        
        $request->request->add(['site_translation_id'=> $pageTranslation->site_translation_id]);
        
        if (is_null($request->is_enabled)){
            $request->request->add([
                'is_enabled' => false
                ]);
        }
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required|unique_with:page_translations,site_translation_id,url,'.$pageTranslation->id,
        ]);

        $pageTranslation->update($request->only([
                'title', 'url', 'seo_title', 'seo_keywords', 'seo_description', 'content', 'is_enabled',
            ]));
        return redirect()->route('admin.pages.index');
    }
    
    protected static function getDesigns($site)
    {
        $theme = $site->theme;
        $path = resource_path().'/views/client/'.$theme.'/pages';
        
        $themes = array_filter(scandir($path), function($item) use ($path) {
            return $item!='.'&&$item!='..';
        });
        dd($themes);
        
        
        
    }

}
