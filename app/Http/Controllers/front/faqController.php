<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('front.faq.index', compact('faqs'));
    }
}
