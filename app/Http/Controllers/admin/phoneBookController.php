<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\phoneList;
use Illuminate\Http\Request;

class phoneBookController extends Controller
{
    public function index()
    {
        $phones = phoneList::all();
        return view('dashboard.phoneBook.list' , compact('phones'));

    }
}
