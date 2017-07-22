<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $fillable=[
        'name'
    ];
    
    public function translations()
    {
        return $this->hasMany(AttributeValueTranslation::class);
    }
}
