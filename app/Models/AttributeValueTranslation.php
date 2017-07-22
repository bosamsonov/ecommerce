<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValueTranslation extends Model
{
    protected $fillable=[
        'site_translation_id',
        'name'
    ];
    
}
