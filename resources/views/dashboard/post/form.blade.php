@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات پست</h4>
                </div>
                <div class="card-body">

                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide"
                                          action="{{route('dashboard.post.addSave' , isset($post)? $post->id :-1)}}"
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
                                                               value="{{(isset($post)?$post->title : (old('title') ? old('title') : ''))}}"
                                                               placeholder=" عنوان ">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-center"
                                                           for="type">نوع
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select name="type" id="single-select"
                                                                class="col-12">
                                                            <option
                                                                {{((isset($post) && $post->type=='music' )?'selected' : '')}} value="music">
                                                                آهنگ
                                                            </option>
                                                            <option
                                                                {{((isset($post) && $post->type=='poem' )?'selected' : '')}}  value="poem">
                                                                شعر
                                                            </option>
                                                            <option
                                                                {{((isset($post) && $post->type=='text' )?'selected' : '')}} value="text">
                                                                دل نوشته
                                                            </option>

                                                        </select>

                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-center"
                                                           for="pic">عکس
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                   name="pic">
                                                            <label class="custom-file-label">انتخاب
                                                                فایل</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-center"
                                                           for="file">فایل اضافه
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                   name="file">
                                                            <label class="custom-file-label">انتخاب
                                                                فایل</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"
                                                           for="text">متن شعر
                                                    </label>
                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="text"
                                                                                  name="text" rows="5">

                                                                {{(isset($post))?$post->text: (old('text') ? old('text'): '') }}

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

        </div>

        <div class="col-lg-4 ">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">عکس </h4>
                </div>
                <div class="card-body text-center">
                    @if(isset($post))
                        <img class="img-fluid rounded-circle"
                             src="{{asset('storage/post/'.$post->id.'/'.$post->pic)}}">


                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('images/profile/profile.png')}}">
                    @endif

                </div>
                <div class="card-body text-center">
                    @if(isset($post))


{{--                        <button type="button" class="btn btn-info">{{$post->links}}<span class="btn-icon-right"><i class="fa fa-download"></i></span>--}}
{{--                        </button>--}}

                        <a href="{{asset('storage/post/'.$post->id.'/'.$post->links)}}" style="  margin-top: 15%;" type="button" class="btn btn-rounded btn-outline-secondary">{{$post->links}} <span class="btn-icon-right"><i class="fa fa-download"></i></span></a>
                    @endif

                </div>
            </div>
        </div>


    </div>

@endsection
