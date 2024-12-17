<?php

namespace App\Utility;

class ProductAttribute
{

    public $name;
    public $addPrice;
    public $status;
    public $color;
    static public $icons=[
        'addition'=>'fa fa-plus',
        'ratio'=>'fa fa-close',
        'percentage'=>'la la-percentage',
        ];

    /**
     * @param $name
     * @param $addPrice
     * @param $status
     */
    public function __construct($name, $addPrice, $status , $color='-')
    {
        $this->name = $name;
        $this->addPrice = $addPrice;
        $this->status = $status;
        $this->color = $color;
    }


}
