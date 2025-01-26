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

                                                            
                                                            <li>
                                                                <div class="timeline-panel">
                                                                    <div class="media mr-2">
                                                                        <img alt="image" width="50"
                                                                             src="images/avatar/1.jpg">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h5 class="mb-1">دکتر جعفر برای شما عکس ارسال می
                                                                            کند</h5>
                                                                        <small class="d-block">آبان 1399 - 13:45 بعد
                                                                            ظهر</small>
                                                                    </div>
                                                                    <div class="dropdown">
                                                                        <button type="button"
                                                                                class="btn btn-primary light sharp"
                                                                                data-toggle="dropdown">
                                                                            <svg width="18px" height="18px"
                                                                                 viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                          height="24"/>
                                                                                    <circle fill="#000000" cx="5"
                                                                                            cy="12" r="2"/>
                                                                                    <circle fill="#000000" cx="12"
                                                                                            cy="12" r="2"/>
                                                                                    <circle fill="#000000" cx="19"
                                                                                            cy="12" r="2"/>
                                                                                </g>
                                                                            </svg>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">ویرایش</a>
                                                                            <a class="dropdown-item" href="#">حذف</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div class="pt-4">
                                    <h4>این عنوان نمایه است</h4>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                        برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                        کاربردی می باشد..
                                    </p>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                        برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                        کاربردی می باشد..
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment">
                                <div class="pt-4">
                                    <div class="col-xl-3 col-lg-6 col-sm-6  ">
                                        <div class="widget-stat card bg-dark">
                                            <div class="card-body p-4">
                                                <div class="media">
									<span class="mr-3">
										<i class="la la-dollar"></i>
									</span>
                                                    <div class="media-body text-white">
                                                        <p class="mb-1">پرداختی</p>
                                                        <h3 class="text-white">{{number_format($payment->amount)}}
                                                            تومان</h3>
                                                        <div class="progress mb-2 bg-secondary">
                                                            <div class="progress-bar progress-animated bg-light"
                                                                 style="width: 100%"></div>
                                                        </div>
                                                        <small>پرداخت شده در</small>
                                                        <br>
                                                        <small>{{verta($payment->updated_at)}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="action">
                                <div class="pt-4">
                                    <h4>این عنوان تماس است</h4>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                        برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                        کاربردی می باشد.
                                    </p>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                        برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                        کاربردی می باشد.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
