@if($errors->any())
    <div class="alert  panel panel-danger alert-danger  text-left "style="background-color: #792222;color: aliceblue">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


{{--@if($errors->any())--}}
{{--    <div class="alert alert-danger backcolor text-left">--}}


{{--            <div class="panel panel-danger backcolor text-center">--}}
{{--                <div class="panel-heading">خطا </div>--}}
{{--                    <div class="alert alert-danger backcolor text-left">--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                            <p>{{ $error }}</p>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}

{{--                <div class="panel-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-12 col-md-6 col-md-offset-3">--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--@endif--}}
