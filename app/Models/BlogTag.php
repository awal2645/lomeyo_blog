<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag_name',
        'tag_slug',
        'tag_des'
        
    ];
    public function post()
    {
        return $this->belongsToMany(BlogPost::class, 'post_tags', 'tag_id','post_id');
    }
   
}