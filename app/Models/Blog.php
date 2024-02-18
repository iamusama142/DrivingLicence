<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'banner','title','slug','category_id','short_description','long_description','meta_title','meta_description','meta_image','meta_keywords'
    ];
    use HasFactory;
}
