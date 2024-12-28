<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\String\b;
use function Symfony\Component\String\s;

class products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'BasePrice',
        'discount',
        'available',
        'description',
        'color',
        'size',
        'material',
        'image',
        'weight',
    ];
    protected $casts = [
        'color' => 'array',
        'size' => 'array',
        'material' => 'array',
    ];

    public function Category()
    {
        return $this->belongsToMany(category::class, 'category_products_pivot', 'product_id', 'category_id');
    }

    public function getSelectedPrice($color, $size, $material)
    {

        if(!is_array($color)){
            $color = (array)json_decode($color);
            $size = (array)json_decode($size);
            $material = (array)json_decode($material);
        }
//        dd($size);


        $finalPrice = 0;

        switch ($color['status']) {
            case 'addition':
                $finalPrice += $color['addPrice'];
                break;
            case 'percentage':
                $finalPrice += $this->BasePrice / 100 * $color['addPrice'];
                break;
            case 'ratio':
                $finalPrice += $this->BasePrice * $color['addPrice'];
                break;
        }
        switch ($size['status']) {
            case 'addition':
                $finalPrice += $size['addPrice'];
                break;
            case 'percentage':
                $finalPrice += $this->BasePrice / 100 * $size['addPrice'];
                break;
            case 'ratio':
                $finalPrice += $this->BasePrice * $size['addPrice'];
                break;
        }

//        dd($material['addPrice']);
        switch ($material['status']) {
            case 'addition':
                $finalPrice += $material['addPrice'];

                break;
            case 'percentage':
                $finalPrice += $this->BasePrice / 100 * $material['addPrice'];
                break;
            case 'ratio':
                $finalPrice += $this->BasePrice * $material['addPrice'];
                break;
        }

        $finalPrice += $this->BasePrice;
        return $finalPrice;

    }
}
