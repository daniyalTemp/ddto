@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12 center">


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> اطلاعات سفارش شماره :
                        {{$order->id}}
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home"><i
                                        class="la la-home mr-2"></i> اطلاعات اصلی</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile"><i class="la la-user mr-2"></i>
                                    سفارش دهنده</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#payment"><i class="la la-wallet mr-2"></i>
                                    پرداخت ها</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#action"><i class="la la-exchange mr-2"></i>
                                    عملیات </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="pt-4">

                                    <div class="row">
                                        <div class="col-xl-4 col-lg-12">
                                            <div class="card border-0 pb-0">
                                                <div class="card-header border-0 pb-0">
                                                    <h4 class="card-title">لیست محصولات</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="DZ_W_Todo2" class="widget-media dz-scroll"
                                                         style="height:370px;">
                                                        <ul class="timeline">

                                                            @foreach($order->Products()->withPivot(['size', 'color', 'material', 'count', 'finalPrice'])->get() as $orderProduct)

                                                                <li>
                                                                    <div class="timeline-panel">
                                                                        <div class="media mr-2">
                                                                            <img alt="image" width="50"
                                                                                 src="{{asset('storage/images/products/'.$orderProduct->id.'/'.$orderProduct->image)}}">
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <a href="{{route('shop.product', $orderProduct->id)}}"
                                                                               target="_blank">
                                                                                <h5 class="mb-1">
                                                                                    {{$orderProduct->name}}

                                                                                </h5>
                                                                            </a>
                                                                            <small class="d-block">
                                                                                {{json_decode($orderProduct->getOriginal('pivot_size'))->name}}
                                                                                -- {{json_decode($orderProduct->getOriginal('pivot_material'))->name}}
                                                                                -- {{json_decode($orderProduct->getOriginal('pivot_color'))->name}}
                                                                            </small>
                                                                            <small class="d-block">
                                                                                {{$orderProduct->getOriginal('pivot_count')}}
                                                                                عدد
                                                                            </small>

                                                                        </div>

                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">

                                            <div class="card text-white bg-secondary">
                                                <div class="card-header border-0 pb-0">
                                                    <h4 class="card-title">اطلاعات ارسال</h4>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex justify-content-between"><span
                                                            class="mb-0">
                                                            نام و نام خانوادگی
                                                        </span>
                                                        <strong>
                                                            {{$order->user()->get()->last()->getFullName()}}
                                                        </strong>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between"><span
                                                            class="mb-0">
کد ملی                                                        </span>
                                                        <strong>
                                                            {{$order->user()->get()->last()->NationalCode}}
                                                        </strong>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between"><span
                                                            class="mb-0">
