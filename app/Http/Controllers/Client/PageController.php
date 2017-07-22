<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\{
    PageTranslation
};

class PageController extends Controller
{
    public function index(Request $request, $page)
    {
        if(!is_null($page)) {
            $design = 'page';
            $theme = $page->siteTranslation->site->theme;
            
            return view('client.'.$theme.'.pages.'.$design, [
                    'page' => $page
                ]);
        } else {
            echo 'no page';
        }
        // dd($page->toArray());
        // dd($request->get('siteData'));
    }
}
