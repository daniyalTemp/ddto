@extends('front.layout')

@section('content')

    <!-- BANNER -->
    <div class="banner-wrap">
        <section class="banner">
            <h5>خوش آمدید به </h5>
            <h1>دنیای دلخواه <span>تو</span></h1>
            <p>
                جایی که رویاهای شما ساخته می شوند
            </p>
            <img src="{{asset('front/images/top_items.png')}}" alt="banner-img">

            <!-- SEARCH WIDGET -->
            <div class="search-widget">
                <form class="search-widget-form" method="get"  action="{{route('search' )}}">
                    <input type="text" name="inq" placeholder="جستجوی محصولات و یا خدمات">
                    <label for="categories" class="select-block">
                        <select name="categories" id="categories">
                            <option value="-1">تمام دسته بندیها</option>
                            @if(isset($categoryList))
                                @foreach($categoryList as $searchCat)
                                    <option value="{{$searchCat->id}}">{{$searchCat->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </label>
                    <button class="button medium dark">جستجو</button>
                </form>
            </div>
            <!-- /SEARCH WIDGET -->
        </section>
    </div>
    <!-- /BANNER -->
    <div style="padding-top: 2.5%;">


        <!-- PROMO -->
        <div class="promo-banner dark left">
        <span class="icon-bag" style="color: #16ffd8;
                      top: 53px;
                      font-size: 50px;
                      left: 25px;
                      position: absolute;
                      left: 48%;"></span>
            <h5>محصولات متنوع ما</h5>
            <h1>در <span>دیدیتو</span></h1>
            <a href="{{route('shop.index')}}" class="button medium primary">از فروشگاه دیدن کنید</a>
        </div>
        <!-- /PROMO -->

        <!-- PROMO -->
        <div class="promo-banner secondary right">
            <span class="icon-tag"></span>
            <h5>ساختن کردن هر چیزی که شما می خواهید</h5>
            <h1>شروع کنیم؟</h1>
            <a href="#" class="button medium dark">به ما بگید</a>
        </div>
        <!-- /PROMO -->
    </div>
    <!-- SERVICES -->
    <div id="services-wrap" style="  padding-top: 15%;">
        <section id="services">
            <!-- SERVICE LIST -->
            <div class="service-list column4-wrap">
                <!-- SERVICE ITEM -->
                <div class="service-item column">
                    <div class="circle medium gradient"></div>
                    <div class="circle white-cover"></div>
                    <div class="circle dark">
                        <span class="icon-present"></span>
                    </div>
                    <h3>خرید محصولات خاص</h3>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ. و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                </div>
                <!-- /SERVICE ITEM -->

                <!-- SERVICE ITEM -->
                <div class="service-item column">
                    <div class="circle medium gradient"></div>
                    <div class="circle white-cover"></div>
                    <div class="circle dark">
                        <span class="icon-diamond"></span>
                    </div>
                    <h3>ساخت مخصول دلخواه</h3>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ. و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                </div>
                <!-- /SERVICE ITEM -->

                <!-- SERVICE ITEM -->
                <div class="service-item column">
                    <div class="circle medium gradient"></div>
                    <div class="circle white-cover"></div>
                    <div class="circle dark">
                        <span class="icon-like"></span>
                    </div>
                    <h3>کنترل محصولات</h3>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ. و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                </div>
                <!-- /SERVICE ITEM -->

                <!-- SERVICE ITEM -->
                <div class="service-item column">
                    <div class="circle medium gradient"></div>
                    <div class="circle white-cover"></div>
                    <div class="circle dark">
                        <span class="icon-wallet"></span>
                    </div>
                    <h3>تخفیف های متنوع</h3>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ. و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                </div>
                <!-- /SERVICE ITEM -->
            </div>
            <!-- /SERVICE LIST -->
            <div class="clearfix"></div>
        </section>
    </div>
    <!-- /SERVICES -->


    <div class="clearfix"></div>



    <!-- PRODUCT SIDESHOW -->
    <div id="product-sideshow-wrap">
        <div id="product-sideshow">
            <!-- PRODUCT SHOWCASE -->
            <div class="product-showcase">
                <!-- HEADLINE -->
                <div class="headline primary">
                    <h4>جدیدترین محصولات</h4>
                    <!-- SLIDE CONTROLS -->
                    <div class="slide-control-wrap">
                        <div class="slide-control left">
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </div>

                        <div class="slide-control right">
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </div>
                    </div>
                    <!-- /SLIDE CONTROLS -->
                </div>
                <!-- /HEADLINE -->

                <!-- PRODUCT LIST -->
                <div id="pl-1" class="product-list grid column4-wrap owl-carousel">
{{--@dd(is_null($hotProducts))--}}
                        @if(count($newProducts)>0)
                            @foreach($newProducts as $nProduct)
                                <!-- PRODUCT ITEM -->
                                <div class="product-item column">
                                    <!-- PRODUCT PREVIEW ACTIONS -->
                                    <div class="product-preview-actions">
                                        <!-- PRODUCT PREVIEW IMAGE -->
                                        <figure class="product-preview-image">
                                            <img style="width: 258px;
                                            height: 150px; "
                                                 src="{{asset('storage/images/products/'.$nProduct->id.'/'.$nProduct->image)}}"
                                                 alt="{{$nProduct->name}}">
                                        </figure>
                                        <!-- /PRODUCT PREVIEW IMAGE -->

                                        <!-- PREVIEW ACTIONS -->
                                        <div class="preview-actions ">
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action" style="  right: 110px;">
                                                <a href="{{route('shop.product' , $nProduct->id)}}">
                                                    <div class="circle tiny primary">
                                                        <span class="icon-tag"></span>
                                                    </div>
                                                </a>
                                                <a href="{{route('shop.product' , $nProduct->id)}}" >
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
                                        <a href="#">
                                            <p class="text-header">{{$nProduct->name}}</p>
                                        </a>
                                        <p class="product-description">
                                            @foreach($nProduct->material as $material)
                                                <span>{{$material['name']}}</span>
                                            @endforeach
                                        </p>
                                        <a href="shop-gridview-v1.html">
                                            <p class="category primary">{{$nProduct->Category()->get()->first()->name}}</p>
                                        </a>
                                        <p class="price">

                                            {{number_format($nProduct->BasePrice)}}
                                            <span>تومان</span>

                                        </p>
                                    </div>
                                    <!-- /PRODUCT INFO -->
                                    <hr class="line-separator">

                                    <!-- USER RATING -->
                                    <div class="user-rating">
                                        <a href="author-profile.html">
                                            @foreach($nProduct->color as $color)

                                                <figure class="user-avatar small">
                                                    <div
                                                        style="border: solid 1px;border-radius: 50%;border-color: #0c0c0c;height: 20px;background-color: {{$color['color']}}"></div>
                                                </figure>
                                            @endforeach
                                        </a>
                                        <p class="price" style="padding-top: 2px">
                                            @foreach($nProduct->size as $size)
                                                <span
                                                    style="border: solid 1px;border-color: #0ae7c2;border-radius: 30%;">{{$size['name']}}</span>
                                            @endforeach


                                        </p>

                                    </div>
                                    <!-- /USER RATING -->
                                </div>
                                <!-- /PRODUCT ITEM -->

                            @endforeach
                        @endif



                </div>
                <!-- /PRODUCT LIST -->


            </div>
            <!-- /PRODUCT SHOWCASE -->

            <!-- PRODUCT SHOWCASE -->
            <div class="product-showcase">
                <!-- HEADLINE -->
                <div class="headline">
                    <h4>پرفروش ترین محصولات</h4>
                    <!-- SLIDE CONTROLS -->
                    <div class="slide-control-wrap">
                        <div class="slide-control left">
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </div>

                        <div class="slide-control right">
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </div>
                    </div>
                    <!-- /SLIDE CONTROLS -->
                </div>
                <!-- /HEADLINE -->

                <!-- PRODUCT LIST -->
                <div id="pl-5" class="product-list grid column4-wrap owl-carousel">


                        @if(count($hotProducts)>0)
                            @foreach($hotProducts as $hotProducts)
                                <!-- PRODUCT ITEM -->
                                <div class="product-item column">
                                    <!-- PRODUCT PREVIEW ACTIONS -->
                                    <div class="product-preview-actions">
                                        <!-- PRODUCT PREVIEW IMAGE -->
                                        <figure class="product-preview-image">
                                            <img style="width: 258px;
                                            height: 150px; "
                                                 src="{{asset('storage/images/products/'.$hotProducts->id.'/'.$hotProducts->image)}}"
                                                 alt="{{$hotProducts->name}}">
                                        </figure>
                                        <!-- /PRODUCT PREVIEW IMAGE -->

                                        <!-- PREVIEW ACTIONS -->
                                        <div class="preview-actions ">
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action" style="  right: 110px;">
                                                <a href="{{route('shop.product' , $hotProducts->id)}}">
                                                    <div class="circle tiny primary">
                                                        <span class="icon-tag"></span>
                                                    </div>
                                                </a>
                                                <a href="{{route('shop.product' , $hotProducts->id)}}" >
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
                                        <a href="#">
                                            <p class="text-header">{{$hotProducts->name}}</p>
                                        </a>
                                        <p class="product-description">
                                            @foreach($hotProducts->material as $material)
                                                <span>{{$material['name']}}</span>
                                            @endforeach
                                        </p>
                                        <a href="shop-gridview-v1.html">
                                            <p class="category tertiary">{{$hotProducts->Category()->get()->first()->name}}</p>
                                        </a>
                                        <p class="price">

                                            {{number_format($hotProducts->BasePrice)}}
                                            <span>تومان</span>

                                        </p>
                                    </div>
                                    <!-- /PRODUCT INFO -->
                                    <hr class="line-separator">

                                    <!-- USER RATING -->
                                    <div class="user-rating">
                                        <a href="author-profile.html">
                                            @foreach($hotProducts->color as $color)

                                                <figure class="user-avatar small">
                                                    <div
                                                        style="border: solid 1px;border-radius: 50%;border-color: #0c0c0c;height: 20px;background-color: {{$color['color']}}"></div>
                                                </figure>
                                            @endforeach
                                        </a>
                                        <p class="price" style="padding-top: 2px">
                                            @foreach($hotProducts->size as $size)
                                                <span
                                                    style="border: solid 1px;border-color: #0ae7c2;border-radius: 30%;">{{$size['name']}}</span>
                                            @endforeach


                                        </p>

                                    </div>
                                    <!-- /USER RATING -->
                                </div>
                                <!-- /PRODUCT ITEM -->

                            @endforeach
                        @endif

                </div>
                <!-- PRODUCT LIST -->
            </div>
            <!-- PRODUCT SHOWCASE -->
        </div>
    </div>
    <!-- /PRODUCTS SIDESHOW -->


    <!-- SUBSCRIBE BANNER -->
    <div id="subscribe-banner-wrap">
        <div id="subscribe-banner">
            <!-- SUBSCRIBE CONTENT -->
            <div class="subscribe-content">
                <!-- SUBSCRIBE HEADER -->
                <div class="subscribe-header">
                    <figure>
                        <img src="{{asset('front/images/news_icon.png')}}" alt="subscribe-icon">
                    </figure>
                    <p class="subscribe-title">تخفیف ها رو از دست ندید</p>
                    <p>شمارتو برامون بزار</p>
                </div>
                <!-- /SUBSCRIBE HEADER -->

                <!-- SUBSCRIBE FORM -->
                <form class="subscribe-form" method="post" action="{{route('addPhone')}}">
                    {{csrf_field()}}
                    <input type="text" name="phone" id="phone" placeholder="شماره تلفن">
                    <button class="button medium dark">ثبت</button>
                </form>
                <!-- /SUBSCRIBE FORM -->
            </div>
            <!-- /SUBSCRIBE CONTENT -->
        </div>
    </div>
    <!-- /SUBSCRIBE BANNER -->
@endsection
