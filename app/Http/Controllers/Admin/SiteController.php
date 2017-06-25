<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Site;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('admin.pages.sites.create');
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
            'url' => 'required|unique:sites',
        ]);

        Site::create($request->all());

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
        return view('admin.pages.sites.edit', [
            'site'=>$site
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
            'url' => 'required|unique:sites,url,'.$site->id,
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
}