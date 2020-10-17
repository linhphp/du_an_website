<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'desc',
        'content',
        'discount',
        'accessories',
        'quantity',
    ];

    public function brand ()
    {
    	return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
     public function category ()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function emages ()
    {
    	return $this->hasMany(Emage::class, 'product_id' , 'id');
    }
}
