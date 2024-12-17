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
        $products = products::all()->take(3);
//        dd($config->presents);
        return view('front.home', compact('config' , 'products'));
    }
}
