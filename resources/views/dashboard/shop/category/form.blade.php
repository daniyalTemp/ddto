@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12 center">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات کابر</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-validate"
                              action="{{route('dashboard.shop.category.save' , isset($category)? $category->id :-1)}}"
                              enctype="multipart/form-data" method="post">
                            <div class="row ">

                                @include('error')
                                {{csrf_field()}}
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="name">نام
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{(isset($category)?$category->name : (old('name') ? old('name') : ''))}}"
                                                   placeholder="وارد کردن نام ">
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
