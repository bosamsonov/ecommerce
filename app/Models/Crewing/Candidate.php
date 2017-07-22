<?php

namespace App\Models\Crewing;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
            'surname',
            'first_name',
            'middle_name',
            'rank',

            
            'phone_cell',
            'phone_home',
            'email',
            'skype',
            
            'country',
            'city',
            'address',
            
            'marital_status',
            
            'dob',
            
            'nationality',
            
            'children',
            
            'birth_place',
            
            'nearest_airport',
            
            'height',
            'weight',
            'shoes_size',
            'eyes',
            'hair',
            
            'passport_no',
            'passport_issued',
            'passport_expiry',
            'passport_place',
            
            'seamensbook_no',
            'seamensbook_issued',
            'seamensbook_expiry',
            'seamensbook_place',
    ];
    
    public function education() {
        return $this->hasMany(Education::class);
    }
    
    public function sea_service() {
        return $this->hasMany(SeaService::class);
    }
    
    public function certificate() {
        return $this->hasMany(Certificate::class);
    }
    
}
