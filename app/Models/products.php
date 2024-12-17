<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table='products';

    protected $fillable=[
        'name',
        'BasePrice',
        'discount',
        'available',
        'description',
        'color',
        'size',
        'material',
        'image',
        'weight',
    ];
    protected $casts=[
        'color'=>'array',
        'size'=>'array',
        'material'=>'array',
    ];
   public function Category(){
       return $this->belongsToMany(category::class , 'category_products_pivot' , 'product_id','category_id');
   }
}
