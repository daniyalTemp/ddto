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
//        dd($config->bannerUP);
        return view('dashboard.config.form' , compact('config'));

    }

    public function saveConfig(Request $request)
    {
//        dd($request->all());
        $config = config::all()[0];
        $config->bannerUP = $request->bannerUP? $request->bannerUP: $config->bannerUP;
        $config->phone = $request->phone ? $request->phone:$config->phone;
        $config->address = $request->address ? $request->address:$config->address;
        $config->instagram= $request->instagram ?$request->instagram : $config->instagram;
        $config->telegram= $request->telegram ? $request->telegram : $config->telegram;
        $config->save();
        return redirect()->route('dashboard.index');

    }

    public function saveService(Request $request)
    {
        $config = config::all()[0];
//        dd($request->all());
//        dd($config->pre`sents[1]['name']);
$presents = $config->presents;
        $presents[$request->key]['name'] = $request->serviceName ?$request->serviceName :$config->presents[$request->key]['name'];
        $presents[$request->key]['des'] = $request->serviceDes ?$request->serviceDes :$config->presents[$request->key]['des'];
//        dd($request->all());
        $config->presents = $presents;
        $config->save();
        return redirect()->route('dashboard.config')->with(['msg'=>'عملیات با موفیت انجام شد']);

    }
}
