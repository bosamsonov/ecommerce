<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Site,
    SiteTranslation,
    Page,
    PageTranslation
};

class BaseController extends Controller
{
    public function reroute(Request $request)
    {
        $page = PageTranslation::where([
                ['site_translation_id', '=', $request->get('siteData')['id']],
                ['url', '=', $request->path()]
            ])->first();
        $controller = app()->make('App\Http\Controllers\Client\PageController');
        $arguments = [$page]; //put the arguments that method requires in here
        return  app()->call([$controller, 'index'], $arguments);
    }
}
