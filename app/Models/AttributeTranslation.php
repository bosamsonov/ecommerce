<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{
    protected $fillable=[
        'site_translation_id',
        'name'
    ];
    
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    
    public function siteTranslation()
    {
        return $this->belongsTo(SiteTranslation::class);
    }
    
}
