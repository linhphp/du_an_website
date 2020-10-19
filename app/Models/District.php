<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    
    public $timestamps = false;

    protected $fillable = [
        'district_code',
        'province_code',
        'name',
        'type',
    ];

    public function scopeGetDistrict ($query, $districtCode)
    {
        return $query->where('district_code' , $districtCode)->first();
    }

    public function province ()
    {
        return $this->belongsTo(Province::class, 'province_code', 'province_code');
    }

    public function wards ()
    {
        return $this->hasMany(Ward::class, 'district_code', 'district_code');
    }
}
