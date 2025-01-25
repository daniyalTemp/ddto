<?php

namespace App\Utility;

class paymentResult
{
    public $msg;
    public $code;


    public function __construct($code, $msg){
        $this->msg=$msg;
        $this->code=$code;
    }
}
