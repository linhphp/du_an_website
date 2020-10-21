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

    public function bills ()
    {
    	return $this->hasMany(Bill::class, 'bill_id', 'id');
    }
}
