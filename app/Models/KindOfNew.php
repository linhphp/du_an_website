<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KindOfNew extends Model
{
    use HasFactory;
    protected $table = "kind_of_news";
    protected $fillable = ['id','name','new_categories_id'];
    
    public function New_category()
    {
        return $this->belongsTo('App\NewCateogry','new_categories_id','id');
    } 
    

    public function News()
    {
        return $this->hasMany('App\News','kind_of_news_id','id');
    }  
}
