@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12 center">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات سفارش</h4>
                </div>
                <div class="card-body">

                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#orderData"><i
                                        class="la la-file-alt mr-2"></i> اطلاعات سفارش</a>
                            </li>

                            @if(isset($order))
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#extra"><i
                                            class="la la-list-ul mr-2"></i>
                                        عملیات</a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            @include('error')

                            <div class="tab-pane fade show active" id="orderData">
                                <div class="pt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">

                                                <div class="card-body">
                                                    <div class="form-validation">
                                                        <form class="form-validate"
                                                              action="{{route('dashboard.shop.order.save' , isset($order)? $order->id :-1)}}"
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
                                                                                   value="{{(isset($order)?$order->name : (old('name') ? old('name') : ''))}}"
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
                                                                                   value="{{(isset($order)?$order->BasePrice : (old('BasePrice') ? old('BasePrice') : ''))}}"
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
                                                                                            {{((isset($order) && $order->Category()->get()[0]->id==$cat->id )?'selected' : '')}}
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
                                                                {{--                                                   value="{{(isset($order)?$order->discount : (old('discount') ? old('discount') : ''))}}"--}}
                                                                {{--                                                   placeholder="درصد تخفیف  ">--}}
                                                                {{--                                        </div>--}}
                                                                {{--                                    </div>--}}

                                                                {{--                                </div>--}}

                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-lg-4 col-form-label text-center"
                                                                            for="available">موجود ؟
                                                                        </label>
                                                                        <div class="col-lg-8">
                                                                            <div class="col">
                                                                                <div
                                                                                    class="custom-control custom-checkbox mb-3 checkbox-success">
                                                                                    <input type="checkbox"
                                                                                           class="custom-control-input"
                                                                                           {{((isset($order) && $order->available )?'checked' : '')}}

                                                                                           id="available"
                                                                                           name="available">
                                                                                    <label class="custom-control-label"
                                                                                           for="available">بله</label>
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
                                                                                   value="{{(isset($order)?$order->weight : (old('weight') ? old('weight') : ''))}}"
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
                                                                                   value="{{(isset($order)?$order->image : (old('image') ? old('image') : ''))}}"
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
                                                {{isset($order)? $order->description : ''}}
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
                                        <div class="col-lg-6 ">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <h4 class="card-title">انتخاب محصول</h4>
                                                </div>
                                                <div class="card-body text-center">

                                                    @include('error')

                                                    <div class="table-responsive">
                                                        <table  id="example3" class="display" style="min-width: 845px;colo">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>id</th>
                                                                <th>نام محصول</th>
                                                                <th>عملیات</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(isset($products) && count($products) > 0)
                                                                @foreach($products as $product)
                                                                    <tr>

                                                                        <td>
                                                                            <img class="rounded-circle" width="35"
                                                                                 src="{{asset('storage/images/products/'.$product->id.'/'.$product->image)}}"
                                                                                 alt="">
                                                                        </td>
                                                                        <td>{{$product->id}}</td>
                                                                        <td>{{$product->name}}</td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                <button data-toggle="modal" data-target="#addToOrder{{$product->id}}" type="button" class="btn  btn-xs btn-success">افزودن به سبد <span class="btn-icon-right"><i class="fa fa-shopping-cart"></i></span>
                                                                                </button>


                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="addToOrder{{$product->id}}">
                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title">لطفا ویژگی محصول را انتخاب کنید  </h5>
                                                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <p>

                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-dark light" data-dismiss="modal">بستن</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif


                                                            </tbody>
                                                        </table>

                                                        <div class="card-body col-4 pull-left">
                                                            <a type="button" href="{{route('dashboard.shop.order.add')}}" class="btn btn-rounded btn-block btn-primary"><span
                                                                    class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>افزودن
                                                            </a>

                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($order))
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
                                                                                {{--                                                                                @dd($order->color)--}}
                                                                                @if(count($order->color) > 0)
                                                                                    @foreach($order->color as $key =>$color)

                                                                                        <li>
                                                                                            <div class="timeline-panel">
                                                                                                <div
                                                                                                    style="background-color: {{$color['color']}}"
                                                                                                    class="media mr-2 media-success">
                                                                                                    <i class="{{\App\Utility\orderAttribute::$icons[$color['status']]}}"></i>
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
                                                                                                                action="{{route('dashboard.shop.order.saveExtra',[$order->id , 'color' , $key])}}"
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
                                                                                                        <a href="{{route('dashboard.shop.order.delExtra' , ['color' , $order->id , $key])}}"
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
                                                                                @if(count($order->size) > 0)
                                                                                    @foreach($order->size as $key =>$size)
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
                                                                                                                action="{{route('dashboard.shop.order.saveExtra',[$order->id , 'size' , $key])}}"
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
                                                                                                        <a href="{{route('dashboard.shop.order.delExtra' , ['size' , $order->id , $key])}}"
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
                                                                                @if(count($order->material) > 0)
                                                                                    @foreach($order->material as $key =>$material)
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
                                                                                                                action="{{route('dashboard.shop.order.saveExtra',[$order->id , 'material' , $key])}}"
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
                                                                                                        <a href="{{route('dashboard.shop.order.delExtra' , ['material' , $order->id , $key])}}"
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
                                                                                      action="{{route('dashboard.shop.order.saveExtra',$order->id)}}"
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
                                                                                      action="{{route('dashboard.shop.order.saveExtra',$order->id)}}"
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
                                                                                      action="{{route('dashboard.shop.order.saveExtra' ,$order->id)}}"
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
                                                                  action="{{route('dashboard.shop.order.saveExtra' , isset($order)? $order->id :-1)}}"
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
                                                                                       value="{{(isset($order)?$order->discount : (old('discount') ? old('discount') : ''))}}"
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
