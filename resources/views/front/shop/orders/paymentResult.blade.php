@extends('front.layout')

@section('content')
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>نتیجه پرداخت</h2>
            <p>صفحه اصلی<span class="separator">/</span><span class="current-section">نتیجه پرداخت  </span></p>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->



    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section overflowable">

            <!-- /SIDEBAR -->
            <div class="sidebar left author-profile" style="top: 0">

                <!-- DROPDOWN -->
                <ul class="dropdown hover-effect">

                    <li class="dropdown-item ">
                        <a href="#"> شماره سفارش
                            <span
                                style="float: left;padding-left: 5%;font-size: smaller">{{$payment->order()->get()->first()->id}}</span>
                        </a>
                    </li>
                    <li class="dropdown-item ">
                        <a href="#"> قیمت اصلی
                            <span
                                style="float: left;padding-left: 5%;font-size: smaller">{{number_format($payment->order()->get()->first()->totalPrice)}}</span>
                        </a>
                    </li>

                    <li class="dropdown-item ">
                        <a href="#"> قیمت نهایی
                            <span
                                style="float: left;padding-left: 5%;font-size: smaller">{{number_format($payment->order()->get()->first()->totalPrice)}}</span>
                        </a>
                    </li>
                    <li class="dropdown-item ">
                        <a href="#"> نتیجه پرداخت
                            <span
                                style="float: left;padding-left: 5%;font-size: smaller">{{$payment->status->faStatus}}</span>
                        </a>
                    </li>

                </ul>
                <!-- /DROPDOWN -->

            </div>
            <!-- /SIDEBAR end -->

            <!-- CONTENT -->
            <div class="content right">
                <!-- HEADLINE -->
                @if($payment->status->enStatus == 'payed')

                    <div class="headline buttons primary">
                        <h4>پرداخت موفق</h4>
                        <label style="padding-top: 3%;padding-right:15%; ">
                            سفارش شما با موفقیت ثبت شد
                        </label>

                        {{--                    <h4> @include('error') </h4>--}}
                    </div>

                    <button style="width: 100%" class="button  mid primary spaced">

                        کد رهگیری :
                        {{$payment->refCode}}
                    </button>
                <br>

                <div class="badges-showcase column5-wrap">



                        <ul class="dropdown notifications no-hover ">
                            <!-- DROPDOWN ITEM -->
                            @foreach($payment->order()->get()->first()->Products()->withPivot(['size', 'color', 'material', 'count', 'finalPrice'])->get() as $p)
                                <li class="dropdown-item" style="padding-bottom: 5%">
                                    <a href="#">
                                        <figure class="user-avatar">
                                            <img src="{{asset('storage/images/products/'.$p->id.'/'.$p->image)}}"
                                                 alt="">
                                        </figure>
                                    </a>
                                    <p class="title">
                                        {{$p->name}} * {{$p->getOriginal('pivot_count')}}
                                    </p>
                                    <p class="timestamp">
                                        <span
                                            style="border: 1px solid;margin-left: 4px;  border-radius: 50%;border-color: #0c0c0c;background-color: {{json_decode($p->getOriginal('pivot_color'))->color}}; color:{{json_decode($p->getOriginal('pivot_color'))->color}}">
                                            ---
                                            </span>
                                        <span>{{json_decode($p->getOriginal('pivot_size'))->name}}</span>
                                        <span>{{json_decode($p->getOriginal('pivot_material'))->name}}</span>
                                        {{--                                        <span>{{$p->material['name']}}</span>--}}
                                    </p>
                                    <span
                                        class="notification-type primary-new ">{{number_format($p->getOriginal('pivot_finalPrice'))}}</span>
                                </li>

                            @endforeach
                            <!-- /DROPDOWN ITEM -->


                        </ul>
                        <!-- /DROPDOWN NOTIFICATIONS -->
                    <div style="float: left">
                        <a href="{{route('shop..order.receipt' ,$payment->order()->get()->first()->id )}}" class="button mid dark spaced">دریافت رسید</a>
                        <br>
                        <a href="{{route('shop.userOrders')}}" class="button mid dark spaced">لیست <span class="primary">سفارش ها</span></a>

                    </div>

                </div>

                <div class="clearfix"></div>
                @else
                    <div class="headline buttons tertiary">
                        <h4> پرداخت ناموفق </h4>
                        <label style="padding-top: 3%;padding-right:16%; ">
                            لطفا جهت پرداخت مجدد اقدام فرمایید
                        </label>


                        {{--                    <h4> @include('error') </h4>--}}
                    </div>
{{--                    <button style="width: 100%" class="button  mid dark spaced">--}}

{{--                        کد رهگیری :--}}
{{--                        {{$payment->refCode}}--}}
{{--                    </button>--}}

{{--                        <br>--}}
                        <a href="{{route('shop.order.payment', $payment->order()->get()->first()->id)}} "style="width: 100%" class="button mid secondary spaced">پرداخت مجدد</a>


                @endif

            </div>
            <!-- CONTENT -->

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- /SECTION -->
@endsection

