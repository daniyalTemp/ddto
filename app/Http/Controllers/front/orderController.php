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
        $selectProduct = order_product::where('order_id', $order->id)->where('product_id' , $productId)->where('hashed' , $this->getHashedAttribute($product->id ,$request->color, $request->size, $request->material))->get();
        if(count($selectProduct) > 0){
            $selectProduct = $selectProduct[0];
            $selectProduct->update([
                'count'=> $selectProduct->count+1,
                'finalPrice'=> $selectProduct->finalPrice+$product->getSelectedPrice($request->color, $request->size, $request->material),
                ]);
            $selectProduct->save();
//            dd($selectProduct);
        }else{
            $order->products()->attach($productId, ['color' => $request->color, 'size' => $request->size, 'material' => $request->material , 'finalPrice'=>$product->getSelectedPrice($request->color, $request->size, $request->material) ,'hashed'=>$this->getHashedAttribute($product->id ,$request->color, $request->size, $request->material)]);
        }
//        if(in_array($productId , $ids)){
//       $keys = array_keys([$productId]);
//            dd($keys);
//        }
        $order->save();

        return redirect()->back()->cookie('ddtoOrderId', $order->id);
    }

    private function getHashedAttribute($productId ,$requestColor, $requestSize, $requestMaterial)
    {
//        dd(json_decode($requestColor));
        return md5(json_encode([$productId ,json_decode($requestColor)->name,json_decode($requestColor)->status, json_decode($requestSize)->name,json_decode($requestSize)->status, json_decode($requestMaterial)->name, json_decode($requestMaterial)->status]));

    }

    public function removeCard(Request $request, int $productId, int $orderId)
    {
//
//        dd(json_decode($request->color));
//        dd($orderId);
        $order=orders::find($orderId);
        $product=products::find($productId);


//        dd($order->products->contains($productId));
        if ($order->products->contains($productId)){
            $tempProducts = order_product::where('order_id', $order->id)
                ->where('product_id' , $productId)
                ->where('hashed' , $this->getHashedAttribute($product->id ,$request->color, $request->size, $request->material))
                ->get()->first();
            if ($tempProducts != null){
                if ($tempProducts->count > 1){
                    $tempProducts->count--;
                    $tempProducts->save();
                }else{
                    $tempProducts->delete();
                }

            }

        }
//        dd(count($order->Products()->get()));

        if (count($order->Products()->get())==0)
        {
            $order->update([
                'status' => 'cancel',
                'cancelReason' => 'سیستمی - خالی شدن سبد'
            ]);
            Cookie::expire('ddtoOrderId');
        }
        return redirect()->back();
    }
}
