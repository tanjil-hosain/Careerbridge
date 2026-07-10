<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Jobhub - Job Board HTML Website Template</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}frontend_assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('')}}frontend_assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="{{asset('')}}frontend_assets/css/main.css?v=1.0" />
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{asset('')}}frontend_assets/imgs/theme/loading.gif" alt="jobhub" />
                </div>
            </div>
        </div>
    </div>
    @include('frontend.partial.header')
    <!--End header-->
    <!-- Content -->
    @yield('content')
    <!-- End Content -->
    <!-- Footer -->

    @include('frontend.partial.footer')
    <!-- End Footer -->
    <!-- Vendor JS-->
    <script src="{{asset('')}}frontend_assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{asset('')}}frontend_assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{asset('')}}frontend_assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{asset('')}}frontend_assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{asset('')}}frontend_assets/js/plugins/waypoints.js"></script>
    <script src="{{asset('')}}frontend_assets/js/plugins/wow.js"></script>
    <script src="{{asset('')}}frontend_assets/js/plugins/magnific-popup.js"></script>
    <script src="{{asset('')}}frontend_assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{asset('')}}frontend_assets/js/plugins/select2.min.js"></script>
    <script src="{{asset('')}}frontend_assets/js/plugins/isotope.js"></script>
    <script src="{{asset('')}}frontend_assets/js/plugins/scrollup.js"></script>
    <script src="{{asset('')}}frontend_assets/js/plugins/swiper-bundle.min.js"></script>
    <!-- Template  JS -->
    <script src="{{asset('')}}frontend_assets/js/main.js?v=1.0"></script>
</body>

</html>