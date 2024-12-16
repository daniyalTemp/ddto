<!DOCTYPE html>
<html lang="en" class="h-100">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ورود - -پنل مدیریت </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="admin/images/favicon.png">
    <link href="admin/css/style.css" rel="stylesheet">

</head>

<body class="h-100" style="background-color: #1E201E">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12" style="background-color: #3C3D37; color: white">
                            <div class="col-12">
                                <img style="width: 45%;margin-right: 27%;margin-top: 10%;" src="{{asset('assets/images/1.png')}}">
                            </div>

                            <div class="auth-form">
                                <h4 class="text-center mb-4" style="color: white">وارد حساب خود شوید</h4>

                                @include('error')
                                <form action="{{route('doLogin')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="mb-1"><strong>ایمیل</strong></label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>رمز عبور</strong></label>
                                        <input type="password" name="password" class="form-control" value="رمز عبور">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block "
                                                style="background-color: #697565">وارد شوید
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="admin/vendor/global/global.min.js"></script>
<script src="admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="admin/js/custom.min.js"></script>
<script src="admin/js/deznav-init.js"></script>

</body>


</html>