تلفن                                                        </span>
                                                        <strong>
                                                            {{$order->user()->get()->last()->phone}}
                                                        </strong>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between"><span
                                                            class="mb-0">
 کد پستی                                                        </span>
                                                        <strong>
                                                            {{$order->postalCode}}
                                                        </strong>
                                                    </li>
                                                    @if(isset($order->sendIn))
                                                        <li class="list-group-item d-flex justify-content-between"><span
                                                                class="mb-0">
 ارسال در تاریخ خاص                                                    </span>
                                                            <strong>
                                                                {{$order->sendIn}}
                                                            </strong>
                                                        </li>

                                                    @endif
                                                    <li class="list-group-item d-flex justify-content-between"><span
                                                            class="mb-0">
 آدرس                                                       </span>
                                                        <strong>
                                                            {{$order->address}}
                                                        </strong>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">


                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">

                                                    <div class="widget-stat card">
                                                        <div class="card-body p-4">
                                                            <h4 class="card-title">وضعیت سفارش</h4>
                                                            <h3>{{$order->status->faStatus}}</h3>
                                                            <div class="progress mb-2">
                                                                <div
                                                                    class="progress-bar progress-animated bg-{{$order->status->panelColor}}"
                                                                    style="width: {{$order->status->percentStatus}}%"></div>
                                                            </div>
                                                            <small>آخرین تغییر در :
                                                                {{verta($order->updated_at)->format('Y/m/d')}}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                                    <div
                                                        class="widget-stat card bg-{{$order->paymentStatus->panelColor}}">
                                                        <div class="card-body p-4">
                                                            <div class="media">

                                                                <div class="media-body text-white">
                                                                    <p class="mb-1">وضعیت نهایی پرداخت </p>
                                                                    <h3 class="text-white">{{$order->paymentStatus->faStatus}}</h3>
                                                                    <div
                                                                        class="progress mb-2 bg-{{$order->paymentStatus->panelColor}}">
                                                                        <div
                                                                            class="progress-bar progress-animated bg-light"
                                                                            style="width: {{$order->paymentStatus->percentStatus}}%"></div>
                                                                    </div>
                                                                    <small>{{number_format($order->totalPrice)}}
                                                                        تومان
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-sm-12 m-0">
                                                    <div class="card">

                                                        <div class="card-body pb-0">


                                                            <ul class="list-group list-group-flush">
                                                                @if(isset($order->comment))
                                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                                        <strong>توضیحات : </strong>
                                                                        <span class="mb-0">{{$order->comment}}</span>
                                                                    </li>
                                                                @endif

                                                                @if($order->status->enStatus == 'cancel')
                                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                                        <strong>دلیل کنسلی : </strong>
                                                                        <span
                                                                            class="mb-0">{{$order->cancelReason}}</span>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div class="pt-4">
                                    <h4>کاربر سفارش دهنده </h4>


                                    <div class="col-xl-8 col-lg-8 col-sm-12 pull-left ">
                                        <div class="card overflow-hidden">
                                            <div class="text-center p-3 overlay-box "
                                                 style="background-image: url({{asset('front/images/big/img1.jpg')}});">
                                                <div class="profile-photo">
                                                    <img
                                                        src="{{asset('storage/images/profiles/'.$order->user()->get()->last()->id.'/'.$order->user()->get()->last()->pic)}}"
                                                        width="100"
                                                        class="img-fluid rounded-circle" alt="">
                                                </div>
                                                <h3 class="mt-3 mb-1 text-white">{{$order->user()->get()->last()->getFullName()}}</h3>
                                                <p class="text-white mb-0">{{$order->user()->get()->last()->phone}}</p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between"><span
                                                        class="mb-0">کد ملی
                                                    </span>
                                                    <strong
                                                        class="text-muted">{{$order->user()->get()->last()->NationalCode}}
                                                    </strong>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between"><span
                                                        class="mb-0">ایمیل
                                                    </span>
                                                    <strong
                                                        class="text-muted">{{$order->user()->get()->last()->email}}
                                                    </strong>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between"><span
                                                        class="mb-0"> موجودی کیف
                                                    </span>
                                                    <strong
                                                        class="text-muted">{{number_format($order->user()->get()->last()->wallet)}}
                                                        تومان
                                                    </strong>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between"><span
                                                        class="mb-0"> شماره کارت
                                                    </span>
                                                    <strong
                                                        class="text-muted">{{implode("-", str_split($order->user()->get()->last()->cardNumber, 4 ,))}}

                                                    </strong>
                                                </li>

                                            </ul>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="payment">
                                <div class="pt-4">
                                    <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title"> پرداختهای اخیر</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive recentOrderTable">
                                                    <table class="table verticle-middle table-responsive-md">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col"> شماره</th>
                                                            <th scope="col">کد رهگیری </th>
                                                            <th scope="col">شماره کارت </th>
                                                            <th scope="col">تاریخ اقدام</th>
                                                            <th scope="col">وضعیت</th>
                                                            <th scope="col">مبلغ</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(count($order->payment()->get()) > 0)
                                                            @foreach($order->payment()->get() as $orderPayment)
                                                                <tr>
                                                                    <td>{{$orderPayment->id}}</td>
                                                                    <td>{{$orderPayment->refCode}}</td>
                                                                    <td>{{$orderPayment->card_holder}}</td>
                                                                    <td>{{verta($orderPayment->updated_at)->format('Y/m/d -- H:i:s')}}</td>
                                                                    <td><span class="badge badge-rounded badge-{{$orderPayment->status->panelColor}}"> {{$orderPayment->status->faStatus}}</span></td>
                                                                    <td>{{number_format($orderPayment->amount)}}</td>

                                                                </tr>
                                                            @endforeach
                                                        @endif



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="action">
                                <div class="pt-4">
                                    <h4>عملیات های مجاز این سفارش </h4>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
