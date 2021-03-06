<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function hostDetails() 
    {
        return $this->hasMany(HostDetail::class);
    }

    public function provinceAirports() 
    {
        return $this->hasMany(ProvinceAirport::class, 'province_airport_id');
    }
}
