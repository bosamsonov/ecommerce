<?php

namespace App\Models\Crewing;

use Illuminate\Database\Eloquent\Model;

class SeaService extends Model
{
    protected $fillable = [
            'company',
            'rank',
            'vessel',
            'type',
            'dwt',
            'grt',
            'me',
            'kw',
            'bhp',
            'flag',
            'from',
            'to',
            'owner'
        ];
}
