<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'msg',
        'type',
        'showInWebsite',
        'seen',
        'adminNote',
   ];

}
