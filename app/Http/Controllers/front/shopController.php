<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\orders;
use App\Models\products;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index()
    {
        $cats = Category::all();
        $products = products::all();
//        dd($cats[0]->Products()->get());
        return view('front.shop.index', compact('cats' , 'products'));

    }
    public function product(int $id){
        $product=products::find($id);


//        dd(orders::find(4)->products()->withPivot(['size','color','material'])->first()->getOriginal('pivot_material') );

        return view('front.shop.product', compact('product'));
    }

    public function indexCatedory( Request $request , int $catId)
    {
        $selectedCategory = category::find($catId);
        $cats = Category::all();
        $products= $selectedCategory->Products()->get();
        return view('front.shop.index', compact('products' , 'cats' , 'selectedCategory'));

    }
}
