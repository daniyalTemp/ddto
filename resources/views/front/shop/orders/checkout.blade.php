@extends('front.layout')

@section('content')
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>سفارش شما</h2>
            <p>صفحه اصلی<span class="separator">/</span><span class="current-section">سبد خرید </span></p>
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

                <h4> محصولات درون سبد</h4>


                <ul class="dropdown notifications no-hover ">
                    <!-- DROPDOWN ITEM -->
                    @foreach($card as $p)
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

                        <form
                            action="{{route('shop.order.removeCard' ,[$p->id , (\Illuminate\Support\Facades\Cookie::get('ddtoOrderId')?\Illuminate\Support\Facades\Cookie::get('ddtoOrderId') : -1)] )}}"
                            method="get">
                            {{csrf_field()}}
                            <input type="hidden" hidden="hidden" name="color"
                                   value="{{$p->getOriginal('pivot_color')}}">
                            <input type="hidden" name="size" value="{{$p->getOriginal('pivot_size')}}">
                            <input type="hidden" name="material" value="{{$p->getOriginal('pivot_material')}}">
                            {{--                                        <button  type="submit" style="border-radius: 10%; margin-top: 6px" href="#" class="button small dark text-center spaced">افزودن به سبد </button>--}}
                            <button type="submit" style="border-radius: 10%; width: 100%"
                                    href="{{route('shop.order.removeCard' ,[$p->id, (\Illuminate\Support\Facades\Cookie::get('ddtoOrderId'))?\Illuminate\Support\Facades\Cookie::get('ddtoOrderId') : -1] )}}"
                                    class="button small tertiary text-center spaced">حذف از سبد
                            </button>
                        </form>

                    @endforeach
                    <!-- /DROPDOWN ITEM -->


                </ul>
                <!-- /DROPDOWN NOTIFICATIONS -->
            </div>
            <!-- /SIDEBAR end -->

            <!-- CONTENT -->
            <div class="content right">
                <!-- HEADLINE -->
                <div class="headline buttons primary">
                    <h4>اطلاعات ارسال</h4>
                    <label style="padding-top: 3%;padding-right:15%; ">اطلاعات پیشفرض ارسال برای کاربر شماست، اما
                        میتوانید در صورت نیاز آن ها را تغییر دهید </label>

                    {{--                    <h4> @include('error') </h4>--}}
                </div>

                @if(isset($errors) && count($errors)>0)
                    <div class="headline buttons tertiary">
                        @foreach ($errors->all() as $error)

                            <label style="border-radius: 10%; width: 25%;float: right"
                                   class="button small tertiary text-center spaced">
                                {{$error}}
                            </label>

                        @endforeach
                    </div>
                @endif


                <div class="badges-showcase column5-wrap">


                    <form id="register-form2" method="post" action="{{route('shop.order.completeOrder' , $order->id)}}">
                        {{csrf_field()}}
                        <div style="float: right;width: 48%">
                            <label for="name" class="label">نام و نام خانودگی </label>
                            <input type="text" id="name" name="name"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->firstName.' '.\Illuminate\Support\Facades\Auth::user()->lastName}}"
                                   placeholder="نام">
                        </div>

                        <div style="float: left;width: 48%">
                            <label for="NationalCode" class="label">کد ملی : </label>
                            <input type="text" id="NationalCode" name="NationalCode"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->NationalCode}}"
                                   placeholder="-">
                        </div>
                        <br>
                        <br>
                        <br>


                        <div style="float: right;width: 48%">
                            <label for="sendIn" class="label">در صورت نیاز به ارسال در زمان خاص تاریخ مد نظر را وارد
                                کنید : </label>
                            <input type="text" class="pdate" data-jdp name="sendIn" id="pcal1"
                                   value="{{isset($order) ? ($order->sendIn? $order->sendIn:''):''}}"
                                   placeholder="1403/10/10">
                        </div>
                        <div style="float: left;width: 48%">
                            <label for="phone" class="label">تلفن : </label>
                            <input type="text" id="phone" name="phone"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->phone}}"
                                   placeholder="">
                        </div>
                        <br>
                        <br>
                        <br>


                        <div style="float: right;width: 48%">
                            <label for="postalCode" class="label"> کد پستی : </label>
                            <input type="text" id="postalCode" name="postalCode"
                                   value="{{isset($order) ? ($order->postalCode? $order->postalCode:''):''}}"
                                   placeholder="">
                        </div>
                        <div style="float: left;width: 48%">
                            <label for="address" class="label">آدرس : </label>
                            <input type="text" id="address" name="address"
                                   value="{{isset($order) ? ($order->address? $order->address:''):''}}"
                                   placeholder="">
                        </div>
                        <br>
                        <br>
                        <br>
                        <div style="">
                            <label for="comment" class="label">توضییحات اضافه </label>
                            <textarea type="text" id="comment" name="comment"
                                      value="{{isset($order) ? ($order->comment? $order->comment:''):''}}">
                        </textarea>
                        </div>
                        <br>

                        <button class="button mid primary btn-block" style="width: 100%"> پرداخت و ادامه خرید</button>
                    </form>

                    <div class="clearfix"></div>

                    {{--                    @if(isset($order))--}}
                    {{--                        @foreach($order->Products()->withPivot(['size', 'color', 'material', 'count', 'finalPrice'])->get() as $product)--}}
                    {{--                            <!-- BADGES SHOWCASE ITEM -->--}}
                    {{--                            <div class="badges-showcase-item column">--}}

                    {{--                                <figure class="badge big pinned liquid">--}}
                    {{--                                    <img--}}
                    {{--                                        src="{{asset('storage/images/products/'.$product->id.'/'.$product->image)}}"--}}
                    {{--                                        alt="">--}}
                    {{--                                </figure>--}}
                    {{--                                <p class="text-header">--}}
                    {{--                                <div class="information-layout">--}}

                    {{--                                    <!-- INFORMATION LAYOUT ITEM -->--}}
                    {{--                                    <div class="information-layout-item">--}}

                    {{--                                        <ul class="share-links">--}}
                    {{--                                            <li>--}}
                    {{--                                                <a href="#"--}}
                    {{--                                                   style="border: 1px solid;border-color: #0c0c0c;background-color: {{json_decode($product->getOriginal('pivot_color'))->color}};"></a>--}}
                    {{--                                            </li>--}}
                    {{--                                            <li style="border: 0px solid;border-color: #0f4f99;border-radius:30%;--}}
                    {{--                                    background-color:#d4eaea--}}
                    {{--                                    ;margin-left: 4px">--}}
                    {{--                                                {{json_decode($product->getOriginal('pivot_size'))->name}}--}}
                    {{--                                            </li>--}}
                    {{--                                            <li style="border: 0px solid;border-color: #0f4f99;border-radius:30%;--}}
                    {{--                                    background-color:#d4eaea--}}
                    {{--                                    ;margin-left: 4px">--}}
                    {{--                                                {{json_decode($product->getOriginal('pivot_material'))->name}}--}}
                    {{--                                            </li>--}}


                    {{--                                        </ul>--}}


                    {{--                                    </div>--}}
                    {{--                                    <!-- /INFORMATION LAYOUT ITEM -->--}}


                    {{--                                </div>--}}
                    {{--                                </p>--}}
                    {{--                                <p class="badge-description">--}}

                    {{--                                    {{$product->pivot->count}}--}}
                    {{--                                    عدد--}}
                    {{--                                </p>--}}
                    {{--                                <p class="text-header badge-progress-title">--}}
                    {{--                                     جمعا--}}
                    {{--                                     {{number_format($product->pivot->finalPrice)}}--}}
                    {{--تومان--}}
                    {{--                                </p>--}}


                    {{--                            </div>--}}
                    {{--                            <!-- /BADGES SHOWCASE ITEM -->--}}

                    {{--                        @endforeach--}}
                    {{--                    @endif--}}

                </div>

                <div class="clearfix"></div>


            </div>
            <!-- CONTENT -->

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- /SECTION -->
@endsection

