<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\products;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class orderController extends Controller
{
    public function index(){
        $orders = orders::all();
        return view('dashboard.shop.order.list', compact('orders'));
    }
    public function create(){
        $products = products::where('available' , true)->get();
//        dd($products);
        return view('dashboard.shop.order.form' ,compact('products'));

    }
    public function store(Request $request){

    }
    public function show($id){
        $order= orders::find($id);
        return view('dashboard.shop.order.show' , compact('order'));

    }
    public function edit($id){

    }


}
