<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable=[
        'name',
        'code',
        'locale',
        'enabled',
        'default',
        'sort_order'
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'desc')->get();
    }

}
