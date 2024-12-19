<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\config;
use App\Models\products;
use Illuminate\Http\Request;

class homePageController extends Controller
{
    public function index()
    {
        $config = config::all()[0];
        $hotProducts = products::all()->take(10);
        $newProducts = products::all()->take(10);
//        dd($hotProducts);
//        dd($config->presents);
        return view('front.home', compact('config' , 'hotProducts','newProducts'));
    }
}
