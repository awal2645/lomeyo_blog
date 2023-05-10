<?php

namespace App\Models;

use Faker\Core\Blood;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'header_title',
        'header_img',
        'read_time',
        'category_id',
        'user_name',
        'blog_title',
        'blog_article',
        'post_slug',
        'featured',
        'status',
        'description'
        
    ];
    protected $dates = [
        'published_at',
        
    ];
    
    public function category(){
        
        return $this->belongsTo(BlogCategory::class, 'category_id' );
    }

    public function tag()
    {
        return $this->belongsToMany(BlogTag::class, 'post_tags', 'post_id', 'tag_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id','id')->whereNull('parent_id');
    }
}