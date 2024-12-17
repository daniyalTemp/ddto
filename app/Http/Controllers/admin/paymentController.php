<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\payments;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function index(Request $request)
    {
        $payments = payments::all();
        return view('dashboard.payment.list', compact('payments'));

    }

    public function create(Request $request)
    {
        return view('dashboard.payment.form');
    }
}
