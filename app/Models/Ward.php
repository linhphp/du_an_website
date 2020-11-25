<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';

    public $timestamps = false;

    protected $fillable = [
    	'ward_code',
    	'district_code',
    	'name',
    	'type',
    ];

    protected $primaryKey = 'ward_code';

    public function scopeGetWard ($query, $wardCode)
    {
        return $query->where('ward_code' , $wardCode)->first();
    }

    public function districts ()
    {
        $this->belongsTo(District::class, 'district_code', 'district_code');
    }
}
