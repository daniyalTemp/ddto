
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رسید خرید</title>
    <style>

        body {
            font-family: 'Vazir', sans-serif;
            direction: rtl;
            text-align: right;
        }
    </style>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            direction: rtl;
            text-align: right;
        }
        .receipt {
            width: 80mm;
            padding: 10px;
            border: 1px solid #000;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo {
            /*max-width: 60px;*/
        }
        .details, .items, .footer {
            width: 100%;
            border-collapse: collapse;
        }
        .items th, .items td {
            border: 1px solid #000;
            padding: 5px;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="receipt" style="background-color: #2b373a;color: wheat;  width: 70%;" >
    <div class="header">
        <img  src="{{ asset('front/images/logo-white.png') }}"  class="logo" alt="دیدیتو">
        <h2>فروشگاه دنیای دلخواه تو</h2>
    </div>
    <table class="details" style="color: wheat;" >
        <tr><td>شماره سفارش:</td><td>{{$order->id}}</td></tr>
        <tr><td>تاریخ  صدور :</td><td>{{verta(now())}}</td></tr>
        <tr><td>مشتری:</td><td>{{$order->user()->get()->first()->getFullName()}}</td></tr>
    </table>
    <hr>

    <hr>
    <table class="footer" style="color: wheat;">
        <tr><td>مبلغ کل:</td><td>{{number_format($order->totalPrice)}}
            تومان
            </td></tr>
    </table>
    <hr>
    <p style="text-align: center;">با تشکر از خرید شما!</p>
</div>
</body>
</html>

