<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
   @include('admin.layout.partials.head')
    <title>@yield('title')</title>

</head>

<body data-layout="detached" data-topbar="colored">

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

       @include('admin.layout.partials.header')

        <!-- ========== Left Sidebar Start ========== -->
      @include('admin.layout.partials.vertical_menu')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">@yield('title')</h4>



                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                @yield('content')

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>

            </div>
            <!-- End Page-content -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->



<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/bootstrap-datepicker/locales/bootstrap-datepicker.fa.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/datepicker-jalali/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/datepicker-jalali/bootstrap-datepicker.fa.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/czmore.js')}}"></script>
<!-- App js -->
<script src="{{asset('admin/assets/js/app.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/tagsinput.js')}}"></script>

@yield('script')

</body>

</html>
