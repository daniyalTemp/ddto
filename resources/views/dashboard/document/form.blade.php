@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات سند</h4>
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
                                                          action="{{route('dashboard.document.addSave' , isset($document)? $document->id :-1)}}"
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            @include('error')
                                                            {{csrf_field()}}
                                                            <div class="col-xl-6    ">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="document_id">سرشناسه
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="document_id" name="document_id"
                                                                               value="{{(isset($document)?$document->document_id : (old('document_id') ? old('document_id') : ''))}}"
                                                                               placeholder=" سرشناسه ">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="author">عنوان و نام پدیدآور
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="author" name="author"
                                                                               value="{{(isset($document)?$document->author : (old('author') ? old('author') : ''))}}"
                                                                               placeholder=" عنوان و نام پدیدآور ">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="collection">مجموعه

                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="collection" name="collection"
                                                                               value="{{(isset($document)?$document->collection : (old('collection') ? old('collection') : ''))}}"
                                                                               placeholder=" مجموعه ">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="replication_status">وضعیت استنساخ
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="replication_status"
                                                                               name="replication_status"
                                                                               value="{{(isset($document)?$document->replication_status : (old('replication_status') ? old('replication_status') : ''))}}"

                                                                               placeholder="وضعیت استنساخ">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="language">زبان
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="language" name="language"
                                                                               value="{{(isset($document)?$document->language : (old('language') ? old('language') : ''))}}"
                                                                               placeholder="زبان">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="appearance_characteristics">مشخصات
                                                                        ظاهری
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="appearance_characteristics"
                                                                               name="appearance_characteristics"
                                                                               value="{{(isset($document)?$document->appearance_characteristics : (old('appearance_characteristics') ? old('appearance_characteristics') : ''))}}"
                                                                               placeholder="مشخصات ظاهری">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="start_finish_version">آغاز وانجام نسخه
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="start_finish_version"
                                                                               name="start_finish_version"
                                                                               value="{{(isset($document)?$document->start_finish_version : (old('start_finish_version') ? old('start_finish_version') : ''))}}"
                                                                               placeholder="آغاز وانجام نسخه">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="sources_work">منابع اثر، نمایه ها، چکیده
                                                                        ها
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="sources_work"
                                                                               name="sources_work"
                                                                               value="{{(isset($document)?$document->sources_work : (old('sources_work') ? old('sources_work') : ''))}}"
                                                                               placeholder="منابع اثر، نمایه ها، چکیده ها">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="uncontrolled_subjects">موضوع های کنترل
                                                                        نشده
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="uncontrolled_subjects"
                                                                               name="uncontrolled_subjects"
                                                                               value="{{(isset($document)?$document->uncontrolled_subjects : (old('uncontrolled_subjects') ? old('uncontrolled_subjects') : ''))}}"
                                                                               placeholder="موضوع های کنترل نشده">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="maintenance_center">مرکز نگهدارنده
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="maintenance_center"
                                                                               name="maintenance_center"
                                                                               value="{{(isset($document)?$document->maintenance_center : (old('maintenance_center') ? old('maintenance_center') : ''))}}"
                                                                               placeholder="مرکز نگهدارنده">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="country">کشور
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="country" name="country"
                                                                               value="{{(isset($document)?$document->country : (old('country') ? old('country') : ''))}}"
                                                                               placeholder="کشور">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="city">شهر
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="city" name="city"
                                                                               value="{{(isset($document)?$document->city : (old('city') ? old('city') : ''))}}"
                                                                               placeholder="شهر">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="version_recovery_number">شماره بازیابی
                                                                        نسخه
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="version_recovery_number"
                                                                               name="version_recovery_number"
                                                                               value="{{(isset($document)?$document->version_recovery_number : (old('version_recovery_number') ? old('version_recovery_number') : ''))}}"
                                                                               placeholder="شماره بازیابی نسخه">
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
                                                                           for="Replication_specification_note">یادداشت
                                                                        مشخصات استنساخ <span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control"
                                                                                  id="Replication_specification_note"
                                                                                  name="Replication_specification_note"
                                                                                  rows="5">

                                                                {{(isset($document))?$document->Replication_specification_note: (old('Replication_specification_note') ? old('Replication_specification_note'): '') }}

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

                                                                {{(isset($document))?$document->notes: (old('notes') ? old('notes'): '') }}

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="Replication_specification_note">یادداشت
                                                                        مشخصات ظاهری<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control"
                                                                                  id="Replication_specification_note"
                                                                                  name="Replication_specification_note"
                                                                                  rows="5">

                                                                {{(isset($document))?$document->Replication_specification_note: (old('Replication_specification_note') ? old('Replication_specification_note'): '') }}

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="general_note">یادداشت کلی<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="general_note"
                                                                                  name="general_note" rows="5">

                                                                {{(isset($document))?$document->general_note: (old('general_note') ? old('general_note'): '') }}

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="other">اطلاعات اضافی<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="other"
                                                                                  name="other" cols="" rows="8">

                                                                {{(isset($document))?$document->other: (old('other') ? old('other'): '') }}

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

                                                            @if(isset($document)&& count($document->Contacts()->get())>0)
                                                                @foreach($document->Contacts()->get() as $contact)
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
                                                                                <a href="{{route('dashboard.document.detach' ,[ $document->id , $contact->id])}}"
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

                                                                                        ابتدا سند را ایجاد کنید

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
                                                                                   href="{{route('dashboard.document.attach',[$document->id , $mainContact->id])}}"
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

                                                                                ابتدا سند را ایجاد کنید

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
                    @if(isset($document))
                        <img class="img-fluid rounded-circle"
                             src="{{asset('storage/images/documents/'.$document->image)}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('images/profile/profile.png')}}">
                    @endif

                </div>
            </div>
        </div>


    </div>

@endsection
