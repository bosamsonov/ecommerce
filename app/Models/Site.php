<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable=[
        'name',
        'theme'
    ];
    
    public function translations()
    {
        return $this->hasMany(SiteTranslation::class)->orderBy('sort_order', 'desc');
    }
    
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
    
    public function attributeTranslationsOnePerAttribute() {
        // dd($this->hasManyThrough(AttributeTranslation::class, SiteTranslation::class)->groupBy('attribute_id')->with('attribute')->get()->pluck('attribute')->toArray());
        return $this->hasManyThrough(AttributeTranslation::class, SiteTranslation::class)
                ->groupBy('attribute_id')->select('attribute_id');
        // return $this->hasManyThrough(AttributeTranslation::class, SiteTranslation::class)->groupBy('attribute_id');
    }
    

}
