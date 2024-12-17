@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> شغل {{$contact->firstName.' '.$contact->lastName}}</h4>
                </div>
                <div class="card">

                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide"
                                  action="{{route('dashboard.contact.addSaveJob' , isset($job)? $job->id :-1)}}"
                                  enctype="multipart/form-data" method="post">
                                <div class="row ">

                                    @include('error')
                                    {{csrf_field()}}

                                    <input type="hidden" name="contact_id" value="{{$contact->id}}" autocomplete="off">


                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="location">محل خدمت
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                       id="location" name="location"
                                                       value="{{(isset($job)?$job->location : (old('location') ? old('location') : ''))}}"
                                                       placeholder=" محل خدمت ">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="position">سمت
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                       id="position" name="position"
                                                       value="{{(isset($job)?$job->position : (old('position') ? old('position') : ''))}}"
                                                       placeholder=" سمت ">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="duration">مدت خدمت
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                       id="duration" name="duration"
                                                       value="{{(isset($job)?$job->duration : (old('duration') ? old('duration') : ''))}}"
                                                       placeholder="مدت خدمت">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-center"
                                                   for="city">شهر خدمت
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"
                                                       id="city" name="city"
                                                       value="{{(isset($job)?$job->city : (old('city') ? old('city') : ''))}}"
                                                       placeholder=" شهر خدمت ">
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
