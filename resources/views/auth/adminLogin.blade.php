<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
          content="admin dashboard - registration process - coding academy by orange ">
    <meta name="keywords"
          content="statistics, registration,coding,orange, laravel, learning">
    <meta name="author" content="Marya Alzubi">
    <title>Login Page - Coding Academy</title>
    <link rel="apple-touch-icon" href="{{asset('admin-assets/images/ico/apple-icon-120.html')}}">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/themes/semi-dark-layout.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- login page start -->
            <section id="auth-login" class="row flexbox-container">
                <div class="col-xl-8 col-11">
                    <div class="card bg-authentication mb-0">
                        <div class="row m-0">
                            <!-- left section-login -->
                            <div class="col-md-6 col-12 px-0">
                                <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="text-center mb-2">Welcome Back</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form  method="post" action="{{route('admin.login.submit')}}">
                                            @csrf
                                            <div class="form-group mb-50">
                                                <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('email') }}"
                                                       placeholder="Email address">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" value="{{ old('password') }}"
                                                       placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i
                                                    id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                                            </button>
                                        </form>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <!-- right section image -->
                            <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                <img class="img-fluid" src="{{asset('assets/img/coding_academy2.png')}}" alt="coding academy">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- login page ends -->

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('admin-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('admin-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
<script src="{{asset('admin-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js')}}"></script>
<script src="{{asset('admin-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('admin-assets/js/scripts/configs/vertical-menu-light.min.js')}}"></script>
<script src="{{asset('admin-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('admin-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts/components.min.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts/footer.min.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

</body>
<!-- END: Body-->

<!-- Mirrored from www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Apr 2021 10:39:44 GMT -->
</html>
