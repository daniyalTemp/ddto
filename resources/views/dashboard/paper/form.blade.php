@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات مقاله</h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile"><i
                                        class="la la-book-dead mr-2"></i> اطلاعات اصلی</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#message"><i class="la la-user mr-2"></i>
                                    افراد مرتبط</a>
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
                                                          action="{{route('dashboard.paper.addSave' , isset($paper)? $paper->id :-1)}}"
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            @include('error')
                                                            {{csrf_field()}}
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="title">عنوان
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="title" name="title"
                                                                               value="{{(isset($paper)?$paper->title : (old('title') ? old('title') : ''))}}"
                                                                               placeholder=" نام ">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="publication">ناشر
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="publication" name="publication"
                                                                               value="{{(isset($paper)?$paper->publication : (old('publication') ? old('publication') : ''))}}"

                                                                               placeholder="ناشر">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="magazine">مجله
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="magazine" name="magazine"
                                                                               value="{{(isset($paper)?$paper->magazine : (old('magazine') ? old('magazine') : ''))}}"
                                                                               placeholder="مجله">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="magazineRate">رتبه علمی مجله
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="magazineRate" name="magazineRate"
                                                                               value="{{(isset($paper)?$paper->magazineRate : (old('magazineRate') ? old('magazineRate') : ''))}}"
                                                                               placeholder="رتبه علمی مجله">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="year">سال
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="year" name="year"
                                                                               value="{{(isset($paper)?$paper->year : (old('year') ? old('year') : ''))}}"
                                                                               placeholder="سال">
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

                                <div class="pt-4 ">
                                    <h4>افراد مرتبط </h4>
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="card border-0 pb-0">
                                                <div class="card-header border-0 pb-0">
                                                </div>
                                                <div class="card-body">
                                                    <div id="DZ_W_Todo3" class="widget-media dz-scroll"
                                                         style="height:370px;">
                                                        <ul class="timeline">

                                                            @if(isset($paper)&& count($paper->Contacts()->get())>0)
                                                                @foreach($paper->Contacts()->get() as $contact)
                                                                    <li>
                                                                        <div class="timeline-panel">
                                                                            <div class="media mr-2">
                                                                                <img alt="image" width="50"
                                                                                     src="{{asset('storage/images/contacts/'.$contact->image)}}">
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h5 class="mb-1">{{$contact->fullName()}}
                                                                                    <small
                                                                                        class="text-muted">{{$contact->phone}}</small>
                                                                                </h5>

                                                                            </div>
                                                                            <div class="col-4">
                                                                                <a href="{{route('dashboard.paper.detach' ,[ $paper->id , $contact->id])}}"
                                                                                   class="btn btn-outline-danger  btn-block btn-xxs">حذف</a>

                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach





                                                                {{--                                                                <button type="button"--}}
                                                                {{--                                                                        class="btn btn-rounded btn-info"><span--}}
                                                                {{--                                                                        class="btn-icon-left text-info"><i--}}
                                                                {{--                                                                            class="fa fa-plus color-info"></i>--}}
                                                                {{--                                    </span>افزودن--}}
                                                                {{--                                                                </button>--}}

                                                            @endif


                                                        </ul>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-xl-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">افزودن</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="example5" class="display" style="min-width: 400px">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>نام</th>
                                                                <th>موبایل</th>
                                                                <th>عملیات</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            @if(isset($mainContacts))
                                                                @foreach($mainContacts as $mainContact)
                                                                    <tr>
                                                                        <td><img class="rounded-circle" width="35"
                                                                                 src="{{asset('storage/images/contacts/'.$mainContact->image)}}"
                                                                                 alt=""></td>
                                                                        <td>{{$mainContact->fullName()}}</td>

                                                                        <td>{{$mainContact->phone}}</td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                <a type="button"
                                                                                   href="{{route('dashboard.paper.attach',[$paper->id , $mainContact->id])}}"
                                                                                   style="color: aliceblue"
                                                                                   class="btn btn-rounded btn-sm btn-success"><span
                                                                                        class="btn-icon-left text-success"><i
                                                                                            class="fa fa-user-plus color-success"></i>
                                    </span>افزودن</a></div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif


                                                            </tbody>
                                                        </table>
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
        </div>
        <div class="col-lg-2 ">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">عکس </h4>
                </div>
                <div class="card-body text-center">
                    @if(isset($paper))
                        <img class="img-fluid rounded-circle"
                             src="{{asset('storage/images/papers/'.$paper->image)}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('images/profile/profile.png')}}">
                    @endif

                </div>
            </div>
        </div>


    </div>

@endsection
