<?php

namespace App\Utility;

class orderStatus
{
    public $faStatus;
    public $enStatus;
    public $colorStatus;

    private $list=[
        'initial'=>'ثبت اولیه',
        'getData'=>'در انتظار تکمیل اطلاعات و پرداخت',
        'waiting'=>'در انتظار تایید',
        'printing'=>'در حال آماده سازی',
        'delivered'=>'تحویل پست',
        'cancel'=>'لغو شده',

    ];
    private $colorList=[
        'initial'=>'dark',
        'getData'=>'dark',
        'waiting'=>'secondary',
        'printing'=>'dark-light',
        'delivered'=>'primary',
        'cancel'=>'tertiary',
    ];
    public function __construct($enStatus){
        $this->enStatus=$enStatus;
        $this->faStatus=$this->list[$this->enStatus];
        $this->colorStatus=$this->colorList[$this->enStatus];


//        var_dump($this);
//        exit();
    }


}
