<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'name',
        'phone',
        'msg',
        'type',
        'showInWebsite',
        'seen',
        'adminNote',
   ];

}
