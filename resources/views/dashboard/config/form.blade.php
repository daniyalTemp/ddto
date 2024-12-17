@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-8">
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
                                        class="la la-book-dead mr-2"></i> اطلاعات بالای صفحه</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#message"><i class="la la-cogs mr-2"></i>
                                    خدمات</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            @include('error')

                            <div class="tab-pane fade show active" id="profile">
                                <div class="pt-4">
                                    <div class="col-lg-12">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="form-validation">
                                                    <form class="form-valide"
                                                          action=""
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            {{csrf_field()}}

                                                            <div class="col-xl-12">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="bannerUP">

                                                                    </label>
                                                                    <div class="col-lg-12">
                                                                        <textarea class="form-control" id="bannerUP"
                                                                                  name="bannerUP" cols="" rows="12">
                                                                            {{isset($config) ? ($config->bannerUP) :(old('bannerUP') ? old('bannerUP' ) :'') }}

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
                            <div class="tab-pane fade" id="message">

                                <div class="pt-4 ">
                                    <h4>لیست خدمات </h4>
                                    <div class="row">
                                        @foreach($config->presents as $key=> $item)

                                            <a href="#" class="col-xl-4 col-lg-4 col-sm-6" data-toggle="modal"
                                               data-target="#item{{$key}}">
                                                <div class="widget-stat card bg-secondary">
                                                    <div class="card-body p-4">

                                                        <div class="media">
									<span class="mr-3" style="background-color: #aa9090">
                                    <img src="{{asset('assets/images/services/'.$item['pic'])}}" style="width: 80%;">
                                    </span>
                                                            <div class="media-body text-white">
                                                                <h3 class="text-white">{{$item['name']}}</h3>


                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                            </a>



                                            <!-- Modal -->
                                            <div class="modal fade" id="item{{$key}}">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">شما در حال ویرایش
                                                                {{$item['name']}}
                                                                هستید
                                                            </h6>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card overflow-hidden">

                                                                <div class="card-body">

                                                                    <div class="row text-center">

                                                                        <form class="form-valide"
                                                                              action="{{route('dashboard.saveService')}}"
                                                                              enctype="multipart/form-data"
                                                                              method="post">
                                                                            <div class="row ">

                                                                                {{csrf_field()}}

                                                                                <input hidden="hidden" name="key" value="{{$key}}">
                                                                                <div class="col-xl-12">
                                                                                    <div class="form-group row">
                                                                                        <label
                                                                                            class="col-lg-12 col-form-label text-center"
                                                                                            for="telegram">نام خدمت
                                                                                            <span
                                                                                                class="text-danger">*</span>
                                                                                        </label>
                                                                                        <div class="col-lg-12">
                                                                                            <input type="text"
                                                                                                   class="form-control"
                                                                                                   id="serviceName"
                                                                                                   name="serviceName"
                                                                                                   value="{{(isset($config)?$item['name'] :'')}}"
                                                                                            >
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-xl-12">
                                                                                    <div class="form-group row">
                                                                                        <label
                                                                                            class="col-lg-12 col-form-label text-center"
                                                                                            for="servicedDes">متن خدمت
                                                                                        </label>
                                                                                        <div class="col-lg-12">
                                                                                             <textarea
                                                                                                 class="form-control"
                                                                                                 id="serviceDes"
                                                                                                 name="serviceDes"
                                                                                                 cols=""
                                                                                                 rows="12">
                                                                                    {{(isset($config)?$item['des'] :'')}}
                                                                        </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>


                                                                                <button type="submit"
                                                                                        class="btn  btn-block btn-success">
                                                                                    ثبت
                                                                                </button>

                                                                            </div>
                                                                        </form>


                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark light"
                                                                    data-dismiss="modal">بستن
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات تماس </h4>
                </div>
                <div class="card-body text-center">

                    <div class="form-validation">
                        <form class="form-valide"
                              action="{{route('dashboard.saveConfig')}}"
                              enctype="multipart/form-data" method="post">
                            <div class="row ">

                                {{csrf_field()}}
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="phone">تلفن
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="firstName" name="phone"
                                                   value="{{(isset($config)?$config->phone : (old('phone') ? old('phone') : ''))}}"
                                                   placeholder="تلفن">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="address">آدرس
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="address" name="address"
                                                   value="{{(isset($config)?$config->address : (old('address') ? old('address') : ''))}}"
                                                   placeholder="آدرس">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="telegram">لینک تلگرام
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="telegram" name="telegram"
                                                   value="{{(isset($config)?$config->telegram : (old('telegram') ? old('telegram') : ''))}}"
                                                   placeholder="لینک تلگرام">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="instagram">لینک
                                            اینستاگرام
                                        </label>
                                        <div class="col-lg-8">
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


    </div>

@endsection
