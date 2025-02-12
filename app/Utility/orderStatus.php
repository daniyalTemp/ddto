<?php

namespace App\Utility;

class orderStatus
{
    public $faStatus;
    public $enStatus;
    public $colorStatus;
    public $panelColor;
    public $percentStatus;
public $nextSep;
    private $list=[
        'initial'=>'ثبت اولیه',
        'getData'=>'در انتظار تکمیل اطلاعات و پرداخت',
        'waiting'=>'در انتظار تایید',
        'printing'=>'در حال آماده سازی',
        'delivered'=>'تحویل پست',
        'cancel'=>'لغو شده',

    ];
    private $colorList=[
        'initial'=>'gray',
        'getData'=>'gray',
        'waiting'=>'secondary',
        'printing'=>'dark-light',
        'delivered'=>'primary',
        'cancel'=>'tertiary',
    ];
     private $panelColorList=[
        'initial'=>'dark',
        'getData'=>'dark',
        'waiting'=>'warning',
        'printing'=>'primary',
        'delivered'=>'success',
        'cancel'=>'danger',
    ];
     private $percentList=[
        'initial'=>0,
        'getData'=>10,
        'waiting'=>50,
        'printing'=>85,
        'delivered'=>100,
        'cancel'=>100,
    ];
     private $nextStepList=[
        'initial'=>'getData',
        'getData'=> 'waiting',
        'waiting'=>'printing',
        'printing'=> 'delivered',
        'delivered'=>'delivered',
        'cancel'=>'cancel',
    ];

    public function __construct($enStatus){
        $this->enStatus=$enStatus;
        $this->faStatus=$this->list[$this->enStatus];
        $this->colorStatus=$this->colorList[$this->enStatus];
        $this->panelColor=$this->panelColorList[$this->enStatus];
        $this->percentStatus=$this->percentList[$this->enStatus];
        $this->nextSep=$this->nextStepList[$this->enStatus];


//        var_dump($this);
//        exit();
    }


}
