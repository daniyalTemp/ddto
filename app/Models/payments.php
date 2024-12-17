<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $table = 'payments';
    protected $fillable = ['id',
        'order',
        'amount',
        'customData',
        'card_holder',
        'trans_id',
        'shaparak_ID',
        'status',
    ];


}
