@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات مخاطب</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide"
                              action="{{route('dashboard.contact.addSave' , isset($contact)? $contact->id :-1)}}"
                              enctype="multipart/form-data" method="post">
                            <div class="row ">

                                @include('error')
                                {{csrf_field()}}
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="firstName">نام
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="firstName" name="firstName"
                                                   value="{{(isset($contact)?$contact->firstName : (old('firstName') ? old('firstName') : ''))}}"
                                                   placeholder=" نام ">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="lastName">نام خانوادگی
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="lastName" name="lastName"
                                                   value="{{(isset($contact)?$contact->lastName : (old('lastName') ? old('lastName') : ''))}}"

                                                   placeholder=" نام خانوادگی">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="email">ایمیل
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="email" name="email"
                                                   value="{{(isset($contact)?$contact->email : (old('email') ? old('email') : ''))}}"
                                                   placeholder="وارد کردن ایمیل">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="phone">تلفن
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   value="{{(isset($contact)?$contact->phone : (old('phone') ? old('phone') : ''))}}"
                                                   placeholder="تلفن همراه">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="address">محل سکونت
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="address" name="address"
                                                       value="{{(isset($contact)?$contact->address : (old('address') ? old('address') : ''))}}"
                                                   placeholder="محل سکونت">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="birthday">تاریخ تولد
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">

                                            <input  data-jdp type="text" class="form-control pdate" id="pcal1" name="birthday"
                                                   value="{{(isset($contact)?$contact->birthday : (old('birthday') ? old('birthday') : ''))}}"

                                                 >
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="password">عکس
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


                            </div>
                            <br>
                            <button type="submit" class="btn  btn-block btn-success">ثبت</button>

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
                    @if(isset($contact))
                        <img class="img-fluid rounded-circle"
                             src="{{asset('storage/images/contacts/'.$contact->image)}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('images/profile/profile.png')}}">
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection
