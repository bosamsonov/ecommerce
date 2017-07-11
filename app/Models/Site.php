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
    
}
