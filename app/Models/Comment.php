<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_name',
        'product_id',
        'parent_id',
        'content',
    ];


    public function product ()
    {
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
