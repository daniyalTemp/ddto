@extends('front.layout')
@section('content')
    <!-- Hero section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="hero-inner d-flex">
                <div class="col-left">
                        <span class="sub-heading">دیدیتو
                        </span>
                    <h1 class="heading">دنیای
                        <span>خودت رو بساز</span>
                    </h1>

                    </h4>
                    <p class="paragraph">
                        {{$config->bannerUP}}
                    </p>
                    <div class="btn-blk">
                        <a href="#contact" class="btn btn-blue"> ثبت طرح خاص خود</a>
                        <a href="#portfolio" class="btn btn-black">مشاهده محصولات ها</a>
                    </div>
                    <div class="social">
                        <ul>
                            <li class="social-icon"><a target="_blank" href="{{$config->instagram}}"><img
                                        src="assets/images/social-icons/feather_instagram.svg" alt="instagram"></a>
                            </li>
                            <li class="social-icon"><a href="{{$config->telegram}}"><img
                                        src="assets/images/social-icons/tell.svg" alt="linkedin"></a>
                            </li>
                            <li class="social-icon"><a href="#"><img
                                        src="assets/images/social-icons/feather_github.svg" alt="github"></a>
                            </li>
                            <li class="social-icon"><a href="#"><img
                                        src="assets/images/social-icons/feather_dribbble.svg" alt="dribble"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-right">
                    <img class="image-main"
                         src="assets/images/—Pngtree—3d printing technology printer link_6689630.png"
                         alt="user image">
                    <img class="image-darkmode"
                         src="assets/images/—Pngtree—3d printing technology printer link_6689630.png"
                         alt="user image">
                </div>
            </div>
        </div>
    </section>

    <!-- features -->
    <section class="features">
        <div class="container">
            <div class="features-inner d-grid">
                <div class="feature-item d-flex">
                    <div class="icon d-flex color1">
                        <img src="assets/images/experience.svg" alt="experience">
                    </div>
                    <div>
                        <h3>7 سال</h3>
                        <p>تجربه</p>
                    </div>
                </div>
                <div class="feature-item d-flex">
                    <div class="icon d-flex color2">
                        <img src="assets/images/happy-clients.svg" alt="happy clients ">
                    </div>
                    <div>
                        <h3>73</h3>
                        <p>مشتریان راضی</p>
                    </div>
                </div>
                <div class="feature-item d-flex">
                    <div class="icon d-flex color3">
                        <img src="assets/images/projects-completed.svg" alt="happy clients ">
                    </div>
                    <div>
                        <h3>120+</h3>
                        <p>محصول چاپ شده </p>
                    </div>
                </div>
                <div class="feature-item d-flex">
                    <div class="icon d-flex  color4">
                        <img src="assets/images/awards-won.svg" alt="awards ">
                    </div>
                    <div>
                        <h3>10+</h3>
                        <p>نفر کصخل</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->
    <section class="about ptb-100" id="about">
        <div class="container">
            <div class="about-inner d-flex">
                <div class="about-col-left">
                    <img style="width: 50%;
                        height: 50%;
                        margin-right: 15%;" src="assets/images/1.png" alt="about">
                </div>
                <div class="about-col-right">
                    <h2 class="about-heading">درباره ما</h2>
                    <h3 class="about2">ما کصخلیم هستیم - مرجع کصخلان ململانی</h3>
                    <p class="about3">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                        طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                        شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد </p>
                    <div class="about-btn-blk">
                        <a href="#" class="btn btn-blue about-btn">تماس با ما</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience -->
    <section class="experience ptb-100">
        <div class="container">
            <h2>برای این قسمت ایده بدید </h2>
            <div class="experience-inner d-grid">
                <!-- item -->
                <div class="progressbar-item">
                    <div class="progressbar-content d-flex">
                        <h3>کصخلیت</h3>
                        <h4>95%</h4>
                    </div>
                    <div class="progessbar-bg">
                        <div class="progressbar-size" style="width:95%">

                        </div>
                    </div>
                </div>
                <!-- item -->
                <div class="progressbar-item">
                    <div class="progressbar-content d-flex">
                        <h3>بگایی</h3>
                        <h4>85%</h4>
                    </div>
                    <div class="progessbar-bg">
                        <div class="progressbar-size" style="width:85%">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="services ptb-100" id="services">
        <div class="container">
            <h2>آنچه ارائه می دهیم</h2>
            <div class="services-inner d-grid">
                @foreach($config->presents as $item)
                    <!-- item -->
                    <div class="services-block">
                        <div class="service-icon color1 d-flex">
                            <img width="40px" height="40px" src="assets/images/services/{{$item['pic']}}"
                                 alt="ui design">
                        </div>
                        <h3>{{$item['name']}}</h3>
                        <p>
                            {{$item['des']}}
                        </p>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
    <!-- CTA -->
    <section class="cta">
        <div class="container">
            <div class="cta-inner d-flex">
                <div class="cta-content">
                    <h3>آیامحصول خاصی در ذهن دارید؟</h3>
                    <p>نیازمندی های خود بیان کنید و به نمونه چاپ شده را برای اولین بار در دنیا خاص خودتان داشته
                        باشید </p>
                </div>
                <a href="#contact" class="btn btn-default ">ثبت سفارش خاص</a>
            </div>
        </div>
    </section>
    <!-- projects -->
    <section class="projects ptb-100" id="portfolio">
        <div class="container">
            <h2>نمونه کار‌های چاپ شده</h2>
            <div class="projects-inner d-grid">
                @if(isset($products) && count($products))
                    @foreach($products as $product)

                        <!-- item -->
                        <div class="project-item">
                            <div class="project-image">
                                <img src="{{asset('storage/images/products/'.$product->id.'/'.$product->image)}}"
                                     alt="{{$product->name}}">
                            </div>
                            <div class="project-content">
                                <h3>{{$product->name}}
                                    - <span>{{$product->Category()->get()->first()->name}}</span>

                                </h3>
                                <div class="project-view d-flex" style="justify-content: space-between">

                                    <span>
                                        رنگ ها
                                    </span>

                                    <span>
                                        سایز ها
                                    </span>

                                    <span>
                                        متریال
                                    </span>

                                </div>


                                <div class="project-view d-flex">

                                    <span>
                                        <br>
                                        @foreach($product->color as $color)
                                            <div
                                                  style="
                                                  color: {{$color['color']}};
                                                  margin-left: 5px;
                                                  border: 8px solid;
                                                  border-radius: 50%;">

                                            </div>
                                        @endforeach
                                    </span>
                                    <span>

                                          @foreach($product->size as $size)
                                            <span href="#" class="footer-social" > <i>{{$size['name']}}</i></span>
                                    @endforeach
                                    </span>
                                    <span>
                                          @foreach($product->material as $material)
                                            <span href="#" style="border: #0b0d17;" class="footer-social" > <i>{{$material['name']}}</i></span>
                                        @endforeach
                                    </span>


                                </div>
                                <br>
                                <div class="project-view d-flex">


                                    <a data-toggle="modal" data-target="#show{{$product->id}}"
                                       class="btn-view" style="flex-grow: 10">مشاهده </a>
                                </div>
                            </div>
                        </div>


                        <!-- Project view modal -->
                        <div class="modal-container">
                            <div class="modal" id="show{{$product->id}}">
                                <div class="modal-image">
                                    <img src="assets/images/projects/1.jpg" alt="image">
                                </div>
                                <div class="modal-content">

                                    <h3>{{$product->name}}</h3>
                                    <p class="requirments">
                                        {{$product->description}}
                                    </p>

                                    <ul>
                                        <li><span>رنگ های موجود:-</span> HTML, CSS, BOOTSTRAP 4, JAVASCRIPT, FIGMA,
                                            PHOTOSHOP
                                        </li>
                                        <li><span>سایز های موجود:-</span> HTML, CSS, BOOTSTRAP 4, JAVASCRIPT, FIGMA,
                                            PHOTOSHOP
                                        </li>
                                        <li><span>متریال  موجود:-</span> HTML, CSS, BOOTSTRAP 4, JAVASCRIPT, FIGMA,
                                            PHOTOSHOP
                                        </li>

                                    </ul>

                                    <div class="close-btn">
                                        <a href="javascript:void(0)" class="btn btn-blue close-modal">بستن</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif


            </div>
            <div class="view-more-block">
                <a href="#" class="btn btn-outline">مشاهده فروشگاه</a>
            </div>
        </div>
    </section>
    <!-- Testmonial -->
    <section class="testmonial">
        <div class="container">
            <div class="testmonial-inner">
                <h2>مشتریان راضی </h2>
                <div class="testmonial-slider owl-carousel owl-theme">
                    <!-- item -->
                    <div class="testmonial-item">
                        <h3>نام پروژه</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد </p>
                        <div class="client-data d-flex">
                            <img src="assets/images/client-1.png" alt="client thumb">
                            <h4>نام مشتری
                                <br> <span>سمت مشتری</span>
                            </h4>

                        </div>
                    </div>
                    <!-- item -->
                    <div class="testmonial-item">
                        <h3>نام پروژه</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد </p>
                        <div class="client-data d-flex">
                            <img src="assets/images/client-2.png" alt="client thumb">
                            <h4>نام مشتری
                                <br> <span>سمت مشتری</span>
                            </h4>

                        </div>
                    </div>
                    <!-- item -->
                    <div class="testmonial-item">
                        <h3>نام پروژه</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد </p>
                        <div class="client-data d-flex">
                            <img src="assets/images/client-1.png" alt="client thumb">
                            <h4>نام مشتری
                                <br> <span>سمت مشتری</span>
                            </h4>

                        </div>
                    </div>
                    <div class="testmonial-item">
                        <h3>نام پروژه</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد </p>
                        <div class="client-data d-flex">
                            <img src="assets/images/client-2.png" alt="client thumb">
                            <h4>نام مشتری
                                <br> <span>سمت مشتری</span>
                            </h4>

                        </div>
                    </div>
                    <!-- item -->
                    <div class="testmonial-item">
                        <h3>نام پروژه</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد </p>
                        <div class="client-data d-flex">
                            <img src="assets/images/client-1.png" alt="client thumb">
                            <h4>نام مشتری
                                <br> <span>سمت مشتری</span>
                            </h4>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Contact Me -->
    <section class="contact ptb-100" id="contact">
        <div class="container">
            <h2>تماس با ما</h2>
            <div style="display: grid;grid-template-columns: 1fr  1fr;">


                <form id="basic-form" action="" method="post">
                    <div class="contact-inner d-flex">
                        <div class="input-block form-item">
                            <label for="">نام</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="input-block form-item">
                            <label for="">فامیل</label>
                            <input type="text" name="family" required>
                        </div>
                        <div class="input-block form-item">
                            <label for="">ایمیل</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="input-block form-item">
                            <label for="">تلفن</label>
                            <input type="text" name="phone" required>
                        </div>

                        <div class="textarea form-item">
                            <label for="">پیام شما</label>
                            <textarea name="" id="" required></textarea>
                        </div>
                        <div class="submit-btn form-item">
                            <button type="submit" value="submit" class="btn btn-blue"> ارسال پیام</button>

                        </div>
                    </div>
                </form>


            </div>


        </div>

        </div>
    </section>
@endsection
