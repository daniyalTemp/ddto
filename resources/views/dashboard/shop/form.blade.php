@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12 center">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات محصول</h4>
                </div>
                <div class="card-body">

                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#productData"><i
                                        class="la la-file-alt mr-2"></i> اطلاعات محصول</a>
                            </li>

                            @if(isset($product))
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#extra"><i
                                            class="la la-list-ul mr-2"></i>
                                        لیست قمیت و ویژگی ها</a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            @include('error')

                            <div class="tab-pane fade show active" id="productData">
                                <div class="pt-4">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="card">

                                                <div class="card-body">
                                                    <div class="form-validation">
                                                        <form class="form-validate"
                                                              action="{{route('dashboard.shop.product.save' , isset($product)? $product->id :-1)}}"
                                                              enctype="multipart/form-data" method="post">
                                                            <div class="row ">

                                                                {{csrf_field()}}
                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-lg-4 col-form-label text-center"
                                                                            for="name">نام
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control"
                                                                                   id="name" name="name"
                                                                                   value="{{(isset($product)?$product->name : (old('name') ? old('name') : ''))}}"
                                                                                   placeholder="وارد کردن نام ">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-lg-4 col-form-label text-center"
                                                                            for="BasePrice"> قیمت
                                                                            پایه(تومان)
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control"
                                                                                   id="BasePrice" name="BasePrice"
                                                                                   value="{{(isset($product)?$product->BasePrice : (old('BasePrice') ? old('BasePrice') : ''))}}"
                                                                                   placeholder="قیمت پایه  ">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-lg-4 col-form-label text-center"
                                                                            for="category">دسته بندی
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="col-lg-6">

                                                                            <select id="single-select" name="category"
                                                                                    class="col-12">
                                                                                @if(isset($cats) and count($cats) > 0)
                                                                                    @foreach($cats as $cat)
                                                                                        <option
                                                                                            {{((isset($product) && $product->Category()->get()[0]->id==$cat->id )?'selected' : '')}}
                                                                                            value={{$cat->id}}>
                                                                                            {{$cat->name}}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @else
                                                                                    <option
                                                                                        value=-1>
                                                                                        لطفا ابتدا دسته بندی ایجاد کنید
                                                                                    </option>
                                                                                @endif

                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                {{--                                <div class="col-xl-4">--}}
                                                                {{--                                    <div class="form-group row">--}}
                                                                {{--                                        <label class="col-lg-4 col-form-label text-center" for="discount">درصد تخفیف--}}
                                                                {{--                                        </label>--}}
                                                                {{--                                        <div class="col-lg-6">--}}
                                                                {{--                                            <input type="text" class="form-control" id="discount" name="discount"--}}
                                                                {{--                                                   value="{{(isset($product)?$product->discount : (old('discount') ? old('discount') : ''))}}"--}}
                                                                {{--                                                   placeholder="درصد تخفیف  ">--}}
                                                                {{--                                        </div>--}}
                                                                {{--                                    </div>--}}

                                                                {{--                                </div>--}}

                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-lg-4 col-form-label text-center"
                                                                            for="available">نمایش در سایت ؟
                                                                        </label>
                                                                        <div class="col-lg-8">
                                                                            <div class="col">
                                                                                <div
                                                                                    class="custom-control col-4 custom-checkbox mb-3 checkbox-success">
                                                                                    <input type="checkbox"
                                                                                           class="custom-control-input"
                                                                                           {{((isset($product) && $product->available )?'checked' : '')}}

                                                                                           id="available"
                                                                                           name="available">
                                                                                    <label class="custom-control-label"
                                                                                           for="available">موجود؟</label>
                                                                                </div>
                                                                                <div
                                                                                    class="custom-control col-4 custom-checkbox mb-3 checkbox-success">
                                                                                    <input type="checkbox"
                                                                                           class="custom-control-input"
                                                                                           {{((isset($product) && $product->hot )?'checked' : '')}}

                                                                                           id="hot"
                                                                                           name="hot">
                                                                                    <label class="custom-control-label"
                                                                                           for="hot">پرفروش ؟</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-lg-4 col-form-label text-center"
                                                                            for="weight">وزن(گرم)
                                                                        </label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control"
                                                                                   id="weight" name="weight"
                                                                                   value="{{(isset($product)?$product->weight : (old('weight') ? old('weight') : ''))}}"
                                                                                   placeholder="وزن(گرم)">
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-lg-4 col-form-label text-center"
                                                                            for="image">عکس
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="col-lg-6">
                                                                            <input type="file" class="form-control"
                                                                                   id="name" name="image"
                                                                                   value="{{(isset($product)?$product->image : (old('image') ? old('image') : ''))}}"
                                                                                   placeholder="عکس ">
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="col-xl-12 col-xxl-12">
                                                                    <div class="form-group row">


                                                                        <label
                                                                            class="col-lg-2 col-form-label text-center"
                                                                            for="description">توضیحات
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="col-lg-9">
                                             <textarea name="description" class="summernote">
                                                {{isset($product)? $product->description : ''}}
                                                    </textarea>
                                                                        </div>


                                                                    </div>
                                                                </div>


                                                                <button type="submit"
                                                                        class="btn  btn-block btn-success">ثبت
                                                                </button>

                                                            </div>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 ">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <h4 class="card-title">عکس محصول</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    @if(isset($product))
                                                        <img class="img-fluid rounded-circle"
                                                             src="{{asset('storage/images/products/'.$product->id.'/'.$product->image)}}">
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path
                                                                    d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z"
                                                                    fill="#000000" opacity="0.3"/>
                                                                <path
                                                                    d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z"
                                                                    fill="#000000"/>
                                                            </g>
                                                        </svg>

                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($product))
                                <div class="tab-pane fade" id="extra">

                                    <div class="pt-4 ">
                                        <h4>لیست قیمت ویژگی ها</h4>
                                        <div id="accordion-two" class="accordion accordion-primary-solid">
                                            <div class="accordion__item">
                                                <div class="accordion__header" data-toggle="collapse"
                                                     data-target="#bordered_collapseOne" aria-expanded="true"><span
                                                        class="accordion__header--text">توجه :</span>
                                                    <span class="accordion__header--indicator"></span>
                                                </div>
                                                <div id="bordered_collapseOne" class="accordion__body collapse "
                                                     data-parent="#accordion-two" style="">
                                                    <div class="accordion__body--text">
                                                        <p>
                                                            با افزودن ویژگی برای محصول خود، به ازای هر ویژگی مقدار
                                                            افزایش
                                                            قیمت را مشخص نمایید
                                                        </p></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="card">

                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="col-xl-4 col-lg-12">
                                                                <div class="card border-0 pb-0">
                                                                    <div class="card-header border-0 pb-0">
                                                                        <h4 class="card-title">رنگ های موجود</h4>
                                                                    </div>
                                                                    <div class="card-body">

                                                                        <div id="DZ_W_Todo2"
                                                                             class="widget-media dz-scroll ps ps--active-y"
                                                                             style="height:370px;">
                                                                            <ul class="timeline">
                                                                                {{--                                                                                @dd($product->color)--}}
                                                                                @if(count($product->color) > 0)
                                                                                    @foreach($product->color as $key =>$color)

                                                                                        <li>
                                                                                            <div class="timeline-panel">
                                                                                                <div
                                                                                                    style="background-color: {{$color['color']}}"
                                                                                                    class="media mr-2 media-success">
                                                                                                    <i class="{{\App\Utility\ProductAttribute::$icons[$color['status']]}}"></i>
                                                                                                </div>
                                                                                                <div class="media-body">
                                                                                                    <h6 class="mb-1">
                                                                                                        {{$color['name']}}
                                                                                                    </h6>
                                                                                                    <small
                                                                                                        class="d-block">
                                                                                                        {{$color['addPrice']}}
                                                                                                    </small>
                                                                                                    <div
                                                                                                        class="row ml-2 ">
                                                                                                        <a href="#"
                                                                                                           class="btn btn-primary btn-xxs shadow col-5 mr-1"
                                                                                                           data-toggle="modal"
                                                                                                           data-target="#editColor{{$key}}">ویرایش </a>
                                                                                                        <a href="#"
                                                                                                           class="btn btn-outline-danger btn-block btn-xxs shadow col-5"
                                                                                                           data-toggle="modal"
                                                                                                           data-target="#delColor{{$key}}">حذف</a>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </li>

                                                                                        {{--Modal For editing--}}
                                                                                        <div class="modal fade"
                                                                                             id="editColor{{$key}}">
                                                                                            <div
                                                                                                class="modal-dialog modal-dialog-centered"
                                                                                                role="document">
                                                                                                <div
                                                                                                    class="modal-content">
                                                                                                    <div
                                                                                                        class="modal-header">
                                                                                                        <h5 class="modal-title"> {{$color['name']}}
                                                                                                            ویرایش
                                                                                                            رنگ</h5>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="close"
                                                                                                            data-dismiss="modal">
                                                                                                            <span>&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-body">


                                                                                                        <div
                                                                                                            class="col-12">

                                                                                                            <form
                                                                                                                class="form-valide"
                                                                                                                action="{{route('dashboard.shop.product.saveExtra',[$product->id , 'color' , $key])}}"
                                                                                                                enctype="multipart/form-data"
                                                                                                                method="post">
                                                                                                                <div
                                                                                                                    class="row ">

                                                                                                                    {{csrf_field()}}

                                                                                                                    <input
                                                                                                                        hidden="hidden"
                                                                                                                        name="type"
                                                                                                                        value="color">

                                                                                                                    <div
                                                                                                                        class="col-xl-12">
                                                                                                                        <div
                                                                                                                            class="form-group row">
                                                                                                                            <label
                                                                                                                                class="col-lg-3 col-form-label text-center"
                                                                                                                                for="colorCode">
                                                                                                                                رنگ
                                                                                                                                موجود
                                                                                                                            </label>
                                                                                                                            <div
                                                                                                                                class="col-lg-9">
                                                                                                                                <input
                                                                                                                                    type="color"
                                                                                                                                    class="form-control"
                                                                                                                                    id="colorCode"
                                                                                                                                    name="colorCode"
                                                                                                                                    value="{{isset($color['color'])?$color['color']:'#ffffff'}}"
                                                                                                                                    placeholder=" رنگ موجود">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-xl-12">
                                                                                                                        <div
                                                                                                                            class="form-group row">
                                                                                                                            <label
                                                                                                                                class="col-lg-3 col-form-label text-center"
                                                                                                                                for="name">
                                                                                                                                رنگ
                                                                                                                                موجود
                                                                                                                            </label>
                                                                                                                            <div
                                                                                                                                class="col-lg-9">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="name"
                                                                                                                                    name="name"
                                                                                                                                    value="{{$color['name']?$color['name']:''}}"
                                                                                                                                    placeholder="نام رنگ موجود">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-xl-12">
                                                                                                                        <div
                                                                                                                            class="form-group row">
                                                                                                                            <label
                                                                                                                                class="col-lg-12 col-form-label text-center"
                                                                                                                                for="addition">
                                                                                                                                افزایش
                                                                                                                                قیمت
                                                                                                                                (نسبت
                                                                                                                                به
                                                                                                                                قیمت
                                                                                                                                پایه
                                                                                                                                یا
                                                                                                                                افزون
                                                                                                                                بر
                                                                                                                                آن)
                                                                                                                                <br>
                                                                                                                                <i style="color: darkgoldenrod">لطفا
                                                                                                                                    یک
                                                                                                                                    مورد
                                                                                                                                    را
                                                                                                                                    انتخاب
                                                                                                                                    کنید</i>
                                                                                                                            </label>
                                                                                                                            <div
                                                                                                                                class="col-lg-4">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="addition"
                                                                                                                                    name="addition"
                                                                                                                                    value="{{$color['status'] == 'addition'?$color["addPrice"]:''}}"
                                                                                                                                    placeholder="افزون بر قیمت">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-lg-4">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="percentage"
                                                                                                                                    name="percentage"
                                                                                                                                    value="{{$color['status'] == 'percentage'?$color["addPrice"]:''}}"
                                                                                                                                    placeholder="درصد به قیمت">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-lg-4">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="ratio"
                                                                                                                                    name="ratio"
                                                                                                                                    value="{{$color['status'] == 'ratio'?$color["addPrice"]:''}}"
                                                                                                                                    placeholder="ضریب به قیمت ">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>


                                                                                                                    <button
                                                                                                                        type="submit"
                                                                                                                        class="btn  btn-block btn-success">
                                                                                                                        ثبت
                                                                                                                    </button>

                                                                                                                </div>
                                                                                                            </form>

                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-dark light"
                                                                                                            data-dismiss="modal">
                                                                                                            بستن
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        {{--Modal For delete--}}
                                                                                        <div class="modal fade"
                                                                                             id="delColor{{$key}}">
                                                                                            <div
                                                                                                class="modal-dialog modal-dialog-centered"
                                                                                                role="document">
                                                                                                <div
                                                                                                    class="modal-content">
                                                                                                    <div
                                                                                                        class="modal-header">
                                                                                                        <h5 class="modal-title"> {{$color['name']}}
                                                                                                            حذف
                                                                                                            رنگ</h5>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="close"
                                                                                                            data-dismiss="modal">
                                                                                                            <span>&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-body">


                                                                                                        <div
                                                                                                            class="col-12">

                                                                                                            <p>
                                                                                                                آیا از
                                                                                                                حذف این
                                                                                                                ویژگی و
                                                                                                                قیمت آن
                                                                                                                روی
                                                                                                                محصول
                                                                                                                اطمینان
                                                                                                                دارید؟
                                                                                                                <br>
                                                                                                                <i style="color: darkorange">
                                                                                                                    این
                                                                                                                    کار
                                                                                                                    قابل
                                                                                                                    برگشت
                                                                                                                    نیست
                                                                                                                </i>
                                                                                                            </p>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-dark light"
                                                                                                            data-dismiss="modal">
                                                                                                            بستن
                                                                                                        </button>
                                                                                                        <a href="{{route('dashboard.shop.product.delExtra' , ['color' , $product->id , $key])}}"
                                                                                                           class="btn btn-outline-danger light"
                                                                                                        >
                                                                                                            حذف
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    @endforeach
                                                                                @endif
                                                                            </ul>
                                                                            <div class="ps__rail-x"
                                                                                 style="left: 0px; bottom: -134px;">
                                                                                <div class="ps__thumb-x" tabindex="0"
                                                                                     style="left: 0px; width: 0px;"></div>
                                                                            </div>
                                                                            <div class="ps__rail-y"
                                                                                 style="top: 134px; height: 370px; left: 296px;">
                                                                                <div class="ps__thumb-y" tabindex="0"
                                                                                     style="top: 99px; height: 271px;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-4 col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-header border-0 pb-0">
                                                                        <h4 class="card-title">سایزهای موجود</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div id="DZ_W_TimeLine1"
                                                                             class="widget-timeline dz-scroll style-1 ps ps--active-y"
                                                                             style="height:370px;">
                                                                            <ul class="timeline">
                                                                                @if(count($product->size) > 0)
                                                                                    @foreach($product->size as $key =>$size)
                                                                                        <li>
                                                                                            <div
                                                                                                class="timeline-badge primary"></div>
                                                                                            <a class="timeline-panel text-muted"
                                                                                               href="#">
                                                                                                <span>{{$size['name']}}</span>
                                                                                                <h6 class="mb-0">
                                                                                                    {{$size['addPrice']}}
                                                                                                    <strong
                                                                                                        class="text-primary">
                                                                                                        @if($size['status']=='percentage')
                                                                                                            % درصد
                                                                                                        @elseif($size['status']=='ratio')
                                                                                                            * ضریب
                                                                                                        @elseif($size['status']=='addition')
                                                                                                            + تومان
                                                                                                        @endif
                                                                                                    </strong>
                                                                                                </h6>

                                                                                            </a>
                                                                                            <div
                                                                                                class="row ml-5 ">
                                                                                                <a href="#"
                                                                                                   class="btn btn-primary btn-xxs shadow col-5 mr-1"
                                                                                                   data-toggle="modal"
                                                                                                   data-target="#editSize{{$key}}">ویرایش </a>
                                                                                                <a href="#"
                                                                                                   class="btn btn-outline-danger btn-block btn-xxs shadow col-5"
                                                                                                   data-toggle="modal"
                                                                                                   data-target="#delSize{{$key}}">حذف</a>
                                                                                            </div>

                                                                                        </li>


                                                                                        {{--Modal For editing--}}
                                                                                        <div class="modal fade"
                                                                                             id="editSize{{$key}}">
                                                                                            <div
                                                                                                class="modal-dialog modal-dialog-centered"
                                                                                                role="document">
                                                                                                <div
                                                                                                    class="modal-content">
                                                                                                    <div
                                                                                                        class="modal-header">
                                                                                                        <h5 class="modal-title"> {{$size['name']}}
                                                                                                            ویرایش
                                                                                                            سایز</h5>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="close"
                                                                                                            data-dismiss="modal">
                                                                                                            <span>&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-body">


                                                                                                        <div
                                                                                                            class="col-12">

                                                                                                            <form
                                                                                                                class="form-valide"
                                                                                                                action="{{route('dashboard.shop.product.saveExtra',[$product->id , 'size' , $key])}}"
                                                                                                                enctype="multipart/form-data"
                                                                                                                method="post">
                                                                                                                <div
                                                                                                                    class="row ">

                                                                                                                    {{csrf_field()}}

                                                                                                                    <input
                                                                                                                        hidden="hidden"
                                                                                                                        name="type"
                                                                                                                        value="size">


                                                                                                                    <div
                                                                                                                        class="col-xl-12">
                                                                                                                        <div
                                                                                                                            class="form-group row">
                                                                                                                            <label
                                                                                                                                class="col-lg-3 col-form-label text-center"
                                                                                                                                for="name">
                                                                                                                                سایز
                                                                                                                                موجود
                                                                                                                            </label>
                                                                                                                            <div
                                                                                                                                class="col-lg-9">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="name"
                                                                                                                                    name="name"
                                                                                                                                    value="{{isset($size['name'])?$size['name']:''}}"
                                                                                                                                    placeholder="نام سایز موجود">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-xl-12">
                                                                                                                        <div
                                                                                                                            class="form-group row">
                                                                                                                            <label
                                                                                                                                class="col-lg-12 col-form-label text-center"
                                                                                                                                for="addition">
                                                                                                                                افزایش
                                                                                                                                قیمت
                                                                                                                                (نسبت
                                                                                                                                به
                                                                                                                                قیمت
                                                                                                                                پایه
                                                                                                                                یا
                                                                                                                                افزون
                                                                                                                                بر
                                                                                                                                آن)
                                                                                                                                <br>
                                                                                                                                <i style="color: darkgoldenrod">لطفا
                                                                                                                                    یک
                                                                                                                                    مورد
                                                                                                                                    را
                                                                                                                                    انتخاب
                                                                                                                                    کنید</i>
                                                                                                                            </label>
                                                                                                                            <div
                                                                                                                                class="col-lg-4">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="addition"
                                                                                                                                    name="addition"
                                                                                                                                    value="{{$size['status'] == 'addition'?$size["addPrice"]:''}}"
                                                                                                                                    placeholder="افزون بر قیمت">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-lg-4">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="percentage"
                                                                                                                                    name="percentage"
                                                                                                                                    value="{{$size['status'] == 'percentage'?$size["addPrice"]:''}}"
                                                                                                                                    placeholder="درصد به قیمت">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-lg-4">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="ratio"
                                                                                                                                    name="ratio"
                                                                                                                                    value="{{$size['status'] == 'ratio'?$size["addPrice"]:''}}"
                                                                                                                                    placeholder="ضریب به قیمت ">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>


                                                                                                                    <button
                                                                                                                        type="submit"
                                                                                                                        class="btn  btn-block btn-success">
                                                                                                                        ثبت
                                                                                                                    </button>

                                                                                                                </div>
                                                                                                            </form>

                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-dark light"
                                                                                                            data-dismiss="modal">
                                                                                                            بستن
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        {{--Modal For delete--}}
                                                                                        <div class="modal fade"
                                                                                             id="delSize{{$key}}">
                                                                                            <div
                                                                                                class="modal-dialog modal-dialog-centered"
                                                                                                role="document">
                                                                                                <div
                                                                                                    class="modal-content">
                                                                                                    <div
                                                                                                        class="modal-header">
                                                                                                        <h5 class="modal-title">
                                                                                                            حذف
                                                                                                            سایز {{$size['name']}}
                                                                                                        </h5>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="close"
                                                                                                            data-dismiss="modal">
                                                                                                            <span>&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-body">


                                                                                                        <div
                                                                                                            class="col-12">

                                                                                                            <p>
                                                                                                                آیا از
                                                                                                                حذف این
                                                                                                                ویژگی و
                                                                                                                قیمت آن
                                                                                                                روی
                                                                                                                محصول
                                                                                                                اطمینان
                                                                                                                دارید؟
                                                                                                                <br>
                                                                                                                <i style="color: darkorange">
                                                                                                                    این
                                                                                                                    کار
                                                                                                                    قابل
                                                                                                                    برگشت
                                                                                                                    نیست
                                                                                                                </i>
                                                                                                            </p>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-dark light"
                                                                                                            data-dismiss="modal">
                                                                                                            بستن
                                                                                                        </button>
                                                                                                        <a href="{{route('dashboard.shop.product.delExtra' , ['size' , $product->id , $key])}}"
                                                                                                           class="btn btn-outline-danger light"
                                                                                                        >
                                                                                                            حذف
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    @endforeach
                                                                                @endif
                                                                            </ul>
                                                                            <div class="ps__rail-x"
                                                                                 style="left: 0px; bottom: 0px;">
                                                                                <div class="ps__thumb-x" tabindex="0"
                                                                                     style="left: 0px; width: 0px;"></div>
                                                                            </div>
                                                                            <div class="ps__rail-y"
                                                                                 style="top: 0px; height: 370px; left: 296px;">
                                                                                <div class="ps__thumb-y" tabindex="0"
                                                                                     style="top: 0px; height: 236px;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-xl-4 col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-header border-0 pb-0">
                                                                        <h4 class="card-title">جنس های (متریال)
                                                                            موجود</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div id="DZ_W_TimeLine1"
                                                                             class="widget-timeline dz-scroll style-1 ps ps--active-y"
                                                                             style="height:370px;">
                                                                            <ul class="timeline">
                                                                                @if(count($product->material) > 0)
                                                                                    @foreach($product->material as $key =>$material)
                                                                                        <div
                                                                                            class="col-xl-12 col-lg-12 col-sm-12">
                                                                                            <div
                                                                                                class="widget-stat card">
                                                                                                <div
                                                                                                    class="card-body p-4">
                                                                                                    <div
                                                                                                        class="media ai-icon">
									<span class="mr-3">
										<svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-database">
											<path d="M3,5A9,3 0,1,1 21,5A9,3 0,1,1 3,5"
                                                  style="stroke-dasharray: 41px, 61px; stroke-dashoffset: 0px;"></path>
											<path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"
                                                  style="stroke-dasharray: 21px, 41px; stroke-dashoffset: 0px;"></path>
											<path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"
                                                  style="stroke-dasharray: 49px, 69px; stroke-dashoffset: 0px;"></path>
										</svg>						</span>
                                                                                                        <div
                                                                                                            class="media-body">
                                                                                                            <p class="mb-1">
                                                                                                                {{$material['name']}}</p>
                                                                                                            <h4 class="mb-0">
                                                                                                                {{$material['addPrice']}}</h4>
                                                                                                            <span
                                                                                                                class="badge badge-warning">
                                                                                                                 @if($material['status']=='percentage')
                                                                                                                    %
                                                                                                                    درصد
                                                                                                                @elseif($material['status']=='ratio')
                                                                                                                    *
                                                                                                                    ضریب
                                                                                                                @elseif($material['status']=='addition')
                                                                                                                    +
                                                                                                                    تومان
                                                                                                                @endif
                                                                                                            </span>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="row mt-3 ml-2">
                                                                                                        <a href="#"
                                                                                                           class="btn btn-primary btn-xxs shadow col-5 mr-1"
                                                                                                           data-toggle="modal"
                                                                                                           data-target="#editMaterial{{$key}}">ویرایش </a>
                                                                                                        <a href="#"
                                                                                                           class="btn btn-outline-danger btn-block btn-xxs shadow col-5"
                                                                                                           data-toggle="modal"
                                                                                                           data-target="#delMaterial{{$key}}">حذف</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                        {{--Modal For editing--}}
                                                                                        <div class="modal fade"
                                                                                             id="editMaterial{{$key}}">
                                                                                            <div
                                                                                                class="modal-dialog modal-dialog-centered"
                                                                                                role="document">
                                                                                                <div
                                                                                                    class="modal-content">
                                                                                                    <div
                                                                                                        class="modal-header">
                                                                                                        <h5 class="modal-title">
                                                                                                            ویرایش
                                                                                                            جنس {{$material['name']}} </h5>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="close"
                                                                                                            data-dismiss="modal">
                                                                                                            <span>&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-body">


                                                                                                        <div
                                                                                                            class="col-12">

                                                                                                            <form
                                                                                                                class="form-valide"
                                                                                                                action="{{route('dashboard.shop.product.saveExtra',[$product->id , 'material' , $key])}}"
                                                                                                                enctype="multipart/form-data"
                                                                                                                method="post">
                                                                                                                <div
                                                                                                                    class="row ">

                                                                                                                    {{csrf_field()}}

                                                                                                                    <input
                                                                                                                        hidden="hidden"
                                                                                                                        name="type"
                                                                                                                        value="material">


                                                                                                                    <div
                                                                                                                        class="col-xl-12">
                                                                                                                        <div
                                                                                                                            class="form-group row">
                                                                                                                            <label
                                                                                                                                class="col-lg-3 col-form-label text-center"
                                                                                                                                for="name">
                                                                                                                                سایز
                                                                                                                                موجود
                                                                                                                            </label>
                                                                                                                            <div
                                                                                                                                class="col-lg-9">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="name"
                                                                                                                                    name="name"
                                                                                                                                    value="{{isset($material['name'])?$material['name']:''}}"
                                                                                                                                    placeholder="نام سایز موجود">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-xl-12">
                                                                                                                        <div
                                                                                                                            class="form-group row">
                                                                                                                            <label
                                                                                                                                class="col-lg-12 col-form-label text-center"
                                                                                                                                for="addition">
                                                                                                                                افزایش
                                                                                                                                قیمت
                                                                                                                                (نسبت
                                                                                                                                به
                                                                                                                                قیمت
                                                                                                                                پایه
                                                                                                                                یا
                                                                                                                                افزون
                                                                                                                                بر
                                                                                                                                آن)
                                                                                                                                <br>
                                                                                                                                <i style="color: darkgoldenrod">لطفا
                                                                                                                                    یک
                                                                                                                                    مورد
                                                                                                                                    را
                                                                                                                                    انتخاب
                                                                                                                                    کنید</i>
                                                                                                                            </label>
                                                                                                                            <div
                                                                                                                                class="col-lg-4">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="addition"
                                                                                                                                    name="addition"
                                                                                                                                    value="{{$material['status'] == 'addition'?$material["addPrice"]:''}}"
                                                                                                                                    placeholder="افزون بر قیمت">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-lg-4">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="percentage"
                                                                                                                                    name="percentage"
                                                                                                                                    value="{{$material['status'] == 'percentage'?$material["addPrice"]:''}}"
                                                                                                                                    placeholder="درصد به قیمت">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-lg-4">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    id="ratio"
                                                                                                                                    name="ratio"
                                                                                                                                    value="{{$material['status'] == 'ratio'?$material["addPrice"]:''}}"
                                                                                                                                    placeholder="ضریب به قیمت ">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>


                                                                                                                    <button
                                                                                                                        type="submit"
                                                                                                                        class="btn  btn-block btn-success">
                                                                                                                        ثبت
                                                                                                                    </button>

                                                                                                                </div>
                                                                                                            </form>

                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-dark light"
                                                                                                            data-dismiss="modal">
                                                                                                            بستن
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        {{--Modal For delete--}}
                                                                                        <div class="modal fade"
                                                                                             id="delMaterial{{$key}}">
                                                                                            <div
                                                                                                class="modal-dialog modal-dialog-centered"
                                                                                                role="document">
                                                                                                <div
                                                                                                    class="modal-content">
                                                                                                    <div
                                                                                                        class="modal-header">
                                                                                                        <h5 class="modal-title">
                                                                                                            حذف
                                                                                                            جنس {{$material['name']}}
                                                                                                        </h5>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="close"
                                                                                                            data-dismiss="modal">
                                                                                                            <span>&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-body">


                                                                                                        <div
                                                                                                            class="col-12">

                                                                                                            <p>
                                                                                                                آیا از
                                                                                                                حذف این
                                                                                                                ویژگی و
                                                                                                                قیمت آن
                                                                                                                روی
                                                                                                                محصول
                                                                                                                اطمینان
                                                                                                                دارید؟
                                                                                                                <br>
                                                                                                                <i style="color: darkorange">
                                                                                                                    این
                                                                                                                    کار
                                                                                                                    قابل
                                                                                                                    برگشت
                                                                                                                    نیست
                                                                                                                </i>
                                                                                                            </p>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-dark light"
                                                                                                            data-dismiss="modal">
                                                                                                            بستن
                                                                                                        </button>
                                                                                                        <a href="{{route('dashboard.shop.product.delExtra' , ['material' , $product->id , $key])}}"
                                                                                                           class="btn btn-outline-danger light"
                                                                                                        >
                                                                                                            حذف
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    @endforeach
                                                                                @endif
                                                                            </ul>
                                                                            <div class="ps__rail-x"
                                                                                 style="left: 0px; bottom: 0px;">
                                                                                <div class="ps__thumb-x" tabindex="0"
                                                                                     style="left: 0px; width: 0px;"></div>
                                                                            </div>
                                                                            <div class="ps__rail-y"
                                                                                 style="top: 0px; height: 370px; left: 296px;">
                                                                                <div class="ps__thumb-y" tabindex="0"
                                                                                     style="top: 0px; height: 236px;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <button type="button"
                                                                        class="btn btn-rounded  btn-info btn-block"
                                                                        data-toggle="modal"
                                                                        data-target="#addColor"><span
                                                                        class="btn-icon-left text-info"><i
                                                                            class="fa fa-plus color-info"></i>
                                                                                                                </span>
                                                                    افزودن رنگ
                                                                </button>
                                                            </div>
                                                            <div class="col-4">
                                                                <button type="button"
                                                                        class="btn btn-rounded  btn-primary btn-block"
                                                                        data-toggle="modal" data-target="#addSize"><span
                                                                        class="btn-icon-left text-info"><i
                                                                            class="fa fa-plus color-info"></i>
                                                                                                                </span>
                                                                    افزودن سایز
                                                                </button>
                                                            </div>
                                                            <div class="col-4">
                                                                <button type="button"
                                                                        class="btn btn-rounded  btn-dark btn-block"
                                                                        data-toggle="modal"
                                                                        data-target="#addMaterial"><span
                                                                        class="btn-icon-left text-info"><i
                                                                            class="fa fa-plus color-info"></i>
                                                                                                                </span>
                                                                    افزودن جنس
                                                                </button>
                                                            </div>

                                                            {{--Modal For adding--}}
                                                            <div class="modal fade" id="addColor">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                     role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">افرودن رنگ</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal">
                                                                                <span>&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">


                                                                            <div class="col-12">

                                                                                <form class="form-valide"
                                                                                      action="{{route('dashboard.shop.product.saveExtra',$product->id)}}"
                                                                                      enctype="multipart/form-data"
                                                                                      method="post">
                                                                                    <div class="row ">

                                                                                        {{csrf_field()}}

                                                                                        <input hidden="hidden"
                                                                                               name="type"
                                                                                               value="color">

                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-lg-3 col-form-label text-center"
                                                                                                    for="colorCode"> رنگ
                                                                                                    موجود
                                                                                                </label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input type="color"
                                                                                                           class="form-control"
                                                                                                           id="colorCode"
                                                                                                           name="colorCode"
                                                                                                           value="#ffffff"
                                                                                                           placeholder=" رنگ موجود">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-lg-3 col-form-label text-center"
                                                                                                    for="name"> رنگ
                                                                                                    موجود
                                                                                                </label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="name"
                                                                                                           name="name"
                                                                                                           value=""
                                                                                                           placeholder="نام رنگ موجود">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-lg-12 col-form-label text-center"
                                                                                                    for="addition">
                                                                                                    افزایش قیمت (نسبت به
                                                                                                    قیمت پایه یا افزون
                                                                                                    بر آن)
                                                                                                    <br>
                                                                                                    <i style="color: darkgoldenrod">لطفا
                                                                                                        یک مورد را
                                                                                                        انتخاب کنید</i>
                                                                                                </label>
                                                                                                <div class="col-lg-4">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="addition"
                                                                                                           name="addition"
                                                                                                           value=""
                                                                                                           placeholder="افزون بر قیمت">
                                                                                                </div>
                                                                                                <div class="col-lg-4">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="percentage"
                                                                                                           name="percentage"
                                                                                                           value=""
                                                                                                           placeholder="درصد به قیمت">
                                                                                                </div>
                                                                                                <div class="col-lg-4">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="ratio"
                                                                                                           name="ratio"
                                                                                                           value=""
                                                                                                           placeholder="ضریب به قیمت ">
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
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-dark light"
                                                                                    data-dismiss="modal">بستن
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade" id="addSize">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                     role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">افرودن سایز</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal">
                                                                                <span>&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">


                                                                            <div class="col-12">

                                                                                <form class="form-valide"
                                                                                      action="{{route('dashboard.shop.product.saveExtra',$product->id)}}"
                                                                                      enctype="multipart/form-data"
                                                                                      method="post">
                                                                                    <div class="row ">

                                                                                        {{csrf_field()}}

                                                                                        <input hidden="hidden"
                                                                                               name="type" value="size">
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-lg-3 col-form-label text-center"
                                                                                                    for="colorName">
                                                                                                    سایز
                                                                                                    موجود
                                                                                                </label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="name"
                                                                                                           name="name"
                                                                                                           value=""
                                                                                                           placeholder="سایز موجود">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-lg-12 col-form-label text-center"
                                                                                                    for="addition">
                                                                                                    افزایش قیمت (نسبت به
                                                                                                    قیمت پایه یا افزون
                                                                                                    بر آن)
                                                                                                    <br>
                                                                                                    <i style="color: darkgoldenrod">لطفا
                                                                                                        یک مورد را
                                                                                                        انتخاب کنید</i>
                                                                                                </label>
                                                                                                <div class="col-lg-4">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="addition"
                                                                                                           name="addition"
                                                                                                           value=""
                                                                                                           placeholder="افزون بر قیمت">
                                                                                                </div>
                                                                                                <div class="col-lg-4">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="percentage"
                                                                                                           name="percentage"
                                                                                                           value=""
                                                                                                           placeholder="درصد به قیمت">
                                                                                                </div>
                                                                                                <div class="col-lg-4">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="ratio"
                                                                                                           name="ratio"
                                                                                                           value=""
                                                                                                           placeholder="ضریب به قیمت ">
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
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-dark light"
                                                                                    data-dismiss="modal">بستن
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade" id="addMaterial">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                     role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">افرودن جنس</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal">
                                                                                <span>&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">


                                                                            <div class="col-12">

                                                                                <form class="form-valide"
                                                                                      action="{{route('dashboard.shop.product.saveExtra' ,$product->id)}}"
                                                                                      enctype="multipart/form-data"
                                                                                      method="post">
                                                                                    <div class="row ">

                                                                                        {{csrf_field()}}

                                                                                        <input hidden="hidden"
                                                                                               name="type"
                                                                                               value="material">
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-lg-3 col-form-label text-center"
                                                                                                    for="colorName"> جنس
                                                                                                    موجود
                                                                                                </label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="name"
                                                                                                           name="name"
                                                                                                           value=""
                                                                                                           placeholder="نام جنس موجود">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-lg-12 col-form-label text-center"
                                                                                                    for="addition">
                                                                                                    افزایش قیمت (نسبت به
                                                                                                    قیمت پایه یا افزون
                                                                                                    بر آن)
                                                                                                    <br>
                                                                                                    <i style="color: darkgoldenrod">لطفا
                                                                                                        یک مورد را
                                                                                                        انتخاب کنید</i>
                                                                                                </label>
                                                                                                <div class="col-lg-4">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="addition"
                                                                                                           name="addition"
                                                                                                           value=""
                                                                                                           placeholder="افزون بر قیمت">
                                                                                                </div>
                                                                                                <div class="col-lg-4">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="percentage"
                                                                                                           name="percentage"
                                                                                                           value=""
                                                                                                           placeholder="درصد به قیمت">
                                                                                                </div>
                                                                                                <div class="col-lg-4">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="ratio"
                                                                                                           name="ratio"
                                                                                                           value=""
                                                                                                           placeholder="ضریب به قیمت ">
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
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-dark light"
                                                                                    data-dismiss="modal">بستن
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 ">
                                                <div class="card ">
                                                    <div class="card-header">
                                                        <h4 class="card-title">قابلیت های خاص</h4>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <div class="form-validation">
                                                            <form class="form-validate"
                                                                  action="{{route('dashboard.shop.product.saveExtra' , isset($product)? $product->id :-1)}}"
                                                                  enctype="multipart/form-data" method="post">
                                                                <div class="row ">

                                                                    {{csrf_field()}}


                                                                    <div class="col-xl-12">
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-lg-4 col-form-label text-center"
                                                                                for="discount">درصد تخفیف
                                                                            </label>
                                                                            <div class="col-lg-6">
                                                                                <input type="text" class="form-control"
                                                                                       id="discount" name="discount"
                                                                                       value="{{(isset($product)?$product->discount : (old('discount') ? old('discount') : ''))}}"
                                                                                       placeholder="درصد تخفیف (%) ">
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                    <button type="submit"
                                                                            class="btn  btn-block btn-success">اعمال
                                                                    </button>

                                                                </div>
                                                            </form>
                                                        </div>
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
@endsection
