<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\{
    Site,
    SiteTranslation
};

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sites = Site::all();
        return view('admin.pages.products.index', [
            'sites'=>$sites
        ]);
    }
    
    public function create(Site $site)
    {
        $pageLanguageOptions = $site->translations->pluck('language_name', 'id');
        return view('admin.pages.products.create', [
            'site' => $site,
            'pageLanguageOptions' => $pageLanguageOptions
        ]);
    }
    
    public function store(Request $request, Site $site)
    {
        $this->validate($request,[
                'images.*' => 'image|mimes:jpeg,bmp,png|max:2000'
            ]);
        dd($request->all());
    }
    
}
