<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $fillable=[
        'site_translation_id',
        'title',
        'url',
        'seo_title',
        'seo_ketwords',
        'seo_description',
        'content',
        'is_enabled'
    ];
    
    public function siteTranslation()
    {
        return $this->belongsTo(SiteTranslation::class);
    }
}
