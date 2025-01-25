<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\payments;
use App\Utility\paymentHelper;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function callback(Request $request)
    {

        $paymentResult = $request->all();

//        dd($paymentResult);

        $payment = payments::where('authority', $paymentResult['Authority'])->get()->first();
        paymentHelper::Verify($paymentResult, $payment);

        return redirect()->route('payment.result', $payment->id);

    }

    public function showResult(Request $request, int $id)
    {
        $payment = payments::find($id);

//       dd($payment->status);
        return view('front.shop.orders.paymentResult', compact('payment'));
    }
}
