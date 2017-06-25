<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Language;


class LanguageController extends Controller
{
    /**
     * Display a liwsting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::ordered();
        return view('admin.pages.languages.index', [
            'languages'=>$languages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languageIsDefault=Language::where('default', 1)->get()->isEmpty()?true:false;
        return view('admin.pages.languages.create', [
            'languageIsDefault'=>$languageIsDefault
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
            'name' => 'bail|required|unique:languages',
            'code' => 'required|unique:languages',
            'locale' => 'nullable|string',
            'enabled' => 'boolean',
            'default' => 'boolean'
        ]);

        $languages = Language::all();

        $languagesHaveDefault=$languages->where('default', 1)->isEmpty()?false:true;

        $languageSortOrder=($languages->isEmpty())?'0':$languages->min('sort_order')-1;

        if(!$languagesHaveDefault) {
            Language::create(array_merge($request->all(), [
                'enabled'=>true,
                'default'=>true,
                'sort_order'=>$languageSortOrder
            ]));
        } else {
            if($request->has('default')) {
                Language::where('default', '1')->update(['default'=> 0]);
                Language::create(array_merge($request->all(), [
                    'enabled'=>true,
                    'default'=>true,
                    'sort_order'=>$languageSortOrder
                ]));
            } else {
                Language::create(array_merge($request->all(), [
                    'sort_order'=>$languageSortOrder
                ]));
            }
        }

        return redirect(route('admin.languages.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('admin.pages.languages.edit',[
            'language'=>$language
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $this->validate($request, [
            'name' => 'bail|required|unique:languages,name,'.$language->id,
            'code' => 'required|unique:languages,code,'.$language->id,
            'locale' => 'nullable|string',
            'enabled' => 'boolean',
            'default' => 'boolean'
        ]);

        if($request->has('default')) {
            Language::where('default', '1')->update(['default' => 0]);
        }
        $language->update($request->all());
        return redirect(route('admin.languages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->selected) Language::whereIn('id', $request->selected)->delete();
        return redirect(route('admin.languages.index'));
    }

    public function order(Request $request, Language $language)
    {
        $sortOrder = $language->sort_order;
        switch($request->order) {
            case 1:
                $languageAffected = Language::where('sort_order','>',$language->sort_order)->ordered()->last();
                break;
            case -1:
                $languageAffected = Language::where('sort_order', '<', $language->sort_order)->ordered()->first();
                break;
            default:
                return redirect(route('admin.languages.index'));
        }

        $language->update([
            'sort_order'=>$languageAffected->sort_order
        ]);

        $languageAffected->update([
            'sort_order'=>$sortOrder
        ]);

        return redirect(route('admin.languages.index'));
    }
}
