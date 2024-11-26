@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات مخاطب</h4>
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
                                        class="la la-clipboard-list mr-2"></i> سوابق </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#message"><i class="la la-tasks mr-2"></i>
                                    فعالیت ها</a>
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
                                                          action="{{route('dashboard.contact.addSave' , isset($contact)? $contact->id :-1)}}"
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
                                                                               value="{{(isset($contact)?$contact->firstName : (old('firstName') ? old('firstName') : ''))}}"
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
                                                                               value="{{(isset($contact)?$contact->lastName : (old('lastName') ? old('lastName') : ''))}}"

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
                                                                               value="{{(isset($contact)?$contact->email : (old('email') ? old('email') : ''))}}"
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
                                                                               value="{{(isset($contact)?$contact->phone : (old('phone') ? old('phone') : ''))}}"
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
                                                                               value="{{(isset($contact)?$contact->address : (old('address') ? old('address') : ''))}}"
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
                                                                               value="{{(isset($contact)?$contact->birthday : (old('birthday') ? old('birthday') : ''))}}"

                                                                        >
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="birthday">جنسیت
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">

                                                                        <select id="single-select" name="sex"
                                                                                class="col-12">
                                                                            <option
                                                                                {{((isset($contact) && $contact->sex=='male' )?'selected' : '')}} value="male">
                                                                                مرد
                                                                            </option>
                                                                            <option
                                                                                {{((isset($contact) && $contact->sex=='female' )?'selected' : '')}} value="female">
                                                                                زن
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="birthday">نوع
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">

                                                                        <select name="type" id="single-select"
                                                                                class="col-12">
                                                                            <option
                                                                                {{((isset($contact) && $contact->type=='researcher' )?'selected' : '')}} value="researcher">
                                                                                پژوهشگر
                                                                            </option>
                                                                            <option
                                                                                {{((isset($contact) && $contact->type=='causes_of_glory' )?'selected' : '')}}  value="causes_of_glory">
                                                                                مفاخر
                                                                            </option>
                                                                            <option
                                                                                {{((isset($contact) && $contact->type=='publisher' )?'selected' : '')}} value="publisher">
                                                                                ناشر
                                                                            </option>
                                                                            <option
                                                                                {{((isset($contact) && $contact->type=='artist' )?'selected' : '')}} value="artist">
                                                                                هنرمند
                                                                            </option>
                                                                        </select>
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
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="congrats">پیامک تبریک
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <div class="col">
                                                                            <div
                                                                                class="custom-control custom-checkbox mb-3 checkbox-success">
                                                                                <input type="checkbox"
                                                                                       class="custom-control-input"
                                                                                       {{((isset($contact) && $contact->congrats )?'checked' : '')}}

                                                                                       id="congrats" name="congrats">
                                                                                <label class="custom-control-label"
                                                                                       for="congrats">فعال</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="interests">علاقمندی ها <span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="interests"
                                                                                  name="interests" rows="5">

                                                                {{(isset($contact))?$contact->interests: (old('interests') ? old('interests'): '') }}

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label" for="other">فعالبت
                                                                        های دیگر <span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="other"
                                                                                  name="other" rows="5">
                                                            {{(isset($contact))?$contact->other: (old('other') ? old('other'): '') }}
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
                                @if(isset($contact))
                                    <div class="pt-4">
                                        <h4>سوابق </h4>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title">تحصیلات</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll"
                                                             style="height:370px;">
                                                            @if(isset($contact) && count($contact->Educations()->get())>0)
                                                                @foreach($contact->Educations()->get() as $education)
                                                                    <ul class="timeline">
                                                                        <li>
                                                                            <div class="timeline-badge primary"></div>
                                                                            <a class="timeline-panel text-muted"
                                                                               href="{{route('dashboard.contact.editEducation' , $education->id)}}">
                                                                                <div
                                                                                    class="card text-white bg-dark-alt">
                                                                                    <ul class="list-group list-group-flush">
                                                                                        <li class="list-group-item d-flex justify-content-between">
                                                                                        <span
                                                                                            class="mb-0">مقطع:</span><strong>{{$education->grade}}</strong>
                                                                                        </li>
                                                                                        <li class="list-group-item d-flex justify-content-between">
                                                                                        <span
                                                                                            class="mb-0">رشته:</span><strong> {{$education->major}} </strong>
                                                                                        </li>
                                                                                        <li class="list-group-item d-flex justify-content-between">
                                                                                <span
                                                                                    class="mb-0">محل تحصیل:</span><strong>{{$education->location}}</strong>
                                                                                        </li>
                                                                                        <li class="list-group-item d-flex justify-content-between">
                                                                                <span
                                                                                    class="mb-0">دانشگاه:</span><strong>{{$education->uni}}</strong>
                                                                                        </li>
                                                                                        <li class="list-group-item d-flex justify-content-between">
                                                                                <span
                                                                                    class="mb-0">سال اتمام:</span><strong>{{$education->year}}</strong>
                                                                                        </li>

                                                                                    </ul>
                                                                                </div>
                                                                            </a>
                                                                        </li>

                                                                    </ul>

                                                                @endforeach
                                                            @endif


                                                        </div>
                                                        <br>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <a href="{{route('dashboard.contact.addEducation' , $contact->id)}}"
                                                               class="btn btn-rounded btn-info btn-block"><span
                                                                    class="btn-icon-left text-info "><i
                                                                        class="fa fa-plus color-info"></i>
                                    </span>افزودن
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title">سوابق کاری</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="DZ_W_TimeLine1"
                                                             class="widget-timeline dz-scroll style-1"
                                                             style="height:370px;">
                                                            <ul class="timeline">

                                                                @if(isset($contact) && count($contact->Jobs()->get())>0)
                                                                    @foreach($contact->Jobs()->get() as $job)
                                                                        <li>
                                                                            <div class="timeline-badge primary"></div>
                                                                            <a class="timeline-panel text-muted"
                                                                               href="{{route('dashboard.contact.editJob' , $job->id)}}">
                                                                            <span>
                                                                                {{$job->city}}
                                                                                -
                                                                                {{$job->duration}}
                                                                            </span>
                                                                                <h6 class="mb-0">
                                                                                    {{$job->position}}
                                                                                    <strong
                                                                                        class="text-primary">
                                                                                        {{$job->location}}
                                                                                    </strong>.</h6>
                                                                            </a>
                                                                        </li>

                                                                    @endforeach
                                                                @endif


                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <a href="{{route('dashboard.contact.addJob' , $contact->id)}}"
                                                               type="button"
                                                               class="btn btn-rounded btn-info btn-block"><span
                                                                    class="btn-icon-left text-info "><i
                                                                        class="fa fa-plus color-info"></i>
                                    </span>افزودن
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12">
                                                <div class="card border-0 pb-0">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title">سایر فعالیت ها</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="DZ_W_Todo2" class="widget-media dz-scroll"
                                                             style="height:370px;">
                                                            <ul class="timeline">
                                                                <li>
                                                                    <div class="timeline-panel">
                                                                        <div class="media mr-2">
                                                                            <img alt="image" width="50"
                                                                                 src="images/avatar/1.jpg">
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h5 class="mb-1">دکتر جعفر برای شما عکس
                                                                                ارسال می
                                                                                کند</h5>
                                                                            <small class="d-block">آبان 1399 - 13:45 بعد
                                                                                ظهر</small>
                                                                        </div>
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                    class="btn btn-primary light sharp"
                                                                                    data-toggle="dropdown">
                                                                                <svg width="18px" height="18px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                       fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <circle fill="#000000" cx="5"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="12"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="19"
                                                                                                cy="12" r="2"/>
                                                                                    </g>
                                                                                </svg>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item"
                                                                                   href="#">ویرایش</a>
                                                                                <a class="dropdown-item"
                                                                                   href="#">حذف</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="timeline-panel">
                                                                        <div class="media mr-2 media-info"> ک.ج
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h5 class="mb-1">گزارش با موفقیت ایجاد شد
                                                                                <span
                                                                                    class="badge badge-warning">هشدار</span>
                                                                            </h5>
                                                                            <small class="d-block">آبان 1399 - 13:45 بعد
                                                                                ظهر</small>
                                                                        </div>
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                    class="btn btn-info light sharp"
                                                                                    data-toggle="dropdown">
                                                                                <svg width="18px" height="18px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                       fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <circle fill="#000000" cx="5"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="12"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="19"
                                                                                                cy="12" r="2"/>
                                                                                    </g>
                                                                                </svg>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item"
                                                                                   href="#">ویرایش</a>
                                                                                <a class="dropdown-item"
                                                                                   href="#">حذف</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="timeline-panel">
                                                                        <div class="media mr-2 media-success">
                                                                            <i class="fa fa-home"></i>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h5 class="mb-1">یادآوری: زمان درمان!</h5>
                                                                            <small class="d-block">آبان 1399 - 13:45 بعد
                                                                                ظهر</small>
                                                                        </div>
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                    class="btn btn-success light sharp"
                                                                                    data-toggle="dropdown">
                                                                                <svg width="18px" height="18px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                       fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <circle fill="#000000" cx="5"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="12"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="19"
                                                                                                cy="12" r="2"/>
                                                                                    </g>
                                                                                </svg>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item"
                                                                                   href="#">ویرایش</a>
                                                                                <a class="dropdown-item"
                                                                                   href="#">حذف</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="timeline-panel">
                                                                        <div class="media mr-2">
                                                                            <img alt="image" width="50"
                                                                                 src="images/avatar/1.jpg">
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h5 class="mb-1">دکتر جعفر برای شما عکس
                                                                                ارسال می
                                                                                کند <span
                                                                                    class="badge light badge-danger">خطر </span>
                                                                            </h5>
                                                                            <small class="d-block">آبان 1399 - 13:45 بعد
                                                                                ظهر</small>
                                                                        </div>
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                    class="btn btn-primary light sharp"
                                                                                    data-toggle="dropdown">
                                                                                <svg width="18px" height="18px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                       fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <circle fill="#000000" cx="5"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="12"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="19"
                                                                                                cy="12" r="2"/>
                                                                                    </g>
                                                                                </svg>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item"
                                                                                   href="#">ویرایش</a>
                                                                                <a class="dropdown-item"
                                                                                   href="#">حذف</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="timeline-panel">
                                                                        <div class="media mr-2 media-danger"> ک.ج
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h5 class="mb-1">گزارش با موفقیت ایجاد شد
                                                                                <span
                                                                                    class="badge light badge-success">موفقیت </span>
                                                                            </h5>
                                                                            <small class="d-block">آبان 1399 - 13:45 بعد
                                                                                ظهر</small>
                                                                        </div>
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                    class="btn btn-danger light sharp"
                                                                                    data-toggle="dropdown">
                                                                                <svg width="18px" height="18px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                       fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <circle fill="#000000" cx="5"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="12"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="19"
                                                                                                cy="12" r="2"/>
                                                                                    </g>
                                                                                </svg>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item"
                                                                                   href="#">ویرایش</a>
                                                                                <a class="dropdown-item"
                                                                                   href="#">حذف</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="timeline-panel">
                                                                        <div class="media mr-2 media-primary">
                                                                            <i class="fa fa-home"></i>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h5 class="mb-1">یادآوری: زمان درمان! <span
                                                                                    class="badge light badge-success">موفقیت </span>
                                                                            </h5>
                                                                            <small class="d-block">آبان 1399 - 13:45 بعد
                                                                                ظهر</small>
                                                                        </div>
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                    class="btn btn-primary light sharp"
                                                                                    data-toggle="dropdown">
                                                                                <svg width="18px" height="18px"
                                                                                     viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                       fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <circle fill="#000000" cx="5"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="12"
                                                                                                cy="12" r="2"/>
                                                                                        <circle fill="#000000" cx="19"
                                                                                                cy="12" r="2"/>
                                                                                    </g>
                                                                                </svg>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item"
                                                                                   href="#">ویرایش</a>
                                                                                <a class="dropdown-item"
                                                                                   href="#">حذف</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <button type="button"
                                                                    class="btn btn-rounded btn-info btn-block"><span
                                                                    class="btn-icon-left text-info "><i
                                                                        class="fa fa-plus color-info"></i>
                                    </span>افزودن
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else

                                    <div class="pt-4">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title"></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div
                                                            class="alert  solid alert-dismissible fade show col-xl-12 text-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1"
                                                                 class="svg-main-icon">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path
                                                                        d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 Z M19.0710678,4.92893219 L19.0710678,4.92893219 C19.4615921,5.31945648 19.4615921,5.95262146 19.0710678,6.34314575 L6.34314575,19.0710678 C5.95262146,19.4615921 5.31945648,19.4615921 4.92893219,19.0710678 L4.92893219,19.0710678 C4.5384079,18.6805435 4.5384079,18.0473785 4.92893219,17.6568542 L17.6568542,4.92893219 C18.0473785,4.5384079 18.6805435,4.5384079 19.0710678,4.92893219 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        opacity="0.3"/>
                                                                </g>
                                                            </svg>

                                                            ابتدا کاربر را ایجاد کنید

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                @endif

                            </div>
                            <div class="tab-pane fade" id="message">
                                @if(isset($contact))

                                    <div class="pt-4 ">
                                        <h4>سوابق </h4>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-12">
                                                <div class="card border-0 pb-0">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title">مقالات</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="DZ_W_Todo2" class="widget-media dz-scroll"
                                                             style="height:370px;">
                                                            <ul class="timeline">
                                                                @if(count($contact->Papers()->get())>0)
                                                                    @foreach($contact->Papers()->get() as $paper)
                                                                        <li>
                                                                            <div class="timeline-panel">
                                                                                <div class="media mr-2 media-primary">
                                                                                    <i class="fa fa-paperclip"></i>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <a href="{{route('dashboard.paper.edit' , $paper->id)}}">
                                                                                        <h5 class="mb-1">{{$paper->title}}</h5>
                                                                                    </a>
                                                                                    <small class="d-block">
                                                                                        {{$paper->year}}
                                                                                        -
                                                                                        {{$paper->publication}}
                                                                                        -
                                                                                        {{$paper->magazine}}
                                                                                    </small>
                                                                                    <br>
                                                                                    <small class="d-block">
                                                                                        <a data-toggle="modal"
                                                                                           data-target="#detach{{$paper->id}}"
                                                                                           class="btn btn-outline-danger  btn-block btn-xxs">حذف</a>
                                                                                    </small>
                                                                                </div>

                                                                            </div>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade"
                                                                                 id="detach{{$paper->id}}">
                                                                                <div
                                                                                    class="modal-dialog modal-dialog-centered"
                                                                                    role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"> حذف
                                                                                                کاربر از مقاله</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal">
                                                                                                <span>&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <p>
                                                                                                ایا از حذف
                                                                                                {{$contact->firstName.' '.$contact->lastName}}

                                                                                                از مقاله
                                                                                                {{$paper->title}}
                                                                                                اطمینان دارید؟
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-dark light"
                                                                                                    data-dismiss="modal">
                                                                                                بستن
                                                                                            </button>
                                                                                            <a href="{{route('dashboard.paper.detach' ,[ $paper->id , $contact->id])}}"
                                                                                               class="btn btn-danger">حذف</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                @endif


                                                            </ul>

                                                        </div>
                                                        <br>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <a type="button"
                                                               class="btn btn-rounded btn-info btn-block"><span
                                                                    class="btn-icon-left text-info "><i
                                                                        class="fa fa-plus color-info"></i>
                                    </span>افزودن
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-xl-4 col-lg-12">
                                                <div class="card border-0 pb-0">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title">کتاب ها</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="DZ_W_Todo3" class="widget-media dz-scroll"
                                                             style="height:370px;">
                                                            <ul class="timeline">
                                                                @if(count($contact->Books()->get()) > 0 )
                                                                    @foreach($contact->Books()->get() as $book)
                                                                        <li>
                                                                            <div class="timeline-panel">
                                                                                <div class="media mr-2">
                                                                                    <div class="media  media-primary">
                                                                                        <i class="fa fa-book"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <a href="{{route('dashboard.book.edit' , $book->id)}}">
                                                                                        <h5 class="mb-1">{{$book->title}}
                                                                                            <small
                                                                                                class="text-muted"> {{$book->year}}</small>
                                                                                        </h5>
                                                                                    </a>
                                                                                    <p class="mb-1">{{$book->publication}}</p>
                                                                                    <a data-toggle="modal"
                                                                                       data-target="#detachBook{{$book->id}}"
                                                                                       class="btn btn-outline-danger  btn-block btn-xxs">حذف</a>

                                                                                </div>
                                                                            </div>
                                                                            <!-- Modal -->
                                                                            <div class="modal fade"
                                                                                 id="detachBook{{$book->id}}">
                                                                                <div
                                                                                    class="modal-dialog modal-dialog-centered"
                                                                                    role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"> حذف
                                                                                                کاربر از کتاب</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal">
                                                                                                <span>&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <p>
                                                                                                ایا از حذف
                                                                                                {{$contact->firstName.' '.$contact->lastName}}

                                                                                                از کتاب
                                                                                                {{$book->title}}
                                                                                                اطمینان دارید؟
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-dark light"
                                                                                                    data-dismiss="modal">
                                                                                                بستن
                                                                                            </button>
                                                                                            <a href="{{route('dashboard.book.detach' ,[ $book->id , $contact->id])}}"
                                                                                               class="btn btn-danger">حذف</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                @endif


                                                            </ul>

                                                        </div>
                                                        <br>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <button type="button"
                                                                    class="btn btn-rounded btn-info btn-block"><span
                                                                    class="btn-icon-left text-info "><i
                                                                        class="fa fa-plus color-info"></i>
                                    </span>افزودن
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-12">
                                                <div class="card border-0 pb-0">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title">اسناد</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="DZ_W_Todo4" class="widget-media dz-scroll"
                                                             style="height:370px;">
                                                            <ul class="timeline">
                                                                @if(isset($contact) && count($contact->Documents()->get()) > 0)
                                                                    @foreach($contact->Documents()->get() as $document)
                                                                        <li>
                                                                            <a href="{{route('dashboard.document.edit' , $document->id)}}">
                                                                            <div class="timeline-panel">
                                                                                <div class="media mr-2 media-primary">
                                                                                    <i class="fa fa-link"></i>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h5 class="mb-0">{{$document->document_id}}
                                                                                        -- {{ $document->author }}</h5>
                                                                                    <small class="text-muted">
                                                                                    {{$document->collection}}
                                                                                        --
                                                                                        {{$document->language}}
                                                                                    </small>
                                                                                </div>
                                                                            </div>
                                                                            </a>
                                                                        </li>
                                                                        <a data-toggle="modal"
                                                                           data-target="#detachDocument{{$document->id}}"
                                                                           class="btn btn-outline-danger  btn-block btn-xxs">حذف</a>                                                                        <!-- Modal -->
                                                                        <div class="modal fade"
                                                                             id="detachDocument{{$document->id}}">
                                                                            <div
                                                                                class="modal-dialog modal-dialog-centered"
                                                                                role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"> حذف
                                                                                            کاربر از سند</h5>
                                                                                        <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal">
                                                                                            <span>&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <p>
                                                                                            ایا از حذف
                                                                                            {{$contact->firstName.' '.$contact->lastName}}

                                                                                            از سند
                                                                                            {{$document->document_id}}
                                                                                            اطمینان دارید؟
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-dark light"
                                                                                                data-dismiss="modal">
                                                                                            بستن
                                                                                        </button>
                                                                                        <a href="{{route('dashboard.document.detach' ,[ $document->id , $contact->id])}}"
                                                                                           class="btn btn-danger">حذف</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif


                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <button type="button"
                                                                    class="btn btn-rounded btn-info btn-block"><span
                                                                    class="btn-icon-left text-info "><i
                                                                        class="fa fa-plus color-info"></i>
                                    </span>افزودن
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <div class="pt-4">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title"></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div
                                                            class="alert  solid alert-dismissible fade show col-xl-12 text-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1"
                                                                 class="svg-main-icon">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path
                                                                        d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 Z M19.0710678,4.92893219 L19.0710678,4.92893219 C19.4615921,5.31945648 19.4615921,5.95262146 19.0710678,6.34314575 L6.34314575,19.0710678 C5.95262146,19.4615921 5.31945648,19.4615921 4.92893219,19.0710678 L4.92893219,19.0710678 C4.5384079,18.6805435 4.5384079,18.0473785 4.92893219,17.6568542 L17.6568542,4.92893219 C18.0473785,4.5384079 18.6805435,4.5384079 19.0710678,4.92893219 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        opacity="0.3"/>
                                                                </g>
                                                            </svg>

                                                            ابتدا کاربر را ایجاد کنید

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                @endif
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
