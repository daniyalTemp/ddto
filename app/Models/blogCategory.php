<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogCategory extends Model
{
    protected $table = 'blog_category';
    protected $fillable = ['name'];

    public function Blog()
    {
        return $this->belongsToMany('App\Models\blog','blog_category_pivot','category_id','blog_id');
    }
}
