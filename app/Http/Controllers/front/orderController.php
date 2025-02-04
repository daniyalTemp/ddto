<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\order_product;
use App\Models\orders;
use App\Models\payments;
use App\Models\products;
use App\Utility\paymentHelper;
use App\Utility\PdfGenerator;
use misterspelik\LaravelPdf\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use function Symfony\Component\Translation\t;

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
        $selectProduct = order_product::where('order_id', $order->id)->where('product_id', $productId)->where('hashed', $this->getHashedAttribute($product->id, $request->color, $request->size, $request->material))->get();
        if (count($selectProduct) > 0) {
            $selectProduct = $selectProduct[0];
            $selectProduct->update([
                'count' => $selectProduct->count + 1,
                'finalPrice' => $selectProduct->finalPrice + $product->getSelectedPrice($request->color, $request->size, $request->material),
            ]);
            $selectProduct->save();
//            dd($selectProduct);
        } else {
            $order->products()->attach($productId, ['color' => $request->color, 'size' => $request->size, 'material' => $request->material, 'finalPrice' => $product->getSelectedPrice($request->color, $request->size, $request->material), 'hashed' => $this->getHashedAttribute($product->id, $request->color, $request->size, $request->material)]);
        }
        if (Auth::check())
//            if (count($order->user()))
            $order->user = Auth::user()->id;

//        if(in_array($productId , $ids)){
//       $keys = array_keys([$productId]);
//            dd($keys);
//        }
        $order->save();

        return redirect()->back()->cookie('ddtoOrderId', $order->id);
    }

    private function getHashedAttribute($productId, $requestColor, $requestSize, $requestMaterial)
    {
//        dd(json_decode($requestColor));
        return md5(json_encode([$productId, json_decode($requestColor)->name, json_decode($requestColor)->status, json_decode($requestSize)->name, json_decode($requestSize)->status, json_decode($requestMaterial)->name, json_decode($requestMaterial)->status]));

    }

    public function removeCard(Request $request, int $productId, int $orderId)
    {
//
//        dd(json_decode($request->color));
//        dd($orderId);
        $order = orders::find($orderId);
//        dd($order);
        $product = products::find($productId);


//        dd($order->products->contains($productId));
        if ($order->products->contains($productId)) {
            $tempProducts = order_product::where('order_id', $order->id)
                ->where('product_id', $productId)
                ->where('hashed', $this->getHashedAttribute($product->id, $request->color, $request->size, $request->material))
                ->get()->first();
//            dd($tempProducts->color);
//            dd($tempProducts);
            if ($tempProducts != null) {
                if ($tempProducts->count > 1) {
                    $tempProducts->finalPrice -=($product->getSelectedPrice($tempProducts->color, $tempProducts->size,$tempProducts->material));
                    $order->totalPrice -=($product->getSelectedPrice($tempProducts->color, $tempProducts->size,$tempProducts->material));
                    $tempProducts->count--;
                    $tempProducts->save();
                    $order->save();
                } else {
                    $tempProducts->delete();
                }

            }

        }
//        dd(count($order->Products()->get()));

        if (count($order->Products()->get()) == 0) {
            $order->delete();
            Cookie::expire('ddtoOrderId');
        }

        return redirect()->back();
    }

    public function userOrders(Request $request, $status = -1)
    {

//        dd(str_contains(url()->full(),));
        $user = Auth::user();
        if ($status == -1)
            $orders = $user->Orders()
                ->where('status', 'getData')
                ->orWhere('status', 'waiting')
                ->orWhere('status', 'printing')
                ->get();
        else
            $orders = $user->Orders()->where('status', $status)->get();

//        dd($orders);
        $statistics = [
            'getData' => $user->Orders()->where('status', 'getData')->count(),
            'waiting' => $user->Orders()->where('status', 'waiting')->count(),
            'printing' => $user->Orders()->where('status', 'printing')->count(),
            'delivered' => $user->Orders()->where('status', 'delivered')->count(),
            'cancel' => $user->Orders()->where('status', 'cancel')->count(),
        ];

//        dd($statistics);
        return view('front.user.orderList', compact('user', 'orders', 'statistics'));

    }

    public function userOrder(Request $request, int $id)
    {
        $order = orders::find($id);
        if ($order->user != Auth::user()->id)
            abort(403);

        $payment = $order->payment()->get()->last();
//        dd($order->Products()->withPivot(['size', 'color', 'material', 'count', 'finalPrice'])->get()[0]->getOriginal('pivot_size'));
        return view('front.shop.orders.order', compact('order' , 'payment'));
    }

    public function checkOut(Request $request, int $id)
    {


        $order = orders::find($id);


//dd(Cookie::get('ddtoOrderId'));
        if ($order == null) {
            $order = orders::find(Cookie::get('ddtoOrderId'));
        }
//        dd($order);
        //        dd( json_decode($order->Products()->withPivot(['size', 'color', 'material', 'count', 'finalPrice'])->get()[0]->pivot->finalPrice));
        return view('front.shop.orders.checkout', compact('order'));
    }

    public function completeOrder(Request $request, int $orderId)
    {
//        dd($request->all());
        $valRules = [
            'name' => 'required',
            'address' => 'required',
            'NationalCode' => 'required|numeric',
            'phone' => 'required|digits:11',
            'postalCode' => 'required|numeric',
        ];
        $valMassage = [
            'name.required' => 'ورود نام الزامیست',
            'NationalCode.required' => 'ورود کد ملی الزامیست',
            'NationalCode.numeric' => 'کدملی  وارد شده معتبر نیست',
            'postalCode.required' => 'ورود کد پستی الزامیست',
            'postalCode.numeric' => 'کد پستی  وارد شده معتبر نیست',
            'phone.required' => 'ورود تلفن الزامیست',
            'address.required' => 'ورود آدرس الزامیست',
            'phone.digits' => 'تلفن  وارد شده معتبر نیست',

        ];
        $this->validate($request, $valRules, $valMassage);

        $order = orders::find($orderId);
        $order->update([

            'status' => 'getData',
            'comment' => $request->comment,
            'address' => $request->address,
            'postalCode' => $request->postalCode,
            'sendIn' => $request->sendIn,


        ]);

        return redirect()->route('shop.order.payment', $orderId);

    }

    public function payment(Request $request, int $orderId)
    {
        $order = orders::find($orderId);
        $payment =payments::create([
            'order'=>$order->id,
            'user'=>$order->user()->get()->first()->id,
            'amount'=>$order->totalPrice,
        ]);
//        dd($payment->order()->get()->first());
        return paymentHelper::pay($payment);
    }

    public function receipt(Request $request, int $id)
    {
        $order=orders::find($id);

//        return view('front.shop.orders.receipt', compact('order'));
        $data = [
            'order'=>$order,
        ];
        $pdf = PdfGenerator::loadView ('front.shop.orders.receipt' ,$data);

        return $pdf->download('DDTO.shop-receipt-'.$order->id.'.pdf');

    }
}
