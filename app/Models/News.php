<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "news";
    protected $fillable =[
        'id',
        'title',
        'slug',
        'description',
        'content',
        'post_image',
        'kind_of_news_id',
        'new_categories_id',
    ];
    
    public $timestamps = true;

    public function scopeOrderDesc ($query)
    {
        $query->orderBy('id', 'desc');
    }
    public function kind_of_new()
    {
        return $this->belongsTo(KindOfNews::class, 'kind_of_news_id', 'id');
    }
    public function new_categories()
    {
        return $this->belongsTo(NewsCategory::class, 'new_categories_id', 'id');
    }
}
