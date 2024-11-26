@extends('back.layout.main')

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
                              action="{{route('dashboard.user.addSave' , isset($user)? $user->id :-1)}}"
                              enctype="multipart/form-data" method="post">
                            <div class="row ">

                                @include('error')
                                {{csrf_field()}}
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="name">نام کابر
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{(isset($user)?$user->name : (old('name') ? old('name') : ''))}}"
                                                   placeholder="وارد کردن نام کاربر">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="email">نام کاربری
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="email" name="email"
                                                   value="{{(isset($user)?$user->email : (old('email') ? old('email') : ''))}}"

                                                   placeholder="وارد کردن نام کاربری(ایمیل)">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="password">رمز عبور
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder=" وارد کردن رمز عبور">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="password">عکس پروفایل
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


                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="admin">دسترسی
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="col">
                                                <div class="custom-control custom-checkbox mb-3 checkbox-success">
                                                    <input type="checkbox" class="custom-control-input"
                                                           {{((isset($user) && $user->admin )?'checked' : '')}}

                                                           id="admin" name="admin" >
                                                    <label class="custom-control-label" for="admin">مدیر</label>
                                                </div>
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
                        <img class="img-fluid rounded-circle" src="{{asset('storage/images/profile/'.$user->image)}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('images/profile/profile.png')}}">
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection
