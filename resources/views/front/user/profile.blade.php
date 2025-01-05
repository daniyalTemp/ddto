@extends('front.layout')

@section('content')
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>پروفایل</h2>
            <p>صفحه اصلی<span class="separator">/</span><span class="current-section">پروفایل</span></p>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->


    <!-- AUTHOR PROFILE META -->
    <div class="author-profile-meta-wrap">
        <div class="author-profile-meta">
            <!-- AUTHOR PROFILE INFO -->
            <div class="author-profile-info">
                <!-- AUTHOR PROFILE INFO ITEM -->
                <div class="author-profile-info-item">
                    <p class="text-header">عضویت در</p>
                    <p>{{$user->created_at}}</p>
                </div>
                <!-- /AUTHOR PROFILE INFO ITEM -->

                <!-- AUTHOR PROFILE INFO ITEM -->
                <div class="author-profile-info-item">
                    <p class="text-header">مجموع سفارش ها</p>
                    <p>{{count($user->Orders()->get())}}</p>
                </div>
                <!-- /AUTHOR PROFILE INFO ITEM -->

                <!-- AUTHOR PROFILE INFO ITEM -->
                <div class="author-profile-info-item">
                    <p class="text-header">درگاه ورودی </p>
                    <p>
                        @if(isset($user->googleId))
                            گوگل
                        @else
                            دیدیتو
                        @endif
                    </p>
                </div>
                <!-- /AUTHOR PROFILE INFO ITEM -->

                <!-- AUTHOR PROFILE INFO ITEM -->
                <div class="author-profile-info-item">
                    <p class="text-header">موجودری هدیه</p>
                    <p>{{$user->wallet}}</p>
                </div>
                <!-- /AUTHOR PROFILE INFO ITEM -->
            </div>
            <!-- /AUTHOR PROFILE INFO -->
        </div>
    </div>
    <!-- /AUTHOR PROFILE META -->

    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section overflowable">
            <!-- SIDEBAR -->
            <div class="sidebar left author-profile" style="top: -160px">
                <!-- SIDEBAR ITEM -->
                <div class="sidebar-item author-bio">
                    <!-- USER AVATAR -->
                    <a href="user-profile.html" class="user-avatar-wrap medium">
                        <figure class="user-avatar medium">
                            <img src="{{'storage/images/profiles/'.$user->id.'/'.$user->pic}}" alt="">
                        </figure>
                    </a>
                    <!-- /USER AVATAR -->
                    <p class="text-header">{{$user->getFullName()}}</p>
                    <p class="text-oneline">{{$user->email}}</p>
                    <p class="text-oneline">{{$user->phone}}</p>
                    <!-- SHARE LINKS -->

                    <!-- /SHARE LINKS -->
                    <a href="#" class="button mid dark spaced">لیست <span class="primary">سفارش ها</span></a>
                </div>
                <!-- /SIDEBAR ITEM -->



            </div>
            <!-- /SIDEBAR -->

            <!-- CONTENT -->
            <div class="content right">
                <!-- HEADLINE -->
                <div class="headline buttons primary">
                    <h4>ویرایش اطلاعات </h4>
{{--                    <h4> @include('error') </h4>--}}
                    </div>



                <form id="register-form2"   method="post">
                    {{csrf_field()}}
                    <div style="float: right;width: 48%; ">
                    <label for="firstName" class="label">نام </label>
                    <input type="text" id="firstName" name="firstName"
                           value="{{$user->firstName?$user->firstName : ''}}"

                           placeholder="نام">
                    </div>
                    <div style="float: left;width: 48%">
                        <label for="lastName" class="label ">نام خانوادگی </label>
                        <input type="text" id="lastName" name="lastName"
                               value="{{$user->lastName?$user->lastName : ''}}"
                               placeholder="نام خانوادگی ">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div style="float: right;width: 48%;">
                    <label for="NationalCode" class="label">کد ملی (جهت ارسال مرسولات)</label>
                    <input type="text" id="NationalCode" name="NationalCode"
                           value="{{$user->NationalCode?$user->NationalCode : ''}}"

                           placeholder="کدملی">
                    </div>
                    <div style="float: left;width: 48%">
                        <label for="phone" class="label">تلفن</label>
                        <input type="text" id="phone" name="phone"
                               value="{{$user->phone?$user->phone : ''}}"

                               placeholder="تلفن">
                    </div>

                    <br>
                    <br>
                    <br>
                    <div style="float: right;width: 48%;">
                    <label for="cardNumber" class="label">شماره کارت </label>
                    <input type="text" id="cardNumber" name="cardNumber"
                           value="{{$user->cardNumber?$user->cardNumber : ''}}"

                           placeholder="شماره کارت">
                    </div>
                    <div style="float: left;width: 48%">
                        <label for="password" class="label">رمز عبور (در صورت نیاز به تعویض)</label>
                        <input type="text" id="password" name="password"
{{--                               value="{{$user->phone?$user->phone : ''}}"--}}

                               placeholder="رمز عبور">
                    </div>

                    <br>
                    <br>
                    <br>
                    <button class="button mid primary btn-block" style="width: 100%"> ذخیره</button>
                </form>

                <div class="clearfix"></div>


            </div>
            <!-- CONTENT -->

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- /SECTION -->
@endsection
