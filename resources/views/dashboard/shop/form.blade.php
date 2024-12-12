@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12 center">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات محصلول</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-validate"
                              action="{{route('dashboard.shop.product.save' , isset($product)? $product->id :-1)}}"
                              enctype="multipart/form-data" method="post">
                            <div class="row ">

                                @include('error')
                                {{csrf_field()}}
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="name">نام
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{(isset($product)?$product->name : (old('name') ? old('name') : ''))}}"
                                                   placeholder="وارد کردن نام ">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="image">عکس
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" id="name" name="image"
                                                   value="{{(isset($product)?$product->image : (old('image') ? old('image') : ''))}}"
                                                   placeholder="عکس ">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="price">  قیمت پایه(تومان)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="price" name="price"
                                                   value="{{(isset($product)?$product->price : (old('price') ? old('price') : ''))}}"
                                                   placeholder="قیمت پایه  ">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="discount">درصد تخفیف
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="discount" name="discount"
                                                   value="{{(isset($product)?$product->discount : (old('discount') ? old('discount') : ''))}}"
                                                   placeholder="درصد تخفیف  ">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label text-center" for="count">تعداد موجود
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="count" name="count"
                                                   value="{{(isset($product)?$product->count : (old('count') ? old('count') : ''))}}"
                                                   placeholder="تعداد موجود">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-12 col-xxl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">توضیحات</h4>
                                        </div>
                                        <div class="card-body">

                                            <label>
<textarea name="description" class="summernote">

</textarea>
                                            </label>
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
