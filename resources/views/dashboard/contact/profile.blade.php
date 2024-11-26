@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="{{asset('storage/images/contacts/'.$contact->image)}}"
                                 class="img-fluid rounded-circle" alt="{{$contact->fullName()}}">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-3">
                                <h4 class="text-primary mb-0">{{$contact->fullname()}}</h4>

                            </div>

                            <div class="dropdown ml-auto">
                                <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown"
                                   aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                        </g>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-169px, 30px, 0px);">
                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> نمایش
                                        پروفایل
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="profile-statistics mb-5">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-sm-6">
                                    <div class="widget-stat card">
                                        <div class="card-body p-4">
                                            <div class="media ai-icon">
									<span class="mr-3">
										<!-- <i class="ti-user"></i> -->
										<i class="fa fa-paperclip"></i>							</span>
                                                <div class="media-body">
                                                    <p class="mb-1">مقالات</p>
                                                    <h4 class="mb-0">{{count($contact->papers()->get())}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-sm-6">
                                    <div class="widget-stat card">
                                        <div class="card-body p-4">
                                            <div class="media ai-icon">
									<span class="mr-3">
										<!-- <i class="ti-user"></i> -->
										<i class="fa fa-book"></i>				</span>
                                                <div class="media-body">
                                                    <p class="mb-1">کتاب </p>
                                                    <h4 class="mb-0">{{count($contact->books()->get())}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-sm-6">
                                    <div class="widget-stat card">
                                        <div class="card-body p-4">
                                            <div class="media ai-icon">
									<span class="mr-3">
										<!-- <i class="ti-user"></i> -->
									<i class="fa fa-link"></i></span>
                                                <div class="media-body">
                                                    <p class="mb-1">اسناد </p>
                                                    <h4 class="mb-0">{{count($contact->Documents()->get())}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--                                <div class="col">--}}
                                {{--                                    <h3 class="m-b-0">{{count($contact->papers()->get())}}</h3><span>مقالات </span>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col">--}}
                                {{--                                    <h3 class="m-b-0">{{count($contact->books()->get())}}</h3><span>کتاب ها</span>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col">--}}
                                {{--                                    <h3 class="m-b-0">{{count($contact->Documents()->get())}}</h3><span>اسناد مرتبط </span>--}}
                                {{--                                </div>--}}
                            </div>

                        </div>
                    </div>
                    <div class="profile-blog mb-5">
                        <h4>علاقمندی ها</h4>
                        <p class="mb-0">
                            {{$contact->interests}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">

                                <li class="nav-item"><a href="#information" data-toggle="tab"
                                                        class="nav-link active show">اطلاعات فردی</a>
                                </li>
                                <li class="nav-item"><a href="#educations" data-toggle="tab"
                                                        class="nav-link ">تحصیلات</a>
                                </li>
                                <li class="nav-item"><a href="#jobs" data-toggle="tab" class="nav-link ">سوابق کاری</a>
                                </li>
                                <li class="nav-item"><a href="#papers" data-toggle="tab" class="nav-link"> مقالات
                                    </a>
                                </li>
                                <li class="nav-item"><a href="#books" data-toggle="tab" class="nav-link">کتاب ها </a>
                                </li>
                                <li class="nav-item"><a href="#documents" data-toggle="tab" class="nav-link">سند ها </a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <div id="information" class="tab-pane fade active show">
                                    <div class="row pt-4  text-center">

                                        <div class="col-xl-6 col-lg-6 col-xxl-6 col-sm-12">
                                            <div class="card text-white bg-gray-dark ">
                                                <ul class="list-group list-group-flush ">
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">نام :</span><strong>{{$contact->firstName}}</strong></li>
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">نام خانوادگی :</span><strong>{{$contact->lastName}}</strong></li>
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">تلفن :</span><strong>{{$contact->phone}}</strong></li>
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">ایمیل :</span><strong>{{$contact->email}}</strong></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-xxl-6 col-sm-12">
                                            <div class="card text-white bg-gray-dark ">
                                                <ul class="list-group list-group-flush ">
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">تاریخ تولد :</span><strong>{{$contact->birthday}}</strong></li>
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">محل سکونت :</span><strong>{{$contact->address}}</strong></li>
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">جنسیت  :</span><strong>{{$contact->sex->Farsi}}</strong></li>
                                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">نوع کاربری :</span><strong>{{$contact->type->Farsi}}</strong></li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div id="educations" class="tab-pane fade ">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-sm-12 pt-5">
                                            <div class="row">
                                                @if(isset($contact) && count($contact->Educations()->get()) > 0)
                                                    @foreach($contact->Educations()->get() as $education)
                                                        <div class="col-xl-4 col-lg-6 col-sm-6">
                                                            <div class="widget-stat card bg-secondary">
                                                                <div class="card-body p-4">
                                                                    <div class="media">
									                                                <span class="mr-3">
						    			                                                    	<i class="la la-graduation-cap"></i>
                                                                                    </span>
                                                                        <div class="media-body text-white">
                                                                            <p class="mb-1">{{$education->grade}}
                                                                                -- {{$education->major}}</p>
                                                                            <h3 class="text-white">{{$education->year}}</h3>
                                                                            <div class="progress mb-2 bg-primary">
                                                                                <div
                                                                                    class="progress-bar progress-animated bg-light"
                                                                                    style="width: 100%"></div>
                                                                            </div>
                                                                            <small>{{$education->uni}}
                                                                                -- {{$education->location}} </small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="jobs" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-sm-12 pt-5">
                                            <div class="row">
                                                @if(isset($contact) && count($contact->Jobs()->get()) > 0)
                                                    @foreach($contact->Jobs()->get() as $job)
                                                        <div class="col-xl-4 col-lg-6 col-sm-6">
                                                            <div class="widget-stat card bg-dark">
                                                                <div class="card-body p-4">
                                                                    <div class="media">
									                                                <span class="mr-3">
						    			                                                    	<i class="la la-building-o"></i>
                                                                                    </span>
                                                                        <div class="media-body text-white">
                                                                            <p class="mb-1">{{$job->position}}
                                                                                -- {{$job->duration}}</p>
                                                                            <small class="text-white">{{$job->year}}</small>
                                                                            <div class="progress mb-2 bg-primary">
                                                                                <div
                                                                                    class="progress-bar progress-animated bg-light"
                                                                                    style="width: 100%"></div>
                                                                            </div>
                                                                            <small>{{$job->city}}
                                                                                -- {{$job->location}} </small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="papers" class="tab-pane fade">
                                    <div class="row pt-3">

                                        @if(isset($contact) && count( $contact->Papers()->get()) > 0)
                                            @foreach( $contact->Papers()->get() as $paper)
                                                <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body" style="background: #403e5147">
                                                            <div class="new-arrival-product">
                                                                <div class="new-arrivals-img-contnent">
                                                                    <img class="img-fluid" src="{{asset('storage/images/papers/'.$paper->image)}}" alt="">
                                                                </div>
                                                                <div class="new-arrival-content text-center mt-3">
                                                                    <h4>{{$paper->title}}</h4>
                                                                    <p>{{$paper->publication}} -- {{$paper->magazine}}</p>

                                                                    <span class="price">{{$paper->year}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                                <div id="books" class="tab-pane fade">
                                    <div class="row pt-3">

                                        @if(isset($contact) && count( $contact->Books()->get()) > 0)
                                            @foreach( $contact->Books()->get() as $book)
                                                <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body" style="background: #403e5147">
                                                            <div class="new-arrival-product">
                                                                <div class="new-arrivals-img-contnent">
                                                                    <img class="img-fluid" src="{{asset('storage/images/books/'.$book->image)}}" alt="">
                                                                </div>
                                                                <div class="new-arrival-content text-center mt-3">
                                                                    <h4>{{\Illuminate\Support\Str::limit($book->title)}}</h4>
                                                                    <p>{{\Illuminate\Support\Str::limit($book->publication )}} -- {{\Illuminate\Support\Str::limit($book->ISBN)}}</p>

                                                                    <span class="price">{{$book->year}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                                <div id="documents" class="tab-pane fade">
                                    <div class="row pt-3">

                                        @if(isset($contact) && count( $contact->Documents()->get()) > 0)
                                            @foreach( $contact->Documents()->get() as $document)
                                                <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body" style="background: #403e5147">
                                                            <div class="new-arrival-product">
                                                                <div class="new-arrivals-img-contnent">
                                                                    <img class="img-fluid" src="{{asset('storage/images/documents/'.$document->image)}}" alt="">
                                                                </div>
                                                                <div class="new-arrival-content text-center mt-3">
                                                                    <h4>{{\Illuminate\Support\Str::limit($document->document_id)}}</h4>
                                                                    <p>{{\Illuminate\Support\Str::limit($document->author )}} -- {{\Illuminate\Support\Str::limit($document->language)}}</p>

{{--                                                                    <span class="price">{{$document->year}}</span>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
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

@endsection
