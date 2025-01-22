@extends('dashboard.layout.main')

@section('content')

    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست پست های وبلاگ </h4>
                </div>
                <div class="card-body">
                    @include('error')

                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px;colo">
                            <thead>
                            <tr>
                                <th></th>
                                <th>عنوان</th>
                                <th>نمایش</th>
                                <th>بازدید</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($blogs))
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$blog->id}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>
                                            @if($blog->show)
                                                <a href="#" class="btn btn-success shadow btn-xs sharp"
                                                   data-toggle="modal" ><i
                                                        class="fa fa-check-circle"></i></a>
                                            @else
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"   ><i
                                                        class="fa fa-crosshairs"></i></a>
                                            @endif
                                        </td>
                                        <td>{{$blog->seen}}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('dashboard.blog.edit' , $blog->id)}}"
                                                   class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"
                                                   data-toggle="modal" data-target="#delete{{$blog->id}}"><i
                                                        class="fa fa-trash"></i></a>


                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{{$blog->id}}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">حذف دسته بندی </h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    ایا از حذف آیتم
                                                                    {{$blog->title}}

                                                                    اطمینان دارید؟
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark light"
                                                                        data-dismiss="modal">بستن
                                                                </button>
                                                                <a href="{{route('dashboard.blog.delete' , $blog->id)}}"
                                                                   class="btn btn-danger">حذف</a>
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
                            <a type="button" href="{{route('dashboard.blog.add')}}"
                               class="btn btn-rounded btn-block btn-primary"><span
                                    class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>افزودن
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
