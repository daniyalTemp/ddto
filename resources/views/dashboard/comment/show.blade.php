@extends('dashboard.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات </h4>
                </div>
                <div class="card-body">
                    @include('error')
                    <div class="col-xl-12 col-lg-12 col-sm-12">
                        <div class="card overflow-hidden">

                            <div class="card-body">
                                <div class="row text-center">

                                    <div class="col-lg-4 col-xl-4 col-sm-12 mt-4">
                                        <div class="bgl-primary rounded p-3">
                                            <h4 class="mb-0">{{$comment->firstName.' '.$comment->lastName}}</h4>
                                            <small>نام و نام خانوادگی</small>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-xl-4 col-sm-12 mt-4">
                                        <div class="bgl-primary rounded p-3">
                                            <h4 class="mb-0">{{$comment->phone}}</h4>
                                            <small>تلفن همراه</small>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-xl-4 col-sm-12 mt-4">

                                        <div class="bgl-primary rounded p-3">
                                            <h4 class="mb-0">{{$comment->email}}</h4>
                                            <small>ایمیل</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xl-3 col-sm-12 mt-4">
                                        <div class="bgl-primary rounded p-3">
                                            <h4 class="mb-0">{{$comment->email}}</h4>
                                            <small>ایمیل</small>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-xl-3 col-sm-12 mt-4">
                                        <div class="bgl-primary rounded p-3">
                                            <h4 class="mb-0">
                                                @if($comment->showInWebsite)
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1"
                                                         class="svg-main-icon">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <circle style="fill:#8088a1;" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
                                                            <path style="fill:#8088a1;"
                                                                  d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1"
                                                         class="svg-main-icon">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <circle style="fill:#8088a1;" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
                                                            <path style="fill:#8088a1;"
                                                                  d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"
                                                                  fill="#000000"/>
                                                        </g>
                                                    </svg>
                                                @endif


                                            </h4>
                                            <small>نمایش در سایت</small>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-xl-3 col-sm-12 mt-4">
                                        <div class="bgl-primary rounded p-3">
                                            <h4 class="mb-0">{{$comment->type=='contact'?'ارتباط' :'انتقاد و نظر'}}</h4>
                                            <small>نوع</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xl-3 col-sm-12 mt-4">
                                        <div class="bgl-primary rounded p-3">
                                            <h4 class="mb-0">
                                                @if($comment->seen)
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1"
                                                         class="svg-main-icon">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path style="fill:#8088a1;"
                                                                  d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"
                                                                  fill="#000000" opacity="0.3"/>
                                                            <path style="fill:#8088a1;"
                                                                  d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                                                  fill="#000000"/>
                                                        </g>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1"
                                                         class="svg-main-icon">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path style="fill:#8088a1;"
                                                                  d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                                  fill="#000000"/>
                                                            <circle style="fill:#8088a1;" fill="#000000" opacity="0.3"
                                                                    cx="19.5" cy="17.5" r="2.5"/>
                                                        </g>
                                                    </svg>
                                                @endif
                                            </h4>
                                            <small>وضعیت</small>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="card-footer mt-0 text-center">
                                <div class="col-12">
                                    <div class="bgl-primary rounded p-3">
                                        <h4 class="mb-0">{{$comment->msg}}</h4>
                                        <small> متن پیام</small>
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
                    <h4 class="card-title">عملیات</h4>
                </div>
                <div class="card-body text-center">
                    <div class="card overflow-hidden">

                        <div class="card-body">
                            <div class="row text-center">

                                @if($comment->showInWebsite)
                                    <div class="col-lg-12 col-xl-12 col-sm-12 mt-4">
                                        <div class=" rounded ">
                                            <a type="button" style="color: white" href="{{route('dashboard.comments.showInWeb' ,[$comment->id, 0 ])}}"
                                               class="btn btn-block btn-rounded btn-danger"><span
                                                    class="btn-icon-left text-danger "><i
                                                        class="fa fa-eraser color-success"></i>
                                    </span> عدم نمایش در سایت</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-12 col-xl-12 col-sm-12 mt-4">
                                        <div class=" rounded ">
                                            <a type="button" style="color: white" href="{{route('dashboard.comments.showInWeb' ,[$comment->id, -1 ])}}"
                                               class="btn btn-block btn-rounded btn-info "><span
                                                    class="btn-icon-left text-info "><i
                                                        class="fa fa-share color-success"></i>
                                    </span>نمایش در سایت</a>
                                        </div>
                                    </div>
                                @endif



                                @if($comment->seen)
                                    <div class="col-lg-12 col-xl-12 col-sm-12 mt-4">
                                        <div class=" rounded ">
                                            <a type="button" style="color: white" href="{{route('dashboard.comments.seen' ,[$comment->id, 0 ])}}"
                                               class="btn btn-block btn-rounded btn-info"><span
                                                    class="btn-icon-left text-dark"><i
                                                        class="fa fa-eye-slash color-success"></i>
                                    </span>خوانده نشد</a>
                                        </div>
                                    </div>

                                @else
                                    <div class="col-lg-12 col-xl-12 col-sm-12 mt-4">
                                        <div class=" rounded ">
                                            <a type="button" style="color: white" href="{{route('dashboard.comments.seen' ,[$comment->id, -1 ])}}"
                                               class="btn btn-block btn-rounded btn-dark"><span
                                                    class="btn-icon-left text-dark"><i
                                                        class="fa fa-eye color-success"></i>
                                    </span>خوانده شد</a>
                                        </div>
                                    </div>

                                @endif


                                <div class="col-lg-12 col-xl-12 col-sm-12 mt-4">
                                    <div class="bgl--primary rounded ">
                                        <a href="#" type="button" style="color: white"
                                           class="btn btn-block btn-rounded btn-warning " data-toggle="modal"
                                           data-target="#note"><span
                                                class="btn-icon-left text-warning"><i
                                                    class="fa fa-plus color-success"></i>
                                    </span>افزودن یادداشت</a>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="note">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">یادداشت شما</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card overflow-hidden">

                                                    <div class="card-body">
                                                        <div class="row text-center">

                                                            <div class="col-lg-12 col-xl-12v col-sm-12 ">
                                                                <div class="bgl-primary rounded p-3">
                                                                    <h4 class="mb-0">{{$comment->adminNote}}</h4>
                                                                    <small>یادداشت شما</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-xl-12v col-sm-12 mt-4">
                                                                <div class="bgl-primary rounded p-3">
                                                                    <h4 class="mb-0">{{verta($comment->updeated_at)->format('Y/m/d - H:i:s')}}</h4>
                                                                    <small>آخرین تغییر در</small>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="card-footer mt-0 text-center">
                                                        <div class="col-12">
                                                            <div class="bgl-primary rounded p-3">
                                                                <form class="form-valide"
                                                                      action="{{route('dashboard.comments.addNote' , $comment->id)}}"
                                                                      enctype="multipart/form-data" method="post">
                                                                    <div class="row ">

                                                                        {{csrf_field()}}
                                                                        <div class="col-xl-12">
                                                                            <div class="form-group row">

                                                                                <div class="col-lg-12">
                                                                                    <label
                                                                                        for="adminNote">یادداشت جدید</label><textarea
                                                                                                                          class="form-control"
                                                                                                                          id="adminNote"
                                                                                                                          name="adminNote">
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
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-dark light btn-block" data-dismiss="modal">
                                                    بستن
                                                </button>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer mt-0 text-center">
                            <div class="col-12">
                                <div class="bgl-primary rounded p-3">
                                    <h6 class="mb-0">{{verta($comment->created_at)->format('Y/m/d - H:i:s')}}</h6>
                                    <small> زمان ثبت </small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
