<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\comments;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {

       
        return view('dashboard.index');
    }

}
