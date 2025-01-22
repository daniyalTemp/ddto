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
                @if(isset($selectedCategory))
                    <span class="separator">/</span>

                    <span class="current-section">{{$selectedCategory->name}} </span>
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
                <!-- BLOG POST PREVIEW -->
                <div class="blog-post-preview v2">

                    @if(isset($blogs) && count($blogs)>0)

                        @foreach($blogs as $blog)
                            <!-- BLOG POST PREVIEW ITEM -->
                            <div class="blog-post-preview-item">
                                <a href="{{route('blog.showPost' , $blog->id)}}">
                                    <figure class="product-preview-image large">
                                        <img style="height: 480px;width: 830px;"
                                             src="{{asset('storage/images/blog/'.$blog->id.'/'.$blog->image)}}"
                                             alt="{{$blog->title}}">
                                    </figure>
                                </a>
                                <!-- BLOG POST PREVIEW ITEM INFO -->
                                <div class="blog-post-preview-item-info">
                                    <p class="text-header big">
                                        <a href="{{route('blog.showPost' , $blog->id)}}">{{$blog->title}}</a>
                                    </p>
                                    <div class="meta-line">
                                        <a href="{{route('blog.showPost' , $blog->id)}}">
                                            <p class="category primary">
                                                @foreach($blog->Category()->get() as $blogcat)

                                                    <span style="padding-right: 5px">
                                                        {{$blogcat->name}}
                                                    </span>

                                                @endforeach


                                            </p>
                                        </a>
                                        <!-- METADATA -->
                                        <div class="metadata">

                                            <!-- META ITEM -->
                                            <div class="meta-item">
                                                <span class="icon-eye"></span>
                                                <p>{{number_format($blog->seen)}}</p>
                                            </div>
                                            <!-- /META ITEM -->
                                        </div>
                                        <!-- /METADATA -->
                                        <p>
                                            {{verta($blog->crearted_at)->format('%B %d، %Y')}}
                                        </p>
                                    </div>
                                    <p class="description-preview">
                                        {{\Illuminate\Support\Str::limit(html_entity_decode($blog->text) )}}
                                    </p>
                                    <a style="float: left" href="{{route('blog.showPost' , $blog->id)}}"
                                       class="button dark-light more-button">بیشتر بدانید</a>
                                </div>
                                <!-- /BLOG POST PREVIEW ITEM INFO -->
                            </div>
                            <!-- /BLOG POST PREVIEW ITEM -->
                        @endforeach
                    @endif


                </div>
                <!-- /BLOG POST PREVIEW -->

                {{--                <!-- PAGER -->--}}
                {{--                <div class="pager primary">--}}
                {{--                    <div class="pager-item"><p>1</p></div>--}}
                {{--                    <div class="pager-item active"><p>2</p></div>--}}
                {{--                    <div class="pager-item"><p>3</p></div>--}}
                {{--                    <div class="pager-item"><p>...</p></div>--}}
                {{--                    <div class="pager-item"><p>17</p></div>--}}
                {{--                </div>--}}
                {{--                <!-- /PAGER -->--}}
            </div>
            <!-- CONTENT -->

            <!-- SIDEBAR -->
            <div class="sidebar right">
                <!-- DROPDOWN -->
                <ul class="dropdown hover-effect">
                    @if(isset($cats))
                        @foreach($cats as $cat)
                            <li class="dropdown-item @if(isset($selectedCategory) && $selectedCategory->id == $cat->id) active @endif ">
                                <a href="{{route('blog.categoryPostList' , $cat->id)}}">{{$cat->name}}<span
                                        class="item-count">{{count($cat->Blog()->get())}}</span></a>
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
                                        <img style="border-radius:10% "
                                             src="{{asset('storage/images/blog/'.$lastPost->id.'/'.$lastPost->image)}}"
                                             alt="{{$lastPost->title}}">
                                    </figure>
                                </a>
                                <a target="_blank" href="{{route('blog.showPost', $lastPost->id)}}"><p
                                        class="text-header small">{{$lastPost->title}}</p></a>
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
                                        <img style="border-radius:10% "
                                             src="{{asset('storage/images/products/'.$hotProduct->id.'/'.$hotProduct->image)}}"
                                             alt="{{$hotProduct->title}}">
                                    </figure>
                                </a>
                                <a href="{{route('shop.product', $hotProduct->id)}}"><p
                                        class="text-header small">{{$hotProduct->name}}</p></a>
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
