<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
    protected $fillable=[
        'name'
    ];
    
    public function attributes() 
    {
        return $this->belongsToMany(Attribute::class, 'attribute_set_attribute')->withTimestamps();
    }
}
