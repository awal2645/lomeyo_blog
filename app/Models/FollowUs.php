<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'follow_name',
        'follow_slug',
        
        
    ];
}