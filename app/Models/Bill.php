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

    public function scopeJoinCustomer ($query)
    {
        return $query->join('customers', 'customers.id', '=', 'bills.customer_id')
            ->join('status', 'status.id', '=', 'bills.status_id')
            ->select('status.name as status_name', 'customers.name', 'customers.email', 'customers.phone', 'customers.address', 'bills.*');
    }

    public function billDetails ()
    {
    	return $this->hasMany(BillDetail::class, 'bill_id', 'id');
    }
}
