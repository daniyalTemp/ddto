<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table='category';
    protected $fillable=['name'];

    public function Products()
    {
        return $this->belongsToMany(products::class,'category_products_pivot','category_id','product_id');
    }
}
