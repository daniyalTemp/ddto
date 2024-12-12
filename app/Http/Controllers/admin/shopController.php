<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Serializer;

class shopController extends Controller
{

    public function categoryList(Request $request)
    {
        $cats = category::all();
        return view('dashboard.shop.category.list', compact('cats'));

    }

    public function categoryAdd(Request $request)
    {
        return view('dashboard.shop.category.form');

    }

    public function categoryEdit(Request $request, int $id)
    {
        $category = category::find($id);
        return view('dashboard.shop.category.form', compact('category'));

    }

    public function categorySave(Request $request, int $id)
    {
        $this->validate($request, ['name' => 'required'], ['name.required' => "ورود نام الزامی است "]);

        if ($id == -1) {
            category::create([
                'name' => $request->name
            ]);
        } else {
            $cat = category::find($id);
            $cat->name = $request->name;
            $cat->save();

        }

        return redirect()->route('dashboard.shop.category.list');
    }

    public function categoryDel(Request $request, int $id)
    {
        category::destroy([$id]);
        return redirect()->route('dashboard.shop.category.list');

    }


    //shop

    public function productLsit(Request $request)
    {
        return view('dashboard.shop.list');
    }

    public function productAdd(Request $request)
    {
        return view('dashboard.shop.form');
    }

    public function productSave(Request $request, int $id)
    {
//        dd($request->all());
        $valRules = [
            'name' => 'required',
            'image' => 'required|image',
        ];
        $valMassage = [
            'name.required' => 'ورود نام الزامیست',
            'image.required' => 'ارسال عکس الزامی است',
            'image.image' => 'عکس ارسالی معتبر نیست',
        ];

        if ($request->get('price') != null) {
            $valMassage = ['price.numeric' => 'قیمت وارد شده صحیح نیست',
            ];
            $valRules = ['price' => 'numeric',
            ];

        }
        if ($request->get('count') != null) {
            $valMassage = ['count.numeric' => 'موجودی وارد شده صحیح نیست',
            ];
            $valRules = ['count' => 'numeric',
            ];

        }
        if ($request->get('discount') != null) {
            $valMassage = ['discount.digits_between' => 'درصد تخفیف صحیح نیست',
            ];
            $valRules = ['discount' => 'digits_between:0,100',
            ];

        }
        $this->validate($request, $valRules, $valMassage);


    }


}
