<?php

namespace App\Models;

use App\Casts\addressCast;
use App\Casts\ShamsiTOMiladiDateCast;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
      'user',
      'status',
      'paymentStatus',
      'cancelReason',
      'comment',
      'address',
      'postRefCode',
      'sendIn',
      'totalPrice',
      'cancelBy',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
    public function products(){
        return $this->belongsToMany(products::class, 'order_products', 'order_id', 'product_id');
    }
    protected $casts = [
       'sendIn'=>ShamsiTOMiladiDateCast::class,
        'address'=>addressCast::class,

    ] ;
}
