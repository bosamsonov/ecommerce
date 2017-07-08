<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable=[
        'name'
    ];
    
    public function translations()
    {
        return $this->hasMany(SiteTranslation::class)->orderBy('sort_order', 'desc');
    }
}
