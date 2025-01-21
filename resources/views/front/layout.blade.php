<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/css/vendor/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/vendor/tooltipster.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/vendor/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/dashboard-css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">

    <!-- favicon -->
    <link rel="icon" href="{{asset('front/favicon.ico')}}">
    <title>دنیای دلخواه تو - دیدتو</title>
</head>
<body>
<!-- HEADER -->
<div class="header-wrap">
    <header>
        <!-- LOGO -->
        <a href="{{route('index')}}">
            <figure class="logo">
                <img src="{{asset('front/images/logo-white.png')}}" alt="logo">
            </figure>
        </a>
        <!-- /LOGO -->

        <!-- MOBILE MENU HANDLER -->
        <div class="mobile-menu-handler left primary">
            <img src="{{asset('front/images/pull-icon.png')}}" alt="pull-icon">
        </div>
        <!-- /MOBILE MENU HANDLER -->

        <!-- LOGO MOBILE -->
        <a href="{{route('index')}}">
            <figure class="logo-mobile">
                <img src="{{asset('front/images/1.png')}}" alt="logo-mobile">
            </figure>
        </a>
        <!-- /LOGO MOBILE -->
        @if(\Illuminate\Support\Facades\Auth::check())

            <!-- MOBILE ACCOUNT OPTIONS HANDLER -->
            <div class="mobile-account-options-handler right secondary">
                <span class="icon-user"></span>
            </div>
            <!-- /MOBILE ACCOUNT OPTIONS HANDLER -->


            <!-- USER BOARD -->
            <div class="user-board">


                <!-- USER QUICKVIEW -->
                <div class="user-quickview">
                    <!-- USER AVATAR -->
                    <a href="#">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <figure class="user-avatar">
                                <img
                                    src="{{asset('storage/images/profiles/'.\Illuminate\Support\Facades\Auth::user()->id.'/'.\Illuminate\Support\Facades\Auth::user()->pic)}}">
                            </figure>
                        </div>
                    </a>
                    <!-- /USER AVATAR -->

                    <!-- USER INFORMATION -->
                    <p class="user-name">{{ \Illuminate\Support\Facades\Auth::user()->firstName.' '.\Illuminate\Support\Facades\Auth::user()->lastName }}</p>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                    <p class="user-money">
                        {{number_format(\Illuminate\Support\Facades\Auth::user()->wallet)}}
                        تومان
                    </p>
                    <!-- /USER INFORMATION -->

                    <!-- DROPDOWN -->
                    <ul class="dropdown small hover-effect closed">
                        <li class="dropdown-item">
                            <div class="dropdown-triangle"></div>
                            <a href="{{route('profile')}}">صفحه پروفایل</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{route('shop.userOrders')}}">حریدهای شما</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{route('logout')}}">خروج</a>
                        </li>
                    </ul>
                    <!-- /DROPDOWN -->
                </div>
                <!-- /USER QUICKVIEW -->


                <!-- ACCOUNT ACTIONS -->

                <!-- /ACCOUNT ACTIONS -->
            </div>
            <!-- /USER BOARD -->

        @else
            <div class="account-actions">
                <a href="{{route('login')}}" class="button medium primary">ورود به حساب</a>

            </div>


        @endif
        @if(\Illuminate\Support\Facades\Cookie::has('ddtoOrderId') || isset($card))

            <div class="user-board">
                <!-- ACCOUNT INFORMATION -->
                <div class="account-information">

                    <div class="account-settings-quickview">
						<span class="icon-basket">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
                            <!-- /SVG ARROW -->
						</span>

                        <!-- PIN -->
                        <span class="pin soft-edged primary" style="top: -10px;">{{count($card)}}</span>
                        <!-- /PIN -->

                        <!-- DROPDOWN NOTIFICATIONS -->
                        <ul class="dropdown notifications no-hover closed">
                            <!-- DROPDOWN ITEM -->
                            @foreach($card as $p)
                                <li class="dropdown-item">
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
                                        <span style="border: 1px solid;margin-left: 4px;  border-radius: 50%;border-color: #0c0c0c;background-color: {{json_decode($p->getOriginal('pivot_color'))->color}}; color:{{json_decode($p->getOriginal('pivot_color'))->color}}">
                                            ---
                                            </span>
                                        <span>{{json_decode($p->getOriginal('pivot_size'))->name}}</span>
                                        <span>{{json_decode($p->getOriginal('pivot_material'))->name}}</span>
                                        {{--                                        <span>{{$p->material['name']}}</span>--}}
                                    </p>
                                    <span class="notification-type primary-new ">{{number_format($p->getOriginal('pivot_finalPrice'))}}</span>
                                </li>

                                <form action="{{route('shop.order.removeCard' ,[$p->id , (\Illuminate\Support\Facades\Cookie::get('ddtoOrderId')?\Illuminate\Support\Facades\Cookie::get('ddtoOrderId') : -1)] )}}" method="get">
                                    {{csrf_field()}}
                                    <input type="hidden" hidden="hidden" name="color" value="{{$p->getOriginal('pivot_color')}}">
                                    <input type="hidden" name="size" value="{{$p->getOriginal('pivot_size')}}">
                                    <input  type="hidden" name="material" value="{{$p->getOriginal('pivot_material')}}">
                                    {{--                                        <button  type="submit" style="border-radius: 10%; margin-top: 6px" href="#" class="button small dark text-center spaced">افزودن به سبد </button>--}}
                                    <button  type="submit" style="border-radius: 10%; width: 100%" href="{{route('shop.order.removeCard' ,[$p->id, (\Illuminate\Support\Facades\Cookie::get('ddtoOrderId'))?\Illuminate\Support\Facades\Cookie::get('ddtoOrderId') : -1] )}}" class="button small tertiary text-center spaced">حذف از سبد </button>
                                </form>

                            @endforeach
                            <!-- /DROPDOWN ITEM -->


                            <!-- DROPDOWN ITEM -->
                            <li class="dropdown-item">

                                <a href="{{route('shop.order.checkOut' , Illuminate\Support\Facades\Cookie::get('ddtoOrderId'))}}" class="button primary">اتمام خرید </a>
                            </li>
                            <!-- /DROPDOWN ITEM -->
                        </ul>
                        <!-- /DROPDOWN NOTIFICATIONS -->
                    </div>
                </div>
                <!-- /ACCOUNT INFORMATION -->


            </div>

        @endif

    </header>
