<?php

namespace App\Models\Crewing;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
                  'name',
            'graduation_date',
            'degree'
        ];
}
