<?php

namespace App\Utility;

class paymentStatus
{
    public $faStatus;
    public $enStatus;

    private $list=[
        'payed'=>'پرداخت شده',
        'pay'=>'پرداخت شده',
        'failed'=>'پرداخت ناموفق',
        'pending'=>'در انتظار پرداخت',
        'waiting'=>'در انتظار پرداخت'

    ];
    public function __construct($enStatus){
        $this->enStatus=$enStatus;
        $this->faStatus=$this->list[$this->enStatus];
    }
}
