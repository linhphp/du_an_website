<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCategory extends Model
{
    use HasFactory;
    protected $table = "news_categories";
    protected $fillable = ['id','name'];

    public function Kind_of_new()
    {
        return $this->hasMany('App\KindOfNew','news_categories_id');
    } 
}
