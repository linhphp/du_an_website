<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    public $timestamps = false;

    protected $fillable = [
        'province_code',
        'name',
        'type',
    ];
    
    protected $primaryKey = 'province_code';

    public function scopeGetCity ($query, $provinceCode)
    {
        return $query->where('province_code' , $provinceCode)->first();
    }

    public function district ()
    {
        return $this->hasMany(District::class, 'province_code', 'province_code');
    }
}
