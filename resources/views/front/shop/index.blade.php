@extends('front.layout')
@section('content')

    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap ">
        <div class="section-headline">
            <h2>محصولات</h2>
            <p>صفحه اصلی<span class="separator">/</span><span class="current-section">محصولات</span></p>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->
    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section">
            <!-- CONTENT -->
            <div class="content">
                <!-- HEADLINE -->
                <div class="headline tertiary">
                    <h4>
                        <span>"{{count($products)}}"
                        </span>
                        محصول پیدا شده
                    </h4>


                    <div class="clearfix"></div>
                </div>
                <!-- /HEADLINE -->

                <!-- PRODUCT SHOWCASE -->
                <div class="product-showcase">
                    <!-- PRODUCT LIST -->
                    <div class="product-list grid column3-4-wrap">

                        @if(isset($products) && count($products)>0)
                            @foreach($products as $product)
                                <!-- PRODUCT ITEM -->
                                <div class="product-item column">
                                    <!-- PRODUCT PREVIEW ACTIONS -->
                                    <div class="product-preview-actions">
                                        <!-- PRODUCT PREVIEW IMAGE -->
                                        <figure class="product-preview-image">
                                            <img style="width: 258px;
                                            height: 150px; " src="{{asset('storage/images/products/'.$product->id.'/'.$product->image)}}" alt="{{$product->name}}">
                                        </figure>
                                        <!-- /PRODUCT PREVIEW IMAGE -->

                                        <!-- PREVIEW ACTIONS -->
                                        <div class="preview-actions " >
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action" style="  right: 110px;">
                                                <a href="{{route('shop.product' , $product->id)}}">
                                                    <div class="circle tiny primary">
                                                        <span class="icon-tag"></span>
                                                    </div>
                                                </a>
                                                <a href="{{route('shop.product' , $product->id)}}" " >
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
                                        <a >
                                            <p class="text-header">{{$product->name}}</p>
                                        </a>
                                        <p class="product-description">
                                            @foreach($product->material as $material)
                                                <span>{{$material['name']}}</span>
                                            @endforeach
                                        </p>
                                        <a >
                                            <p class="category primary tertiary">{{$product->Category()->get()->first()->name}}</p>
                                        </a>
                                        <p class="price">

                                            {{number_format($product->BasePrice)}}
                                            <span>تومان</span>

                                        </p>
                                    </div>
                                    <!-- /PRODUCT INFO -->
                                    <hr class="line-separator">

                                    <!-- USER RATING -->
                                    <div class="user-rating">
                                        <a href="author-profile.html">
                                            @foreach($product->color as $color)

                                                <figure class="user-avatar small">
                                                    <div style="border: solid 1px;border-radius: 50%;border-color: #0c0c0c;height: 20px;background-color: {{$color['color']}}"></div>
                                                </figure>
                                            @endforeach
                                        </a>
                                        <p class="price" style="padding-top: 2px">
                                            @foreach($product->size as $size)
                                                <span style="border: solid 1px;border-color: #0ae7c2;border-radius: 30%;">{{$size['name']}}</span>
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

                <div class="clearfix"></div>

{{--                <!-- PAGER -->--}}
{{--                <div class="pager tertiary">--}}
{{--                    <div class="pager-item active" >--}}
{{--                        <p>1</p>--}}
{{--                    </div>--}}
{{--                    <div class="pager-item">--}}
{{--                        <p>2</p>--}}
{{--                    </div>--}}
{{--                    <div class="pager-item">--}}
{{--                        <p>3</p>--}}
{{--                    </div>--}}
{{--                    <div class="pager-item">--}}
{{--                        <p>...</p>--}}
{{--                    </div>--}}
{{--                    <div class="pager-item">--}}
{{--                        <p>17</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /PAGER -->--}}
            </div>
            <!-- CONTENT -->

            <!-- SIDEBAR -->
            <div class="sidebar">
                <!-- DROPDOWN -->
                <ul class="dropdown hover-effect tertiary">
                    @if(isset($cats) && count($cats)>0)
                        @foreach($cats as $cat)
                            <li class="dropdown-item ">
                                <a   href="#">{{$cat->name}}
                                <span style="float: left;padding-left: 5%;font-size: smaller">{{count($cat->Products()->get())}}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif


                </ul>
                <!-- /DROPDOWN -->


            </div>
            <!-- /SIDEBAR -->
        </div>
    </div>
    <!-- /SECTION -->
@endsection
