@extends('back.layout.main')

@section('content')

    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست پست ها</h4>
                </div>
                <div class="card-body">


                    <div class="row pt-3">

                        @if(isset($posts))
                            @foreach( $posts as $post)
                                <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="widget-stat card bg-secondary">
                                        <div class="card-body p-4">
                                            <div class="media">
									<span class="mr-3">
                                        @if($post->type=='music')
                                            <i class="la la-music"></i>
                                        @endif   @if($post->type=='poem')
                                            <i class="la la-poll-h"></i>
                                        @endif   @if($post->type=='text')
                                            <i class="la la-newspaper"></i>
                                        @endif
									</span>
                                                <a href="{{route('dashboard.post.edit' , $post->id)}}">

                                                    <div class="media-body text-white">
                                                        <p class="mb-1">{{$post->title}}</p>
                                                        @if($post->type=='music')
                                                            <h3 class="text-white">آهنگ</h3>
                                                        @endif   @if($post->type=='poem')
                                                            <h3 class="text-white">شعر</h3>
                                                        @endif   @if($post->type=='text')
                                                            <h3 class="text-white">دل نوشته</h3>
                                                        @endif
                                                        <div class="progress mb-2 bg-primary">
                                                            <div class="progress-bar progress-animated bg-light"
                                                                 style="width: 100%"></div>
                                                        </div>
                                                        <small>{{$post->visit}} - بازدید </small>
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="btn btn-block">
                                                <button  data-toggle="modal" data-target="#delete{{$post->id}}"  type="button" class="btn btn-danger btn-block">حذف <span
                                                        class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                </button>
                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="delete{{$post->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">حذف پست</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    ایا از حذف
                                                    {{$post->title}}

                                                    اطمینان دارید؟
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark light" data-dismiss="modal">بستن</button>
                                                <a href="{{route('dashboard.post.del' , $post->id)}}" class="btn btn-danger">حذف</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @endif

                    </div>
                    <div class="card-body col-4 pull-left">
                        <a type="button" href="{{route('dashboard.post.add')}}" class="btn btn-rounded btn-block btn-primary"><span
                                class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>افزودن
                        </a>

                    </div>
                </div>
            </div>

        </div>



    </div>
@endsection
