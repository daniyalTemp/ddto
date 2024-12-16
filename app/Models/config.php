<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    protected $table='config';
    protected $fillable=[
        'phone',
        'address',
        'telegram',
        'instagram',
    ];
    protected $casts=[
      'presents'=>'array'
    ];
}
