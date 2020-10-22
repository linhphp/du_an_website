<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'product_id',
        'parent_id',
        'content',
    ];

    public function user ()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product ()
    {
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function childen ()
    {
    	return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
}
