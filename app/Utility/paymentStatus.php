<?php

namespace App\Utility;

class paymentStatus
{
    public $faStatus;
    public $enStatus;

    private $list=[
        'pay'=>'پرداخت شده',
        'waiting'=>'در انتظار پرداخت'

    ];
    public function __construct($enStatus){
        $this->enStatus=$enStatus;
        $this->faStatus=$this->list[$this->enStatus];
    }
}
