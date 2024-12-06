@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات </h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide"
                              action="{{route('dashboard.saveConfig')}}"
                              enctype="multipart/form-data" method="post">
                            <div class="row ">

                                @include('error')
                                {{csrf_field()}}
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="phone">تلفن
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="firstName" name="phone"
                                                   value="{{(isset($config)?$config->phone : (old('phone') ? old('phone') : ''))}}"
                                                   placeholder="تلفن">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="address">آدرس
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="address" name="address"
                                                   value="{{(isset($config)?$config->address : (old('address') ? old('address') : ''))}}"
                                                   placeholder="آدرس">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="telegram">لینک تلگرام
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="telegram" name="telegram"
                                                   value="{{(isset($config)?$config->telegram : (old('telegram') ? old('telegram') : ''))}}"
                                                   placeholder="لینک تلگرام">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="instagram">لینک اینستاگرام
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="instagram" name="instagram"
                                                   value="{{(isset($config)?$config->instagram : (old('instagram') ? old('instagram') : ''))}}"
                                                   placeholder="لینک اینستاگرام">
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
                    <h4 class="card-title">عکس </h4>
                </div>
                <div class="card-body text-center">

                        <img class="img-fluid rounded-circle" src="{{asset('admin/images/logo.png')}}">



                </div>
            </div>
        </div>

    </div>
@endsection
