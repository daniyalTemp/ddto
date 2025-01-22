@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات پست</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide"
                              action="{{route('dashboard.blog.save' , isset($blog)? $blog->id :-1)}}"
                              enctype="multipart/form-data" method="post">
                            <div class="row ">

                                @include('error')
                                {{csrf_field()}}
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-center" for="title">عنوان
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="title" name="title"
                                                   value="{{(isset($blog)?$blog->title : (old('title') ? old('title') : ''))}}"
                                                   placeholder="وارد کردن عنوان ">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-center" for="image">عکس
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">انتخاب فایل</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-center" for="show">
                                        </label>
                                        <div class="col-lg-9">
                                            <div
                                                class="custom-control col-12 custom-checkbox mb-3 checkbox-success">
                                                <input type="checkbox"
                                                       class="custom-control-input"
                                                       {{((isset($blog) && $blog->show )?'checked' : '')}}

                                                       id="show"
                                                       name="show">
                                                <label class="custom-control-label"
                                                       for="show">نمایش در سایت </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label text-center" for="show">تعداد بازدید
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="seen" name="seen"
                                                   value="{{(isset($blog)?$blog->seen : (old('seen') ? old('seen') : '0'))}}"
                                                   placeholder="تعداد بازدید ">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-5">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="cats[]">دسته بندی
                                        </label>
                                        <div class="col-lg-6">
                                            <select id="multi-value-select" name="cats[]" multiple="multiple">

                                                @foreach($cats as $cat)
                                                    <option value="{{$cat->id}}"
                                                            @foreach($blog->Category()->get(['category_id'])->toArray() as $selectedCat)
                                                                @if($selectedCat['category_id'] == $cat->id)
                                                                    selected="selected"

                                                        @endif
                                                            @endforeach

                                                    >{{$cat->name}}</option>

                                                @endforeach
                                            </select>
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
                                                {{isset($blog)? $blog->text : ''}}
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

        <div class="col-lg-3 ">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">عکس کابر</h4>
                </div>
                <div class="card-body text-center">
                    @if(isset($blog))
                        <img class="img-fluid rounded-circle"
                             src="{{asset('storage/images/blog/'.$blog->id.'/'.$blog->image)}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('admin/images/profile/profile.png')}}">
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection
