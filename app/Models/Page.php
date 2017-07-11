<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }
    
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
