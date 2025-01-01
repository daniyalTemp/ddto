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
        $hotProducts = products::where('available' , true)->where('hot' , true)->take(10)->get();
        $newProducts = products::where('available' , true)->take(10)->get();
//        dd(count());

//        dd($config->presents);
        return view('front.home', compact('config' , 'hotProducts','newProducts'));
    }
}
