<?php

namespace App\Models;

use App\Casts\paymentResultCast;
use App\Casts\paymentStatusCast;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $table = 'payments';
    protected $fillable = ['id',
        'order',
        'amount',
        'customData',
        'card_holder',
        'user',
        'order',
        'refCode',
        'cardHash',
        'result',//class
        'status',
        'authority',
    ];

    public function order()
    {
        return $this->belongsTo(orders::class,'order');
    }
    protected $casts=[
        'result'=>paymentResultCast::class,
        'status'=>paymentStatusCast::class
    ];



}
