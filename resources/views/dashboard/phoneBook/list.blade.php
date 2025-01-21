@extends('dashboard.layout.main')

@section('content')

    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">دفترچه تلفن </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  id="example3" class="display" style="min-width: 845px;colo">
                            <thead>
                            <tr>
                                <th></th>
                                <th>تلفن</th>
                                <th>تاریخ ثبت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($phones))
                                @foreach($phones as $phone)
                                    <tr>
                                        <td>{{$phone->id}}</td>
                                        <td>{{$phone->phone}}</td>
                                        <td>
                                            {{verta($phone->created_at)->format('Y/m/d - H:i:s')}}
                                        </td>
                                        <td>
                                            <div class="d-flex">

                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"   data-toggle="modal" data-target="#{{$phone->id}}" ><i
                                                        class="fa fa-trash"></i></a>


                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{{$phone->id}}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">حذف کاربر</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    ایا از حذف آیتم


                                                                    اطمینان دارید؟
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark light" data-dismiss="modal">بستن</button>
                                                                <a href="#" class="btn btn-danger">حذف</a>
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


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
