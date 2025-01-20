<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
//dd($faqs[0]->show);
        return view('dashboard.faq.list', compact('faqs'));
    }

    public function add(Request $request)
    {
        return view('dashboard.faq.form');
    }
    public function edit(Request $request , int $id)
    {
        $faq = FAQ::find($id);
        return view('dashboard.faq.form', compact('faq'));
    }

    public function save(Request $request, int $id)
    {
        $valRules = [
            'title' => 'required',

        ];
        $valMassage = [
            'title.required' => 'ورود عنوان الزامیست',

        ];


        $this->validate($request, $valRules, $valMassage);
        if ($id == -1) {
            FAQ::create([
                'title' => $request->title,
                'text' => $request->text,
                'show' => $request->has('show') ? true : false,
            ]);
        }
        else{
            $faq = FAQ::find($id);
            $faq->update([
                'title' => $request->title,
                'text' => $request->text,
                'show' => $request->has('show') ? true : false,
            ]);
        }
        return redirect()->route('dashboard.faq')->with(['msg' => 'عملیات با موفیت انجام شد']);;
    }

    public function del(Request $request, int $id)
    {
        FAQ::destroy($id);
        return redirect()->route('dashboard.faq')->with(['msg' => 'عملیات با موفیت انجام شد']);;

    }
}
