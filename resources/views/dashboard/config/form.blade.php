@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات سایت</h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile"><i
                                        class="la la-user mr-2"></i> اطلاعات اصلی</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#contact"><i
                                        class="la la-clipboard-list mr-2"></i>  درباره من </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#message"><i class="la la-tasks mr-2"></i>
                                    تجربیات من</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="profile">
                                <div class="pt-4">
                                    <div class="col-lg-12">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="form-validation">
                                                    <form class="form-valide"
                                                          action="{{route('dashboard.config.save')}}"
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            @include('error')
                                                            {{csrf_field()}}
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="firstName">نام
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="firstName" name="firstName"
                                                                               value="{{(isset($config)?$config->firstName : (old('firstName') ? old('firstName') : ''))}}"
                                                                               placeholder=" نام ">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="lastName">نام خانوادگی
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="lastName" name="lastName"
                                                                               value="{{(isset($config)?$config->lastName : (old('lastName') ? old('lastName') : ''))}}"

                                                                               placeholder=" نام خانوادگی">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="email">ایمیل
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="email" name="email"
                                                                               value="{{(isset($config)?$config->email : (old('email') ? old('email') : ''))}}"
                                                                               placeholder="وارد کردن ایمیل">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="phone">تلفن
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="phone" name="phone"
                                                                               value="{{(isset($config)?$config->phone : (old('phone') ? old('phone') : ''))}}"
                                                                               placeholder="تلفن همراه">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="instagram">instagram
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="instagram" name="instagram"
                                                                               value="{{(isset($config)?$config->instagram : (old('instagram') ? old('instagram') : ''))}}"
                                                                               placeholder="instagram">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="telegram">telegram
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="telegram" name="telegram"
                                                                               value="{{(isset($config)?$config->telegram : (old('telegram') ? old('telegram') : ''))}}"
                                                                               placeholder="telegram">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="address">محل سکونت
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="address" name="address"
                                                                               value="{{(isset($config)?$config->address : (old('address') ? old('address') : ''))}}"
                                                                               placeholder="محل سکونت">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="birthday">تاریخ تولد
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">

                                                                        <input data-jdp type="text"
                                                                               class="form-control pdate" id="pcal1"
                                                                               name="birthday"
                                                                               value="{{(isset($config)?$config->birthday : (old('birthday') ? old('birthday') : ''))}}"

                                                                        >
                                                                    </div>
                                                                </div>

                                                            </div>




                                                            <div class="col-xl-12">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="password">عکس
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                   name="image">
                                                                            <label class="custom-file-label">انتخاب
                                                                                فایل</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="about">درباره
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="about"
                                                                                  name="about" rows="5">

                                                                {{(isset($config))?$config->about: (old('about') ? old('about'): '') }}

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn  btn-block btn-success">ثبت
                                                        </button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact">
                                <div class="pt-4">
                                    <div class="col-lg-12">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="form-validation">
                                                    <form class="form-valide"
                                                          action="#"
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            @include('error')
                                                            {{csrf_field()}}
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="firstName">نام
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="firstName" name="firstName"
                                                                               value="{{(isset($config)?$config->firstName : (old('firstName') ? old('firstName') : ''))}}"
                                                                               placeholder=" نام ">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="lastName">نام خانوادگی
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="lastName" name="lastName"
                                                                               value="{{(isset($config)?$config->lastName : (old('lastName') ? old('lastName') : ''))}}"

                                                                               placeholder=" نام خانوادگی">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="email">ایمیل
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="email" name="email"
                                                                               value="{{(isset($config)?$config->email : (old('email') ? old('email') : ''))}}"
                                                                               placeholder="وارد کردن ایمیل">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="phone">تلفن
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="phone" name="phone"
                                                                               value="{{(isset($config)?$config->phone : (old('phone') ? old('phone') : ''))}}"
                                                                               placeholder="تلفن همراه">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="address">محل سکونت
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="address" name="address"
                                                                               value="{{(isset($config)?$config->address : (old('address') ? old('address') : ''))}}"
                                                                               placeholder="محل سکونت">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="birthday">تاریخ تولد
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">

                                                                        <input data-jdp type="text"
                                                                               class="form-control pdate" id="pcal1"
                                                                               name="birthday"
                                                                               value="{{(isset($config)?$config->birthday : (old('birthday') ? old('birthday') : ''))}}"

                                                                        >
                                                                    </div>
                                                                </div>

                                                            </div>




                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="password">عکس
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                   name="image">
                                                                            <label class="custom-file-label">انتخاب
                                                                                فایل</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn  btn-block btn-success">ثبت
                                                        </button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="message">
                                <div class="pt-4">
                                    <div class="col-lg-12">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="form-validation">
                                                    <form class="form-valide"
                                                          action="#"
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            @include('error')
                                                            {{csrf_field()}}
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="firstName">نام
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="firstName" name="firstName"
                                                                               value="{{(isset($config)?$config->firstName : (old('firstName') ? old('firstName') : ''))}}"
                                                                               placeholder=" نام ">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="lastName">نام خانوادگی
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="lastName" name="lastName"
                                                                               value="{{(isset($config)?$config->lastName : (old('lastName') ? old('lastName') : ''))}}"

                                                                               placeholder=" نام خانوادگی">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="email">ایمیل
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="email" name="email"
                                                                               value="{{(isset($config)?$config->email : (old('email') ? old('email') : ''))}}"
                                                                               placeholder="وارد کردن ایمیل">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="phone">تلفن
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="phone" name="phone"
                                                                               value="{{(isset($config)?$config->phone : (old('phone') ? old('phone') : ''))}}"
                                                                               placeholder="تلفن همراه">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="phone">تلفن
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="phone" name="phone"
                                                                               value="{{(isset($config)?$config->phone : (old('phone') ? old('phone') : ''))}}"
                                                                               placeholder="تلفن همراه">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="address">محل سکونت
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="address" name="address"
                                                                               value="{{(isset($config)?$config->address : (old('address') ? old('address') : ''))}}"
                                                                               placeholder="محل سکونت">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="birthday">تاریخ تولد
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">

                                                                        <input data-jdp type="text"
                                                                               class="form-control pdate" id="pcal1"
                                                                               name="birthday"
                                                                               value="{{(isset($config)?$config->birthday : (old('birthday') ? old('birthday') : ''))}}"

                                                                        >
                                                                    </div>
                                                                </div>

                                                            </div>




                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="password">عکس
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                   name="image">
                                                                            <label class="custom-file-label">انتخاب
                                                                                فایل</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn  btn-block btn-success">ثبت
                                                        </button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 ">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">عکس کابر</h4>
                </div>
                <div class="card-body text-center">
                    @if(isset($config))
                        <img class="img-fluid rounded-circle"
                             src="{{asset('storage/images/contacts/'.$config->image)}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('images/profile/profile.png')}}">
                    @endif

                </div>
            </div>
        </div>


    </div>

@endsection
