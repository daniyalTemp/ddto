@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> تحصیلات {{$contact->firstName.' '.$contact->lastName}}</h4>
                </div>
                <div class="card">

                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide"
                                  action="{{route('dashboard.contact.addSaveEducation' , isset($education)? $education->id :-1)}}"
                                  enctype="multipart/form-data" method="post">
                                <div class="row ">

                                    @include('error')
                                    {{csrf_field()}}

                                    <input type="hidden" name="contact_id" value="{{$contact->id}}" autocomplete="off">


                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="grade">مقطع
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                       id="grade" name="grade"
                                                       value="{{(isset($education)?$education->grade : (old('grade') ? old('grade') : ''))}}"
                                                       placeholder=" مقطع ">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="major">رشته
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                       id="major" name="major"
                                                       value="{{(isset($education)?$education->major : (old('major') ? old('major') : ''))}}"
                                                       placeholder=" رشته ">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="location">محل تحصیل
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                       id="location" name="location"
                                                       value="{{(isset($education)?$education->location : (old('location') ? old('location') : ''))}}"
                                                       placeholder=" محل تحصیل ">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="uni">دانشکاه
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                       id="uni" name="uni"
                                                       value="{{(isset($education)?$education->uni : (old('uni') ? old('uni') : ''))}}"
                                                       placeholder=" دانشگاه ">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="year">سال اخذ مدرک
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                       id="year" name="year"
                                                       value="{{(isset($education)?$education->year : (old('year') ? old('year') : ''))}}"
                                                       placeholder=" سال اخذ مدرک ">
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <br>
                                <button type="submit" class="btn  btn-block btn-success">ثبت
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
