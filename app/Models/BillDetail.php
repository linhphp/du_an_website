<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    protected $table = 'bill_details';

    protected $fillable = [
        'bill_id',
        'product_id',
        'price',
        'qty',
    ];

    public function scopeJoinProduct ($query)
    {
        return $query->join('products', 'products.id', '=', 'bill_details.product_id')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->select('bill_details.*', 'products.name','products.image1', 'bills.total_price', 'bills.status_id');
    }

    public function bills ()
    {
    	return $this->hasMany(Bill::class, 'bill_id', 'id');
    }
}
