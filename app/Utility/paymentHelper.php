<?php

namespace App\Utility;


use App\Models\orders;
use App\Models\payments;
use http\Cookie;

class paymentHelper
{
    public static $redirectRout = 'https://sandbox.zarinpal.com/pg/StartPay/';
    public static $verifyRout = 'https://sandbox.zarinpal.com/pg/v4/payment/verify.json';
    public static $getAuthorityRoute = 'https://sandbox.zarinpal.com/pg/v4/payment/request.json';
    public static $merchant_id = '3b0f703e-2b24-4819-a4eb-4eca44a79a45';

    public static $callback = 'http://ddto.test/paymentCallBack';

    public function __construct()
    {
    }
private static function setFailPayment($payment){
        $payment->update([
            'status'=>'failed'
        ]);
//        return redirect()->route('payment.result' , $payment->id);

}
    public static function pay($payment)
    {
//        dd($order->user()->get()->first());
//dd($order->user()->get()->first()->phone );


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => self::$getAuthorityRoute,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => false,//rm
            CURLOPT_SSL_VERIFYPEER => false,//rm
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
  "merchant_id": "3b0f703e-2b24-4819-a4eb-4eca44a79a45",
  "amount": "'.$payment->amount.'",
  "callback_url": "' . self::$callback . '",
  "description": "پرداخت سفارش دنیای دلخواه تو شماره ",
  "order_id": "'.$payment->order()->get()->first()->id.'",
  "metadata": {
  }
}',
            //    "mobile": "'.$order->user()->get()->first()->phone.'",

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response);
        if (isset($result->errors->code))
            self::setFailPayment($payment);

        $payment->update(['authority'=>$result->data->authority]);
//        dd(self::$redirectRout.$result->data->authority);
        return redirect(self::$redirectRout . $result->data->authority);


    }

    public static function Verify($paymentResult ,$payment)
    {
        if ($paymentResult['Status'] == 'NOK') {
            self::setFailPayment($payment);
            return;
        }
//        dd($paymentResult);
            $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => self::$verifyRout,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => false,//rm
            CURLOPT_SSL_VERIFYPEER => false,//rm
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
  "merchant_id": "' . self::$merchant_id . '",
  "amount": "'.$payment->amount.'",
  "authority": "'.$payment->authority.'"
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $verifyResult=json_decode($response);
//        dd($verifyResult);
        if (isset($verifyResult->errors->code))
            self::setFailPayment($payment);


        //todo check it

//        if ($verifyResult->data->fee != $payment->amount)
//            dd('error Fee');
//        dd()
        if ($verifyResult->data->code == 100) {
            $payment->update(
                [
                    'result' => new paymentResult($verifyResult->data->code, $verifyResult->data->message),
                    'refCode' => $verifyResult->data->ref_id,
                    'card_holder' => $verifyResult->data->card_pan,
                    'cardHash' => $verifyResult->data->card_hash,
                    'status' => 'payed',
                    'customData' => json_encode($verifyResult),

                ]
            );
            \Illuminate\Support\Facades\Cookie::expire('ddtoOrderId');
            $payment->order()->get()->first()->update([
                'paymentStatus'=>'pay',
                'status'=>'waiting',
            ]);
        }
        else{
            self::setFailPayment($payment);
        }
//        dd(json_decode($response));
    }
}