</div>
<!-- /HEADER -->

<!-- SIDE MENU -->
<div id="mobile-menu" class="side-menu left closed">
    <!-- SVG PLUS -->
    <svg class="svg-plus">
        <use xlink:href="#svg-plus"></use>
    </svg>
    <!-- /SVG PLUS -->

    <!-- SIDE MENU HEADER -->
    <div class="side-menu-header">
        <figure class="logo small">
            <img src="{{asset('front/images/logo-white.png')}}" alt="logo">
        </figure>
    </div>
    <!-- /SIDE MENU HEADER -->

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">لینک های اصلی</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="index.html">صفحه اصلی</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{route('shop.index')}}">فروشگاه</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{route('faq.index')}}">سوالات متداول</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="index.html">وبلاگ </a>
        </li>
        <!-- /DROPDOWN ITEM -->


    </ul>
    <!-- /DROPDOWN -->
</div>
<!-- /SIDE MENU -->

@if(\Illuminate\Support\Facades\Auth::check())
    <!-- SIDE MENU -->
    <div id="account-options-menu" class="side-menu right closed">
        <!-- SVG PLUS -->
        <svg class="svg-plus">
            <use xlink:href="#svg-plus"></use>
        </svg>
        <!-- /SVG PLUS -->

        <!-- SIDE MENU HEADER -->
        <div class="side-menu-header">
            <!-- USER QUICKVIEW -->
            <div class="user-quickview">
                <!-- USER AVATAR -->
                <a href="author-profile.html">
                    <div class="outer-ring">
                        <div class="inner-ring"></div>
                        <figure class="user-avatar">
                            <img src="{{asset('front/images/avatars/avatar_01.jpg')}}" alt="avatar">
                        </figure>
                    </div>
                </a>
                <!-- /USER AVATAR -->

                <!-- USER INFORMATION -->
                <p class="user-name">{{\Illuminate\Support\Facades\Auth::user()->firstName.' '.\Illuminate\Support\Facades\Auth::user()->lastName}}</p>
                <p class="user-money">تومان745.00</p>
                <!-- /USER INFORMATION -->
            </div>
            <!-- /USER QUICKVIEW -->
        </div>
        <!-- /SIDE MENU HEADER -->

        <!-- SIDE MENU TITLE -->
        <p class="side-menu-title">حساب شما</p>
        <!-- /SIDE MENU TITLE -->

        <!-- DROPDOWN -->
        <ul class="dropdown dark hover-effect">
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="dashboard-notifications.html">صفحه پروفایل</a>
            </li>
            <!-- /DROPDOWN ITEM -->
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="dashboard-notifications.html">حریدهای شما</a>
            </li>
            <!-- /DROPDOWN ITEM -->
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="{{route('logout')}}">خروج</a>
            </li>
            <!-- /DROPDOWN ITEM -->

        </ul>
        <!-- /DROPDOWN -->


    </div>
    <!-- /SIDE MENU -->
