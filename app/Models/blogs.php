<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
      'title',
      'text',
      'image',
      'seen',
      'show',
    ];

    public function Category()
    {
        return $this->belongsToMany(blogCategory::class,'blog_category_pivot','blog_id','category_id');
    }
}
