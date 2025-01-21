<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\comments;
use App\Models\config;
use App\Models\phoneList;
use App\Models\products;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class homePageController extends Controller
{
    public function index()
    {
        $config = config::all()[0];
        $hotProducts = products::where('available', true)->where('hot', true)->take(10)->get();
        $newProducts = products::where('available', true)->take(10)->get();
//        dd(count());

//        dd($config->presents);
        return view('front.home', compact('config', 'hotProducts', 'newProducts'));
    }

    public function sendComment(Request $request)
    {
//        dd($request->all());

        comments::create($request->all());
        return redirect()->route('index');

    }

    public function addPhone(Request $request)
    {
        $valRules = [
            'phone' => 'required',

        ];
        $valMassage = [
            'phone.required' => 'ورود تلفن الزامیست',

        ];


        $this->validate($request, $valRules, $valMassage);
        phoneList::create($request->all());
        return redirect()->route('index');
    }


    public function search(Request $request)
    {
        $catId = isset($request->categories) ? $request->categories : -1;
        if ($catId != -1) {
            $products = category::find($catId)->Products();
        } else {
            $products = products::where('id', '>', 0);
        }

        if ($request->inq != null)
            $products = products::where('name', 'like', "%" . $request->inq . "%");


        $products = $products->get();

        $search = true;
        return view('front.shop.index', compact('products', 'search'));
    }
}
