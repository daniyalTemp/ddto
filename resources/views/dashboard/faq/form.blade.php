@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12 center">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات FAQ</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-validate"
                              action="{{route('dashboard.faq.save' , isset($faq)? $faq->id :-1)}}"
                              enctype="multipart/form-data" method="post">
                            <div class="row ">

                                @include('error')
                                {{csrf_field()}}
                                <div class="col-xl-8">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-center" for="title">عنوان
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="title" name="title"
                                                   value="{{(isset($faq)?$faq->title : (old('title') ? old('title') : ''))}}"
                                                   placeholder="وارد کردن عنوان ">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-center" for="show">
                                        </label>
                                        <div class="col-lg-10">
                                            <div
                                                class="custom-control col-12 custom-checkbox mb-3 checkbox-success">
                                                <input type="checkbox"
                                                       class="custom-control-input"
                                                       {{((isset($faq) && $faq->show )?'checked' : '')}}

                                                       id="show"
                                                       name="show">
                                                <label class="custom-control-label"
                                                       for="show">نمایش در سایت </label>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-center" for="text">متن
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <textarea name="text" class="summernote">
                                                {{isset($faq)? $faq->text : ''}}
                                                    </textarea>
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
