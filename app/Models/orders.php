<?php

namespace App\Models;

use App\Casts\addressCast;
use App\Casts\orderStatusCast;
use App\Casts\paymentStatusCast;
use App\Casts\ShamsiTOMiladiDateCast;
use App\Utility\paymentStatus;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    public function user()
    {
//        dd($this);
        return $this->belongsTo(User::class, 'user', 'id');
    }
    protected $fillable = [
        'user',
        'status',
        'paymentStatus',
        'cancelReason',
        'comment',
        'address',
        'postalCode',
        'postRefCode',
        'sendIn',
        'totalPrice',
        'cancelBy',
    ];
    public function products(){
        return $this->belongsToMany(products::class, 'order_products', 'order_id', 'product_id');
    }
    public function payment(){
        return $this->hasMany(payments::class , 'order');
    }
    protected $casts = [
       'sendIn'=>ShamsiTOMiladiDateCast::class,
        'address'=>addressCast::class,
        'status'=>orderStatusCast::class,
        'paymentStatus'=>paymentStatusCast::class,
    ] ;
}
