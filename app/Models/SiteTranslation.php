<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteTranslation extends Model
{
    protected $fillable=[
        'site_id',
        'language_name',
        'language_code',
        'language_type',
        'type',
        'host',
        'is_default',
        'sort_order',
        'is_enabled'
    ];
    
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
