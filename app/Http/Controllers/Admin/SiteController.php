<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Site,
    SiteTranslation
};
use Illuminate\Validation\Rule;
use DB;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sites = Site::all();
        return view('admin.pages.sites.index', [
            'sites'=>$sites
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = self::getThemes();
        $themes = array_combine($themes, $themes);
        return view('admin.pages.sites.create', [
                'themes' => $themes
            ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|unique:sites',
            'language_name' => 'required',
            'language_code' => 'required',
            'host' => 'required|unique:site_translations',
            'theme' => [
                'required',
                 Rule::in(self::getThemes()),
                ]
        ]);
        
        DB::transaction(function () use ($request) {
            try {
                Site::create($request->all())
                    ->translations()->save(
                        new SiteTranslation(array_merge(
                            $request->all(), [
                                'is_default'=>true,
                                'language_type'=>'host',
                                'sort_order'=>0,
                                'is_enabled'=>true
                            ])
                        )
                    );
                } catch (\Exception $e) {
                        DB::rollback();

                     return redirect()->back()
                      ->withErrors(['error' => $e->getMessage()]);
                }
        });
        
        return redirect(route('admin.sites.index'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        $themes = self::getThemes();
        $themes = array_combine($themes, $themes);
        return view('admin.pages.sites.edit', [
            'site' => $site,
            'themes' => $themes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $this->validate($request, [
            'name' => 'bail|required|unique:sites,name,'.$site->id,
            'theme' => [
                'required',
                 Rule::in(self::getThemes()),
                ]
        ]);

        $site->update($request->all());

        return redirect(route('admin.sites.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->selected) Site::whereIn('id', $request->selected)->delete();
        return redirect(route('admin.sites.index'));
    }
    
    protected static function getThemes() {
        $path = resource_path().'/views/client';
        
        $themes = array_filter(scandir($path), function($item) use ($path) {
            return $item!='.'&&$item!='..'&&is_dir($path . '/' . $item);
        });
        
        return $themes;
    }

}
