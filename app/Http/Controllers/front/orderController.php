<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\order_product;
use App\Models\orders;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class orderController extends Controller
{
    public function addToChard(Request $request, int $productId, int $orderId)
    {
//        $color , $size , $material,
        $product = products::find($productId);

        if (!$product) {
            abort(404);
        }
//        dd(jso);
        if ($orderId == -1) {// create an order
            $order = orders::create([
                'total_price' => 0,
            ]);
        } else {
            $order = orders::find($orderId);
        }


//        dd($request->color);
        $order->totalPrice += $product->getSelectedPrice($request->color, $request->size, $request->material);
//        $ids=$order->Products()->withPivot(['hashed'])->get();
        $selectProduct = order_product::where('order_id', $order->id)->where('product_id' , $productId)->where('hashed' , md5(json_encode([$product->id ,$request->color, $request->size, $request->material])))->get();
        if(count($selectProduct) > 0){
            $selectProduct = $selectProduct[0];
            $selectProduct->update([
                'count'=> $selectProduct->count+1,
                'finalPrice'=> $selectProduct->finalPrice+$product->getSelectedPrice($request->color, $request->size, $request->material),
                ]);
            $selectProduct->save();
//            dd($selectProduct);
        }else{
            $order->products()->attach($productId, ['color' => $request->color, 'size' => $request->size, 'material' => $request->material , 'finalPrice'=>$product->getSelectedPrice($request->color, $request->size, $request->material) ,'hashed'=>md5(json_encode([$product->id ,$request->color, $request->size, $request->material]))]);
        }
//        if(in_array($productId , $ids)){
//       $keys = array_keys([$productId]);
//            dd($keys);
//        }
        $order->save();

        return redirect()->back()->cookie('ddtoOrderId', $order->id);
    }
}
