<?php

namespace App\Utility;

class paymentStatus
{
    public $faStatus;
    public $enStatus;
    public $panelColor;
    public $percentStatus;

    private $list=[
        'payed'=>'پرداخت شده',
        'pay'=>'پرداخت شده',
        'failed'=>'پرداخت ناموفق',
        'pending'=>'در انتظار پرداخت',
        'waiting'=>'در انتظار پرداخت'

    ];

    private $panelColorList=[
        'pending'=>'warning',
        'waiting'=>'warning',
        'payed'=>'success',
        'pay'=>'success',
        'failed'=>'danger',
    ];
    private $percentList=[
        'pending'=>50,
        'waiting'=>50,
        'payed'=>100,
        'pay'=>100,
        'failed'=>100,
    ];
    public function __construct($enStatus){
        $this->enStatus=$enStatus;
        $this->faStatus=$this->list[$this->enStatus];
        $this->panelColor=$this->panelColorList[$this->enStatus];
        $this->percentStatus=$this->percentList[$this->enStatus];
    }
}
