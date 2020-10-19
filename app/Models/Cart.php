<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'status',
    ];

    public function scopeGetOne ($query, $user)
    {
        return $query->where([['user_id', $user], ['status', 1]])->first();
    }

    public function user ()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cartDetails ()
    {
    	return $this->hasMany(CartDetai::class, 'cart_id', 'id');
    }
}
