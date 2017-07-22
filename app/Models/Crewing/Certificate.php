<?php

namespace App\Models\Crewing;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
            'name',
            'number',
            'issued_date',
            'issued_place',
            'expiry_date'
        ];
}
