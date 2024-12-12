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

    public function saveConfig(Request $request)
    {
        $config = config::all()[0];
        $config->phone = $request->phone;
        $config->address = $request->address;
        $config->instagram= $request->instagram;
        $config->telegram= $request->telegram;
        $config->save();
        return redirect()->route('dashboard.index');



    }
}
