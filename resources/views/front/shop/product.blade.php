@extends('front.layout')
@section('content')

    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap v2">
        <div class="section-headline">
            <h2>{{$product->name}}</h2>
            <p>صفحه اصلی<span class="separator">/</span>محصولات<span class="separator">/</span><span
                    class="current-section">{{$product->Category()->get()->first()->name}}</span></p>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->

    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section">
            <!-- SIDEBAR -->
            <div class="sidebar right">
                <!-- SIDEBAR ITEM -->
                <div class="sidebar-item void buttons">
                    @if($product->available)
                        <a href="#" class="button big dark purchase " style="text-align: center">
                            هم اکنون بخرید!
                        </a>
                    @else
                        <a href="#" class="button big tertiary " style="text-align: center">

                            کالای موجود نیست
                        </a>
                    @endif

                </div>
                <!-- /SIDEBAR ITEM -->


                <!-- SIDEBAR ITEM -->
                <div class="sidebar-item product-info" +>
                    <h4>اطلاعات محصول</h4>
                    <hr class="line-separator">
                    <!-- INFORMATION LAYOUT -->
                    <div class="information-layout">
                        <!-- INFORMATION LAYOUT ITEM -->
                        <div class="information-layout-item">
                            <p class="text-header">رنگبندی :</p>
                            <p>
                            <ul class="share-links">
                                @foreach($product->color as $color)

                                    <ul class="share-links" style="float: left">
                                        <li><a href="#"
                                               style="border: 1px solid;border-color: #0c0c0c;background-color: {{$color['color']}};margin-left: 4px"></a>
                                        </li>
                                    </ul>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                        <!-- /INFORMATION LAYOUT ITEM -->

                        <!-- INFORMATION LAYOUT ITEM -->
                        <div class="information-layout-item">
                            <p class="text-header">سایزبندی :</p>
                            <p> @foreach($product->size as $size)

                                <ul class="share-links" style="float: left">
                                    <li style="border: 0px solid;border-color: #0f4f99;border-radius:30%;
                                    background-color:#d4eaea
                                    ;margin-left: 4px">
                                        {{$size['name']}}
                                    </li>
                                </ul>
                                @endforeach
                                </ul></p>
                        </div>
                        <!-- /INFORMATION LAYOUT ITEM -->

                        <!-- INFORMATION LAYOUT ITEM -->
                        <div class="information-layout-item">
                            <p class="text-header">جنس :</p>
                            <p>
                            @foreach($product->material as $material)

                                <ul class="share-links" style="float: left">
                                    <li style="border: 0px solid;border-color: #0f4f99;border-radius:30%;
                                    background-color:#d4eaea
                                    ;margin-left: 4px">
                                        {{$material['name']}}
                                    </li>
                                </ul>
                                @endforeach
                                </p>
                        </div>
                        <!-- /INFORMATION LAYOUT ITEM -->

                        <!-- INFORMATION LAYOUT ITEM -->
                        <div class="information-layout-item">
                            <p class="text-header">دسته بندی :</p>
                            <p>{{$product->Category()->get()->first()->name}}</p>
                        </div>
                        <!-- /INFORMATION LAYOUT ITEM -->

                        <!-- INFORMATION LAYOUT ITEM -->
                        <div class="information-layout-item">
                            <p class="text-header">وزن :</p>
                            <p>{{$product->weight}} گرم </p>
                        </div>
                        <!-- /INFORMATION LAYOUT ITEM -->
                    </div>
                    <!-- INFORMATION LAYOUT -->
                </div>
                <!-- /SIDEBAR ITEM -->

            </div>
            <!-- /SIDEBAR -->

            <!-- CONTENT -->
            <div class="content left">
                <!-- POST -->
                <article class="post">
                    <!-- POST IMAGE -->
                    <div class="post-image">
                        <figure class="product-preview-image large liquid">
                            <img src="{{asset('storage/images/products/'.$product->id.'/'.$product->image)}}"
                                 style="width: 830px;height: 480px;" alt="">
                        </figure>
                        <!-- IMAGE OVERLAY -->
                        <div class="image-overlay img-gallery">

                        </div>
                        <!-- /IMAGE OVERLAY -->
                    </div>
                    <!-- /POST IMAGE -->

                    <!-- POST CONTENT -->
                    <div class="post-content">
                        <!-- POST PARAGRAPH -->
                        <div class="post-paragraph">
                            <h3 class="post-title">{{$product->name}}</h3>
                            <p>

                                {!! html_entity_decode($product->description) !!}
                                {{--                                @include('front.shop.productsDes.'.$product->id)--}}
                            </p>
                        </div>
                        <!-- /POST PARAGRAPH -->


                        <hr class="line-separator">
                    </div>
                </article>
                <!-- /POST -->


            </div>
            <!-- CONTENT -->
        </div>
    </div>
    <!-- /SECTION -->
@endsection
