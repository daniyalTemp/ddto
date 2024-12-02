<?php

namespace App\Casts;

use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class ShamsiTOMiladiDateCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {

        return  Verta::createJalaliDate(substr($value ,0,4 ) , substr($value ,5,2 ) ,substr($value ,8,2 ))->toCarbon();
//        return $value;
    }
}
