<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>404</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">
    <link href="{{asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/libs/datepicker-jalali/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/tagsinput.css')}}" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css -->
    <link href="{{asset('admin/assets/css/app.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <!-- Theme Color -->
    <meta name="theme-color" content="#283D92">

</head>

<body>
<div class="home-btn d-none d-sm-block">
    <a href="{{route('admin.base')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
</div>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">

                    <div class="card-body">

                        <div class="text-center p-3">

                            <div class="img">
                                <img src="{{asset('admin/assets/images/error-img.png')}}" class="img-fluid" alt="">
                            </div>

                            <h1 class="error-page mt-5"><span>404!</span></h1>
                            <h4 class="mb-4 mt-5">صفحه مورد نظر یافت نشد</h4>
                            <p class="mb-4 w-75 mx-auto">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک</p>
                            <a class="btn btn-primary mb-4 waves-effect waves-light" href="{{route('admin.base')}}"><i class="mdi mdi-home"></i> بازگشت به داشبورد</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


</body>

</html>