@else

@endif
<!-- MAIN MENU -->
<div class="main-menu-wrap">
    <div class="menu-bar">
        <nav>
            <ul class="main-menu">
                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="{{route('index')}}">صفحه اصلی</a>
                </li>
                <!-- /MENU ITEM -->
                <li class="menu-item sub">
                    <a href="{{route('shop.index')}}">فروشگاه
                        <svg class="svg-arrow" style="  position: initial;">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </a>
                    <div class="content-dropdown">
                        <!-- FEATURE LIST BLOCK -->
                        <div class="feature-list-block">
                            <h6 class="feature-list-title">انواع محصولات </h6>
                            <hr class="line-separator">
                            <!-- FEATURE LIST -->
                            <ul class="feature-list">
                                @if(isset($categoryList))
                                    @foreach($categoryList as $menuCat)
                                        <!-- FEATURE LIST ITEM -->
                                        <li class="feature-list-item">
                                            <a href="{{route('shop.index.category' , $menuCat->id)}}">{{$menuCat->name}}</a>
                                        </li>
                                        <!-- /FEATURE LIST ITEM -->
                                    @endforeach
                                @endif



                            </ul>
                            <!-- /FEATURE LIST -->


                        </div>
                        <!-- /FEATURE LIST BLOCK -->


                    </div>
                </li>


                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="{{route('faq.index')}}">سوالات متداول</a>
                </li>
                <!-- /MENU ITEM -->

                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="{{route('index')}}">وبلاگ</a>
                </li>
                <!-- /MENU ITEM -->


            </ul>
        </nav>
        <form class="search-form" method="get" action="{{route('search' , -1)}}">
            {{csrf_field()}}
            <input type="text" class="rounded" name="inq" id="search_products" placeholder="جستجوی محصولات">
            <input type="image" src="{{asset('front/images/search-icon.png')}}" alt="search-icon">
        </form>
    </div>
</div>
<!-- /MAIN MENU -->

@yield('content')


