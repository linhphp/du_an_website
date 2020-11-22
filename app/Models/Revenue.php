<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $table = 'revenues';

    protected $fillable = [
        'product_id',
        'import_price',
        'export_price',
        'total_quantity',
        'sold_quantity',
        'the_remaining_quantity',
        'actual_revenue',
    ];
}
