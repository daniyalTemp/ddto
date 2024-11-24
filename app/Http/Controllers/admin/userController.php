<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function index()
    {

    }
    public function create(){

    }
    public function store(Request $request){}
    public function show($id){}
    public function edit($id){}

    public function login(Request $request)
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {

    }
}
