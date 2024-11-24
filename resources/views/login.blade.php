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

<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4">وارد حساب خود شوید</h4>

                                @include('error')
                                <form action="{{route('doLogin')}}" method="post" >
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="mb-1"><strong>ایمیل</strong></label>
                                        <input type="email"  name="email" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>رمز عبور</strong></label>
                                        <input type="password" name="password" class="form-control" value="رمز عبور">
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1">
                                                <input type="checkbox" class="custom-control-input"  name="remember" id="remember">
                                                <label class="custom-control-label" for="remember">مرا به خاطر بسپار</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="page-forgot-password.html">فراموشی رمز عبور؟</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">وارد شوید</button>
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
