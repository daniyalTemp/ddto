<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\config;
use Illuminate\Http\Request;

class configController extends Controller
{
    public function showConfig()
    {
        $config = config::all()[0];
        return view('dashboard.config.form' , compact('config'));

    }
}
