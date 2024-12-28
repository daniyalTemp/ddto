<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    Protected $table = "order_products";
    protected $fillable = [
        'order_id',
        'product_id',
        'count',
        'finalPrice',
        'color',
        'size',
        'material',
        'hash',
    ];

//    public function setHashAttribute($value=-1)
//    {
//        $this->attributes['hash'] = md5([$this->product_id.'-'.$this->color.'-'.$this->size.'-'.$this->material]);
//
//    }
    protected $casts=[
        'color'=>'array',
        'size'=>'array',
        'material'=>'array',
    ];
}
