<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = [
        'customer_id',
        'note',
        'status',
        'payment',
        'total_price',
    ];

    public function customer ()
    {
    	return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function billDetails ()
    {
    	return $this->hasMany(BillDetail::class, 'bill_id', 'id');
    }
}
