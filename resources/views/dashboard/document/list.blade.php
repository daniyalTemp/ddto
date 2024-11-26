@extends('back.layout.main')

@section('content')

    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست مستندات </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px;">
                            <thead>
                            <tr>
                                <th></th>
                                <th>سرشناسه</th>
                                <th>عنوان و نام پدیدآور</th>
                                <th>زبان</th>
                                <th>شماره بازیابی نسخه</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($documents))
                                @foreach($documents as $document)
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                 src="{{asset('storage/images/documents/'.$document->image)}}" alt="">
                                        </td>
                                        <td>{{$document->document_id}}</td>
                                        <td>{{$document->author}}</td>
                                        <td><a href="javascript:void(0);"><strong>{{$document->language}}</strong></a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);"><strong>{{$document->version_recovery_number}}</strong></a>
                                        </td>


                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('dashboard.document.edit' , $document->id)}}"
                                                   class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('dashboard.document.del' , $document->id)}}"
                                                   class="btn btn-danger shadow btn-xs sharp" data-toggle="modal"
                                                   data-target="#delete{{$document->id}}"><i
                                                        class="fa fa-trash"></i></a>


                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{{$document->id}}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">حذف سند</h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    ایا از حذف سند
                                                                    {{$document->document_id.'  از '.$document->author}}

                                                                    اطمینان دارید؟
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark light"
                                                                        data-dismiss="modal">بستن
                                                                </button>
                                                                <a href="{{route('dashboard.document.del' , $document->id)}}"
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
                            <a type="button" href="{{route('dashboard.document.add')}}"
                               class="btn btn-rounded btn-block btn-primary"><span
                                    class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>افزودن
                            </a>

                        </div>

                        <div class="card-body col-8 pull-right">
                            <form class="form-valide"
                                  action="{{route('dashboard.document.import')}}"
                                  enctype="multipart/form-data" method="post">
                                <div class="row ">

                                    @include('error')
                                    {{csrf_field()}}


                                    <div class="col-xl-8">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="exelFile">فایل اکسل
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                           name="exelFile">
                                                    <label class="custom-file-label">انتخاب
                                                        فایل</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <br>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-rounded btn-block btn-success"><span
                                                class="btn-icon-left text-info"><i class="fa fa-upload color-info"></i>
                                    </span>آپلود
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