<!-- FOOTER -->
<footer>
    <!-- FOOTER TOP -->
    <div id="footer-top-wrap">
        <div id="footer-top">
            <!-- COMPANY INFO -->
            <div class="company-info">
                <figure class="logo small">
                    <img src="{{asset('front/images/logo-white.png')}}" alt="logo-small">
                </figure>
                <p>
                    جایی که رویاهای شما ساخته می شوند
                </p>
                <ul class="company-info-list">
                    <li class="company-info-item">
                        <span class="icon-present"></span>
                        <p><span>{{number_format($footerStat['orderCount'])}}</span> سفارش </p>
                    </li>
                    <li class="company-info-item">
                        <span class="icon-energy"></span>
                        <p><span>{{number_format($footerStat['productCount'])}}</span> محصول </p>
                    </li>
                    <li class="company-info-item">
                        <span class="icon-user"></span>
                        <p><span>{{number_format($footerStat['userCount'])}}</span> کاربر </p>
                    </li>
                </ul>
                <!-- SOCIAL LINKS -->
                <ul class="social-links">
                    <li class="social-link ">
                        <a href="#"></a>
                    </li>

                </ul>
                <!-- /SOCIAL LINKS -->


            </div>
            <!-- /COMPANY INFO -->



            <!-- LINK INFO -->
            <div class="link-info" style="color:white;margin: 0;width: 70%;">
                <p class="footer-title">ثبت نظر </p>
                <!-- LINK LIST -->
                <div class="form-popup-content">
                    <h4 class="popup-title"></h4>
                    <!-- LINE SEPARATOR -->
                    <hr class="line-separator">
                    <!-- /LINE SEPARATOR -->
                    <form id="register-form2" action="{{route('sendComment')}}" method="post">
                        {{csrf_field()}}
                        <label for="name" class="label ">نام و نام خانوادگی</label>
                        <input type="text" id="name" name="name"
                               placeholder="نام کامل ">
                        <label for="phone" class="label ">تلفن</label>
                        <input type="text" id="phone" name="phone"
                               placeholder="تلفن">
                        <label for="msg" class="label ">متن پیام</label>
                        <textarea type="text" id="msg" name="msg"
                        >
                        </textarea>
                        <br>
                        <br>
                        <button class="button mid primary btn-block" style="width: 100%"> ارسال</button>
                    </form>
                </div>
                <!-- /LINK LIST -->
            </div>
            <!-- /LINK INFO -->


        </div>
    </div>
    <!-- /FOOTER TOP -->

    <!-- FOOTER BOTTOM -->
    <div id="footer-bottom-wrap">
        <div id="footer-bottom">
            <p> طراحی و توسعه توسط
                <a href="#">
                    دانیال رومیانی</a>
        </div>
    </div>
    <!-- /FOOTER BOTTOM -->
</footer>
<!-- /FOOTER -->

<div class="shadow-film closed"></div>

<!-- SVG ARROW -->
<svg style="display: none;">
    <symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
        <path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
    </symbol>
</svg>
<!-- /SVG ARROW -->

<!-- SVG STAR -->
<svg style="display: none;">
    <symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">
        <polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751
	2.495,6.313 -0.002,3.878 3.45,3.376 "/>
    </symbol>
</svg>
<!-- /SVG STAR -->

<!-- SVG PLUS -->
<svg style="display: none;">
    <symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
        <rect x="5" width="3" height="13"/>
        <rect y="5" width="13" height="3"/>
    </symbol>
</svg>
<!-- /SVG PLUS -->

<!-- jQuery -->
<script src="{{asset('front/js/vendor/jquery-3.1.0.min.js')}}"></script>
<!-- Tooltipster -->
<script src="{{asset('front/js/vendor/jquery.tooltipster.min.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{asset('front/js/vendor/owl.carousel.min.js')}}"></script>
<!-- Tweet -->
<script src="{{asset('front/js/vendor/twitter/jquery.tweet.min.js')}}"></script>
<!-- Side Menu -->
<script src="{{asset('front/js/side-menu.js')}}"></script>
<!-- Home -->
<script src="{{asset('front/js/home.js')}}"></script>
<!-- Tooltip -->
<script src="{{asset('front/js/tooltip.js')}}"></script>
<!-- User Quickview Dropdown -->
<script src="{{asset('front/js/user-board.js')}}"></script>

<!-- XM Accordion -->
<script src="{{asset('front/js/vendor/jquery.xmaccordion.min.js')}}"></script>
<!-- XM Pie Chart -->
<script src="{{asset('front/js/vendor/jquery.xmpiechart.min.js')}}"></script>
<!-- XM Countdown -->
<script src="{{asset('front/js/vendor/jquery.xmcountdown.min.js')}}"></script>

<!-- XM LineFill -->
<script src="{{asset('front/js/vendor/jquery.xmlinefill.min.js')}}"></script>
<!-- Footer -->
<script src="{{asset('front/js/footer.js')}}"></script>
<script src="{{asset('front/js/badges.js')}}"></script>
<script src="{{asset('front/js/auction-page.js')}}"></script>
<script src="{{asset('front/js/post-tab.js')}}"></script>
<script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
<script>
    jalaliDatepicker.startWatch();
</script>

</body>
</html>
