@extends('front.layout')

@section('content')
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>خریدهای شما</h2>
            <p>صفحه اصلی<span class="separator">/</span><span class="current-section">خریدهای شما</span></p>
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
                    @if(isset($statistics))
                        @foreach($statistics as $key =>$statistic)
                            <li class="dropdown-item @if(str_contains(url()->full(),(new \App\Utility\orderStatus($key))->enStatus)) active @endif">
                                <a href="{{route('shop.userOrders', (new \App\Utility\orderStatus($key))->enStatus)}}">{{(new \App\Utility\orderStatus($key))->faStatus}}
                                <span style="float: left;padding-left: 5%;font-size: smaller">{{$statistic}}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif


                </ul>
                <!-- /DROPDOWN -->


            </div>
            <!-- /SIDEBAR end -->

            <!-- CONTENT -->
            <div class="content right">
                <!-- HEADLINE -->
                <div class="headline buttons primary">
                    <h4>لیست سفارش ها</h4>
                    {{--                    <h4> @include('error') </h4>--}}
                </div>


                <div class="badges-showcase column5-wrap">

                    @if(isset($orders))
                        @foreach($orders as $order)
                            <!-- BADGES SHOWCASE ITEM -->
                            <div class="badges-showcase-item column">
                                <a href="#">
                                <figure class="badge big pinned liquid">
                                    <img src="{{asset('front/images/badges/community/master_b.png')}}" alt="">
                                </figure>
                                <p class="text-header">کد {{$order->id}} </p>
                                <p class="badge-description">
                                    {{count($order->Products()->get())}}
                                    کالا
                                    <br>
{{number_format($order->totalPrice)}}
                                    تومان

                                </p>
                                <p class="text-header badge-progress-title">{{$order->status->faStatus}}
                                    @if($order->status->enStatus == 'getData')
                                    -
                                    {{$order->paymentStatus->faStatus}}
                                    @endif
                                </p>
                                <!-- BADGE PROGRESS -->
                                <div class="badge-progress badge-progress27 xmlinefill"
                                     style="width: 170px; height: 18px; position: relative;">
                                    <canvas width="170" height="18"
                                            style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas>
                                    <canvas class="lineOutline" width="170" height="18"
                                            style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas>
                                </div>
                                <!-- /BADGE PROGRESS -->
                                </a>
                            </div>
                            <!-- /BADGES SHOWCASE ITEM -->

                        @endforeach
                    @endif


                </div>

                <div class="clearfix"></div>


            </div>
            <!-- CONTENT -->

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- /SECTION -->
@endsection

