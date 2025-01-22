@extends('front.layout')

@section('content')

    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2>وبلاگ </h2>
            <p>
                صفحه اصلی

                <span class="separator">/</span>

                <span class="current-section">وبلاگ </span>

                @if(isset($post))
                    <span class="separator">/</span>

                    <span class="current-section">{{$post->title}} </span>
                @endif

            </p>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->

    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section">
            <!-- CONTENT -->
            <div class="content left">
                <!-- POST -->
                <article class="post blog-post">
                    <!-- POST IMAGE -->
                    <div class="post-image">
                        <figure class="product-preview-image large liquid">
                            <img style="height: 480px;width: 830px;" src="{{asset('storage/images/blog/'.'/'.$post->id.'/'.$post->image)}}" alt="{{$post->title}}">
                        </figure>
                    </div>
                    <!-- /POST IMAGE -->

                    <!-- POST CONTENT -->
                    <div class="post-content with-title">
                        <p class="text-header big">{{$post->title}}</p>
                        <div class="meta-line">
                            <a href="#">
                                <p class="category primary">
                                    @foreach($post->Category()->get() as $postcat)

                                        <span style="padding-right: 5px">
                                                        {{$postcat->name}}
                                                    </span>

                                    @endforeach
                                </p>
                            </a>
                            <!-- METADATA -->
                            <div class="metadata">


                                <!-- META ITEM -->
                                <div class="meta-item">
                                    <span class="icon-eye"></span>
                                    <p>{{number_format($post->seen)}}</p>
                                </div>
                                <!-- /META ITEM -->
                            </div>
                            <!-- /METADATA -->
                            <p>
                                {{verta($post->crearted_at)->format('%B %d، %Y')}}
                            </p>
                        </div>
                        <!-- POST PARAGRAPH -->
                        <div class="post-paragraph">
                            {!! html_entity_decode($post->text) !!}

                        </div>
                        <!-- /POST PARAGRAPH -->


                    </div>
                    <!-- /POST CONTENT -->

                    <hr class="line-separator">

                    <!-- SHARE -->
                    <div class="share-links-wrap">
                        <p class="text-header small">به اشتراک بگذارید :</p>
                        <!-- SHARE LINKS -->
                        <ul class="share-links hoverable">
                            <li><a href="#" class="fb"></a></li>
                            <li><a href="#" class="twt"></a></li>
                            <li><a href="#" class="db"></a></li>
                            <li><a href="#" class="rss"></a></li>
                            <li><a href="#" class="gplus"></a></li>
                        </ul>
                        <!-- /SHARE LINKS -->
                    </div>
                    <!-- /SHARE -->
                </article>
                <!-- /POST -->


            </div>
            <!-- CONTENT -->

            <!-- SIDEBAR -->
            <div class="sidebar right">
                <!-- DROPDOWN -->
                <ul class="dropdown hover-effect">
                    @if(isset($cats))
                        @foreach($cats as $cat)
                            <li class="dropdown-item @if(isset($selectedCategory) && $selectedCategory->id == $cat->id) active @endif ">
                                <a href="{{route('blog.categoryPostList' , $cat->id)}}">{{$cat->name}}<span class="item-count">{{count($cat->Blog()->get())}}</span></a>
                            </li>

                        @endforeach
                    @endif

                </ul>
                <!-- /DROPDOWN -->

                <!-- SIDEBAR ITEM -->
                <div class="sidebar-item author-items-v2">
                    <h4>آخرین نوشته ها</h4>
                    <hr class="line-separator">
                    @if(isset($lastPosts) && count($lastPosts)>0 )
                        @foreach($lastPosts as $lastPost)
                            <!-- ITEM PREVIEW -->
                            <div class="item-preview">
                                <a target="_blank" href="{{route('blog.showPost', $lastPost->id)}}">
                                    <figure class="product-preview-image small liquid">
                                        <img style="border-radius:10% " src="{{asset('storage/images/blog/'.$lastPost->id.'/'.$lastPost->image)}}"
                                             alt="{{$lastPost->title}}">
                                    </figure>
                                </a>
                                <a  target="_blank" href="{{route('blog.showPost', $lastPost->id)}}"><p class="text-header small">{{$lastPost->title}}</p></a>
                                <p class="category tiny primary">
                                    @foreach($lastPost->Category()->get() as $lastPostCat)
                                        <a style="padding-right: 5px" href="#">{{$lastPostCat->name}}</a>

                                    @endforeach
                                </p>
                                <!-- METADATA -->
                                <div class="metadata">


                                    <!-- META ITEM -->
                                    <div class="meta-item">
                                        <span class="icon-eye"></span>
                                        <p>{{number_format($lastPost->seen)}}</p>
                                    </div>
                                    <!-- /META ITEM -->
                                </div>
                                <!-- /METADATA -->
                            </div>
                            <!-- /ITEM PREVIEW -->
                        @endforeach

                    @endif

                </div>
                <!-- /SIDEBAR ITEM -->

                <!-- SIDEBAR ITEM -->
                <div class="sidebar-item author-items-v2">
                    <h4> کالاهای محبوب فروشگاه</h4>
                    <hr class="line-separator">
                    @if(isset($hotProducts) && count($hotProducts) > 0)
                        @foreach($hotProducts as $hotProduct)
                            <!-- ITEM PREVIEW -->
                            <div class="item-preview">
                                <a href="{{route('shop.product',$hotProduct->id)}}">
                                    <figure class="product-preview-image small liquid">
                                        <img style="border-radius:10% " src="{{asset('storage/images/products/'.$hotProduct->id.'/'.$hotProduct->image)}}" alt="{{$hotProduct->title}}">
                                    </figure>
                                </a>
                                <a href="{{route('shop.product', $hotProduct->id)}}"><p class="text-header small">{{$hotProduct->name}}</p></a>
                                <p class="category tiny primary">
                                    @foreach($hotProduct->Category()->get() as $pCat)
                                        <a style="padding-right: 5px" href="#">{{$pCat->name}}</a>

                                    @endforeach

                                </p>
                                <!-- METADATA -->
                                <div class="metadata">

                                    <!-- META ITEM -->
                                    <div class="meta-item">
                                        <span class="">{{number_format($hotProduct->BasePrice)}} </span>
                                        <p> تومان</p>
                                    </div>
                                    <!-- /META ITEM -->
                                </div>
                                <!-- /METADATA -->
                            </div>
                            <!-- /ITEM PREVIEW -->
                        @endforeach
                    @endif

                </div>
                <!-- /SIDEBAR ITEM -->


            </div>
            <!-- /SIDEBAR -->
        </div>
    </div>
    <!-- /SECTION -->

@endsection
