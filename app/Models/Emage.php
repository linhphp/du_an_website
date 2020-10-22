<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emage extends Model
{
    use HasFactory;

    protected $table = 'emages';

    protected $fillable = [
    	'product_id',
        'emagery',
    ];

    public function product ()
    {
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
