<?php

namespace App\Utility;

class orderStatus
{
    public $faStatus;
    public $enStatus;

    private $list=[
        'initial'=>'ثبت اولیه',
        'getData'=>'در انتظار تکمیل اطلاعات و پرداخت',
        'waiting'=>'در انتظار تایید',
        'printing'=>'در حال اماده سازی',
        'delivered'=>'تحویل پست',
        'cancel'=>'لغو شده',

    ];
    public function __construct($enStatus){
        $this->enStatus=$enStatus;
        $this->faStatus=$this->list[$this->enStatus];

//        var_dump($this);
//        exit();
    }


}
