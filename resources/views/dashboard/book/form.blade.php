@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات کتاب</h4>
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
                                                          action="{{route('dashboard.book.addSave' , isset($book)? $book->id :-1)}}"
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            @include('error')
                                                            {{csrf_field()}}
                                                            <div class="col-xl-12">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="title">عنوان
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="title" name="title"
                                                                               value="{{(isset($book)?$book->title : (old('title') ? old('title') : ''))}}"
                                                                               placeholder=" نام ">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="other_title">عنوان دیگر
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="other_title" name="other_title"
                                                                               value="{{(isset($book)?$book->other_title : (old('other_title') ? old('other_title') : ''))}}"
                                                                               placeholder=" عنوان دیگر ">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="uID">سرشناسه

                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="uID" name="uID"
                                                                               value="{{(isset($book)?$book->uID : (old('uID') ? old('uID') : ''))}}"
                                                                               placeholder=" سرشناسه ">
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
                                                                               value="{{(isset($book)?$book->publication : (old('publication') ? old('publication') : ''))}}"

                                                                               placeholder="ناشر">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="ISBN">شابک
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="ISBN" name="ISBN"
                                                                               value="{{(isset($book)?$book->ISBN : (old('ISBN') ? old('ISBN') : ''))}}"
                                                                               placeholder="شابک">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="AddedID">شناسه افزوده
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="AddedID" name="AddedID"
                                                                               value="{{(isset($book)?$book->AddedID : (old('AddedID') ? old('AddedID') : ''))}}"
                                                                               placeholder="شناسه افزوده">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="congressClassification">رده بندی کنگره
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="congressClassification"
                                                                               name="congressClassification"
                                                                               value="{{(isset($book)?$book->congressClassification : (old('congressClassification') ? old('congressClassification') : ''))}}"
                                                                               placeholder="رده بندی کنگره">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="deweyClassification">رده بندی دیویی
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="deweyClassification"
                                                                               name="deweyClassification"
                                                                               value="{{(isset($book)?$book->deweyClassification : (old('deweyClassification') ? old('deweyClassification') : ''))}}"
                                                                               placeholder="رده بندی دیویی">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="nationalBibliographyNumber">شماره
                                                                        کتابشناسی ملی
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="nationalBibliographyNumber"
                                                                               name="nationalBibliographyNumber"
                                                                               value="{{(isset($book)?$book->nationalBibliographyNumber : (old('nationalBibliographyNumber') ? old('nationalBibliographyNumber') : ''))}}"
                                                                               placeholder="شماره کتابشناسی ملی">
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
                                                                               value="{{(isset($book)?$book->year : (old('year') ? old('year') : ''))}}"
                                                                               placeholder="سال">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="location">محل انتشار
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="location" name="location"
                                                                               value="{{(isset($book)?$book->location : (old('location') ? old('location') : ''))}}"
                                                                               placeholder="محل انتشار">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="frost">فروست
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="frost" name="frost"
                                                                               value="{{(isset($book)?$book->frost : (old('frost') ? old('frost') : ''))}}"
                                                                               placeholder="فروست">
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
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="appearance">مشخصات ظاهری <span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="appearance"
                                                                                  name="appearance" rows="5">

                                                                {{(isset($book))?$book->appearance: (old('appearance') ? old('appearance'): '') }}

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="notes">یادداشت<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="notes"
                                                                                  name="notes" rows="5">

                                                                {{(isset($book))?$book->notes: (old('notes') ? old('notes'): '') }}

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="contents">مندرجات<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="contents"
                                                                                  name="contents" rows="5">

                                                                {{(isset($book))?$book->contents: (old('contents') ? old('contents'): '') }}

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="Issue">موضوع<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="Issue"
                                                                                  name="Issue" rows="5">

                                                                {{(isset($book))?$book->Issue: (old('Issue') ? old('Issue'): '') }}

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

                                                            @if(isset($book)&& count($book->Contacts()->get())>0)
                                                                @foreach($book->Contacts()->get() as $contact)
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
                                                                                <a href="{{route('dashboard.book.detach' ,[ $book->id , $contact->id])}}"
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
                                                                                        <svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            width="24px" height="24px"
                                                                                            viewBox="0 0 24 24"
                                                                                            version="1.1"
                                                                                            class="svg-main-icon">
                                                                                            <g stroke="none"
                                                                                               stroke-width="1"
                                                                                               fill="none"
                                                                                               fill-rule="evenodd">
                                                                                                <rect x="0" y="0"
                                                                                                      width="24"
                                                                                                      height="24"/>
                                                                                                <path
                                                                                                    d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 Z M19.0710678,4.92893219 L19.0710678,4.92893219 C19.4615921,5.31945648 19.4615921,5.95262146 19.0710678,6.34314575 L6.34314575,19.0710678 C5.95262146,19.4615921 5.31945648,19.4615921 4.92893219,19.0710678 L4.92893219,19.0710678 C4.5384079,18.6805435 4.5384079,18.0473785 4.92893219,17.6568542 L17.6568542,4.92893219 C18.0473785,4.5384079 18.6805435,4.5384079 19.0710678,4.92893219 Z"
                                                                                                    fill="#000000"
                                                                                                    fill-rule="nonzero"
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
                                                    @if(isset($mainContacts))

                                                        <div class="table-responsive">
                                                            <table id="example5" class="display"
                                                                   style="min-width: 400px">
                                                                <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>نام</th>
                                                                    <th>موبایل</th>
                                                                    <th>عملیات</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

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
                                                                                   href="{{route('dashboard.book.attach',[$book->id , $mainContact->id])}}"
                                                                                   style="color: aliceblue"
                                                                                   class="btn btn-rounded btn-sm btn-success"><span
                                                                                        class="btn-icon-left text-success"><i
                                                                                            class="fa fa-user-plus color-success"></i>
                                    </span>افزودن</a></div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach


                                                                </tbody>
                                                            </table>
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
                                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                     width="24px" height="24px"
                                                                                     viewBox="0 0 24 24" version="1.1"
                                                                                     class="svg-main-icon">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                       fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24"
                                                                                              height="24"/>
                                                                                        <path
                                                                                            d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 Z M19.0710678,4.92893219 L19.0710678,4.92893219 C19.4615921,5.31945648 19.4615921,5.95262146 19.0710678,6.34314575 L6.34314575,19.0710678 C5.95262146,19.4615921 5.31945648,19.4615921 4.92893219,19.0710678 L4.92893219,19.0710678 C4.5384079,18.6805435 4.5384079,18.0473785 4.92893219,17.6568542 L17.6568542,4.92893219 C18.0473785,4.5384079 18.6805435,4.5384079 19.0710678,4.92893219 Z"
                                                                                            fill="#000000"
                                                                                            fill-rule="nonzero"
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
                    @if(isset($book))
                        <img class="img-fluid rounded-circle"
                             src="{{asset('storage/images/books/'.$book->image)}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('images/profile/profile.png')}}">
                    @endif

                </div>
            </div>
        </div>


    </div>

@endsection
