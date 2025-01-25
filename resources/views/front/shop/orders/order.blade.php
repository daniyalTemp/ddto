@extends('front.layout')

@section('content')
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>خرید شما</h2>
            <p>صفحه اصلی<span class="separator">/</span><span class="current-section">خرید شما</span></p>
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
                        <a href="#"> تعداد محصولات
                            <span
                                style="float: left;padding-left: 5%;font-size: smaller">{{count($order->Products()->get())}}</span>
                        </a>
                    </li>
                    <li class="dropdown-item ">
                        <a href="#"> قیمت اصلی
                            <span
                                style="float: left;padding-left: 5%;font-size: smaller">{{number_format($order->totalPrice)}}</span>
                        </a>
                    </li>

                    <li class="dropdown-item ">
                        <a href="#"> قیمت نهایی
                            <span
                                style="float: left;padding-left: 5%;font-size: smaller">{{number_format($order->totalPrice)}}</span>
                        </a>
                    </li>

                </ul>
                <!-- /DROPDOWN -->
                <h4> اطلاعات پرداخت </h4>
                <ul class="dropdown hover-effect">

                    <li class="dropdown-item ">
                        <a href="#">نتیجه
                            <span
                                style="float: left;padding-left: 5%;font-size: smaller">{{$payment->status->faStatus}}</span>
                        </a>
                    </li>
                    @if($payment->status->enStatus == 'payed')
                        <li class="dropdown-item ">
                            <a href="#">پرداخت شده در
                                <span
                                    style="float: left;padding-left: 5%;font-size: smaller">{{verta($payment->updated_at)}}</span>
                            </a>
                        </li>
                        <li class="dropdown-item ">
                            <a href="#">مبلغ پرداخت شده
                                <span
                                    style="float: left;padding-left: 5%;font-size: smaller">{{number_format($payment->amount)}}</span>
                            </a>
                        </li>
                        <li class="dropdown-item ">
                            <a href="#">کد رهگیری
                                <span
                                    style="float: left;padding-left: 5%;font-size: smaller">{{$payment->refCode}}</span>
                            </a>
                        </li>
                    @else
                        <br>
                        <a href="{{route('shop.order.payment', $payment->order()->get()->first()->id)}} "
                           style="width: 100%" class="button mid secondary spaced">پرداخت مجدد</a>

                    @endif


                </ul>
            </div>
            <!-- /SIDEBAR end -->

            <!-- CONTENT -->
            <div class="content right">
                <!-- HEADLINE -->
                <div class="headline buttons primary">
                    <h4>سفارش {{$order->id}}</h4>
                    {{--                    <h4> @include('error') </h4>--}}

                        <button style="width: 25%" type="submit"
                                class="button small {{$order->status->colorStatus}} text-center spaced">{{$order->status->faStatus}}
                        </button>


                    @if($payment->status->enStatus == 'payed')
                        <a type="submit"
                           class="button small dark text-center spaced">دریافت رسید
                        </a>
                    @endif
                </div>


                <!-- PRODUCT SHOWCASE -->
                <div class="product-showcase">
                    <!-- PRODUCT LIST -->
                    <div class="product-list grid column3-4-wrap">

                        @foreach($order->Products()->withPivot(['size', 'color', 'material', 'count', 'finalPrice'])->get() as $product)
                            <!-- PRODUCT ITEM -->
                            <div class="product-item column">
                                <!-- PRODUCT PREVIEW ACTIONS -->
                                <div class="product-preview-actions">
                                    <!-- PRODUCT PREVIEW IMAGE -->
                                    <figure class="product-preview-image">
                                        <img style="width: 258px;
                                            height: 150px; "
                                             src="{{asset('storage/images/products/'.$product->id.'/'.$product->image)}}"
                                             alt="{{$product->name}}">
                                    </figure>
                                    <!-- /PRODUCT PREVIEW IMAGE -->

                                    <!-- PREVIEW ACTIONS -->
                                    <div class="preview-actions ">
                                        <!-- PREVIEW ACTION -->
                                        <div class="preview-action" style="  right: 110px;">
                                            <a href="{{route('shop.product' , $product->id)}}">
                                                <div class="circle tiny primary">
                                                    <span class="icon-tag"></span>
                                                </div>
                                            </a>
                                            <a href="{{route('shop.product' , $product->id)}}">
                                                <p>نمایش</p>
                                            </a>
                                        </div>
                                        <!-- /PREVIEW ACTION -->

                                    </div>
                                    <!-- /PREVIEW ACTIONS -->
                                </div>
                                <!-- /PRODUCT PREVIEW ACTIONS -->

                                <!-- PRODUCT INFO -->
                                <div class="product-info">
                                    <a>
                                        <p class="text-header">{{$product->name}}</p>
                                    </a>
                                    <p class="product-description">
                                        <span>{{json_decode($product->getOriginal('pivot_material'))->name}}</span>
                                    </p>
                                    <a>
                                        <p class="category primary tertiary">{{$product->getOriginal('pivot_count')}}
                                            عدد </p>
                                    </a>
                                    <p class="price">

                                        <i style="font-size: small">{{$product->getOriginal('pivot_count')}} * </i>
                                        {{number_format($product->BasePrice)}}
                                        <span>تومان</span>

                                    </p>
                                </div>
                                <!-- /PRODUCT INFO -->
                                <hr class="line-separator">

                                <!-- USER RATING -->
                                <div class="user-rating">
                                    <a href="author-profile.html">

                                        <figure class="user-avatar small">
                                            <div
                                                style="border: solid 1px;border-radius: 50%;border-color: #0c0c0c;height: 20px;background-color: {{json_decode($product->getOriginal('pivot_color'))->color}}"></div>
                                        </figure>
                                    </a>
                                    <p class="price" style="padding-top: 2px">

                                        <span
                                            style="border: solid 1px;border-color: #0ae7c2;border-radius: 30%;">{{json_decode($product->getOriginal('pivot_size'))->name}}</span>


                                    </p>

                                </div>
                                <!-- /USER RATING -->
                            </div>
                            <!-- /PRODUCT ITEM -->

                        @endforeach


                    </div>
                    <!-- /PRODUCT LIST -->
                </div>
                <!-- /PRODUCT SHOWCASE -->

                <div class="clearfix"></div>


            </div>
            <!-- CONTENT -->

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- /SECTION -->
@endsection

