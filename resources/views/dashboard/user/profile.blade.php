@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات کابر</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide"
                              action="{{route('dashboard.user.saveProfile' , isset($user)? $user->id :-1)}}"
                              enctype="multipart/form-data" method="post">
                            <div class="row ">

                                @include('error')
                                {{csrf_field()}}
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="firstName">نام
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="firstName" name="firstName"
                                                   value="{{(isset($user)?$user->firstName : (old('firstName') ? old('firstName') : ''))}}"
                                                   placeholder="وارد کردن نام ">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="lastName">نام خانوادگی
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="lastName" name="lastName"
                                                   value="{{(isset($user)?$user->lastName : (old('lastName') ? old('lastName') : ''))}}"
                                                   placeholder="وارد کردن نام خانوادگی ">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="email">نام کاربری(ایمیل)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="email" name="email"
                                                   value="{{(isset($user)?$user->email : (old('email') ? old('email') : ''))}}"
                                                   readonly
                                                   placeholder="وارد کردن نام کاربری(ایمیل)">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="password">رمز عبور
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder=" وارد کردن رمز عبور(در صورت نیاز به تغییر)">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="NationalCode">کد ملی
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="NationalCode"
                                                   name="NationalCode"
                                                   value="{{(isset($user)?$user->NationalCode : (old('NationalCode') ? old('NationalCode') : ''))}}"
                                                   readonly
                                                   placeholder="کد ملی ">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="cardNumber">شماره کارت
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                                   value="{{(isset($user)?$user->cardNumber : (old('cardNumber') ? old('cardNumber') : ''))}}"

                                                   placeholder="شماره کارت ">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center"
                                               for="sex">جنسیت

                                        </label>
                                        <div class="col-lg-6">

                                            <select id="single-select" name="sex"
                                                    class="col-12">
                                                <option
                                                    {{((isset($user) && $user->sex=='M' )?'selected' : '')}} value="M">
                                                    مرد
                                                </option>
                                                <option
                                                    {{((isset($user) && $user->sex=='F' )?'selected' : '')}} value="F">
                                                    زن
                                                </option>

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center"
                                               for="birthday">تاریخ تولد

                                        </label>
                                        <div class="col-lg-6">

                                            <input data-jdp type="text"
                                                   class="form-control pdate" id="pcal1"
                                                   name="birthday"
                                                   value="{{(isset($user)?$user->birthday : (old('birthday') ? old('birthday') : ''))}}"

                                            >
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="wallet">موچودی کیف
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="NationalCode"
                                                   name="wallet"
                                                   value="{{(isset($user)?$user->wallet : (old('wallet') ? old('wallet') : ''))}}"
                                                   readonly
                                            >
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="image">عکس پروفایل
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">انتخاب فایل</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn  btn-block btn-success">ثبت</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 ">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">عکس کابر</h4>
                </div>
                <div class="card-body text-center">
                    @if(isset($user))
                        <img class="img-fluid rounded-circle"
                             src="{{asset('storage/images/profiles/'.$user->id.'/'.$user->pic)}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('admin/images/profile/profile.png')}}">
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection
