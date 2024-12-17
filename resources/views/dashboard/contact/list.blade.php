@extends('back.layout.main')

@section('content')

    <div class="row">

        <div class="col-lg-6 col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">  پیام های خوانده نشده </h4>
                </div>
                <div class="card-body">


                    <div class="row pt-3">

                        @if(isset($notSeen))
                            @foreach( $notSeen as $notSeencontact)
                                <div class="col-xl-4 col-lg-6 col-sm-6">
                                    <div class="widget-stat card bg-secondary">
                                        <div class="card-body p-3">
                                            <div class="media">
                                <span class="mr-3">
                                        <i class="la la-user"></i>

									</span>
                                                <a href="{{route('dashboard.post.edit' , $notSeencontact->id)}}">

                                                    <div class="media-body text-white">

                                                        <div class="progress mb-2 bg-primary">
                                                            <div class="progress-bar progress-animated bg-light"
                                                                 style="width: 100%"></div>
                                                        </div>
                                                        <small>{{$notSeencontact->name}} </small>
                                                        <small>{{$notSeencontact->phone}} </small>
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="row" >
                                                <button data-toggle="modal" data-target="#show{{$notSeencontact->id}}"
                                                        type="button" class="btn btn-primary btn-block  btn-xs ">مشاهده
                                                </button>
                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="show{{$notSeencontact->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">پیام {{$notSeencontact->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                                    <div class="card overflow-hidden">

                                                        <div class="card-body">
                                                            <div class="row text-center">
                                                                <div class="col-6">
                                                                    <div class="bgl-primary rounded p-3">
                                                                        <h4 class="mb-0">{{$notSeencontact->title}}</h4>
                                                                        <small>موضوع پیام</small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="bgl-primary rounded p-3">
                                                                        <h4 class="mb-0">{{$notSeencontact->phone}}</h4>
                                                                        <small>تلفن همراه</small>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="card-footer mt-0 text-center">
                                                            <div class="col-12">
                                                                <div class="bgl-primary rounded p-3">
                                                                    <h4 class="mb-0">{{$notSeencontact->text}}</h4>
                                                                    <small> متن پیام</small>
                                                                </div>
                                                            </div>                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark light" data-dismiss="modal">
                                                    بستن
                                                </button>
                                                <a href="{{route('dashboard.contact.seen' , $notSeencontact->id)}}"
                                                   class="btn btn-success">خوانده شده</a>
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
        <div class="col-lg-6 col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> همه پیام ها</h4>
                </div>
                <div class="card-body">


                    <div class="row pt-3">

                        @if(isset($all))
                            @foreach( $all as $contact)
                                <div class="col-xl-4 col-lg-6 col-sm-6">
                                    <div class="widget-stat card bg-secondary">
                                        <div class="card-body p-3">
                                            <div class="media">
                                <span class="mr-3">
                                        <i class="la la-user"></i>

									</span>
                                                <a href="{{route('dashboard.post.edit' , $contact->id)}}">

                                                    <div class="media-body text-white">

                                                        <div class="progress mb-2 bg-primary">
                                                            <div class="progress-bar progress-animated bg-light"
                                                                 style="width: 100%"></div>
                                                        </div>
                                                        <small>{{$contact->title}} </small>
                                                        <small>{{$contact->phone}} </small>
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="row" >
                                                <button data-toggle="modal" data-target="#show{{$contact->id}}"
                                                        type="button" class="btn btn-primary btn-block  btn-xs ">مشاهده
                                                </button>
                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="show{{$contact->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">پیام {{$contact->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-xl-12 col-lg-12 col-sm-12">
                                                    <div class="card overflow-hidden">

                                                        <div class="card-body">
                                                            <div class="row text-center">
                                                                <div class="col-6">
                                                                    <div class="bgl-primary rounded p-3">
                                                                        <h4 class="mb-0">{{$contact->title}}</h4>
                                                                        <small>موضوع پیام</small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="bgl-primary rounded p-3">
                                                                        <h4 class="mb-0">{{$contact->phone}}</h4>
                                                                        <small>تلفن همراه</small>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="card-footer mt-0 text-center">
                                                            <div class="col-12">
                                                                <div class="bgl-primary rounded p-3">
                                                                    <h4 class="mb-0">{{$contact->text}}</h4>
                                                                    <small> متن پیام</small>
                                                                </div>
                                                            </div>                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark light" data-dismiss="modal">
                                                    بستن
                                                </button>

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
@endsection
