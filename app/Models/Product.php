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
        'brand_id',
        'category_id',
        'name',
        'price',
        'image',
        'desc',
        'content',
        'discount',
        'accessories',
        'quantity',
    ];

    public function scopeOrderDesc ($query)
    {
        $query->orderBy('id', 'desc');
    }

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
