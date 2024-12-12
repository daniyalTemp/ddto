<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table='products';

    protected $fillable=[
        'name',
        'price',
        'discount',
        'count',
        'description',
        'availableColors',
        'availableSizes',
        'availableSizes',
        'material',
        'image',
    ];
}
