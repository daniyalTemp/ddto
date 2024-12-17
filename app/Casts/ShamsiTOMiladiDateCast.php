<?php

namespace App\Casts;

use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use function PHPUnit\Framework\isNull;

class ShamsiTOMiladiDateCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value==null)
            return $value;
        return (\verta(new \DateTime($value))->format('Y/m/d'));
//        dd(Verta::);
//        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value==null)
            return $value;
        return  Verta::createJalaliDate(substr($value ,0,4 ) , substr($value ,5,2 ) ,substr($value ,8,2 ))->toCarbon();
//        return $value;
    }
}
