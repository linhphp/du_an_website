<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_details';

    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
        'status',
    ];

    public function scopeAll ($query, $id)
    {
        return $query->where([['cart_details.cart_id', $id], ['cart_details.status', null]])->get();
    }

    public function cart ()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }
    public function product ()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
}
