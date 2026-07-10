<!doctype html>
<html lang="en" class="minimal-theme">


<!-- Mirrored from codervent.com/skodash/demo/collapsed-menu/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jul 2026 13:53:03 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('')}}assets/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="{{asset('')}}assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{asset('')}}assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/css/style.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('')}}assets/cdn.jsdelivr.net/npm/bootstrap-icons%401.9.1/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="{{asset('')}}assets/css/pace.min.css" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="{{asset('')}}assets/css/dark-theme.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/css/light-theme.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/css/semi-dark.css" rel="stylesheet" />
  <link href="{{asset('')}}assets/css/header-colors.css" rel="stylesheet" />

  <title>Skodash - Bootstrap 5 Admin Template</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    @include('backend.job_seeker.partial.topbar')
       <!--end top header-->

        <!--start sidebar -->
        @include('backend.job_seeker.partial.asidebar')
       <!--end sidebar -->

       <!--start content-->
       @yield('content')
       <!--end page main-->

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

       <!--start switcher-->
       @include('backend.job_seeker.partial.change-color')
       <!--end switcher-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="{{asset('')}}assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="{{asset('')}}assets/js/jquery.min.js"></script>
  <script src="{{asset('')}}assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="{{asset('')}}assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="{{asset('')}}assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
  <script src="{{asset('')}}assets/plugins/peity/jquery.peity.min.js"></script>
  <script src="{{asset('')}}assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="{{asset('')}}assets/js/pace.min.js"></script>
  <script src="{{asset('')}}assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="{{asset('')}}assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="{{asset('')}}assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <script src="{{asset('')}}assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('')}}assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
  <!--app-->
  <script src="{{asset('')}}assets/js/app.js"></script>
  <script src="{{asset('')}}assets/js/index.js"></script>

  <script>
     new PerfectScrollbar(".best-product")
     new PerfectScrollbar(".top-sellers-list")
  </script>

</body>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'},{'ap':'cpsh-oh'},{'server':'p3plzcpnl509132'},{'dcenter':'p3'},{'cp_id':'10399385'},{'cp_cl':'8'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='../../../../../img1.wsimg.com/signals/js/clients/scc-c2/scc-c2.min.js'></script>
<!-- Mirrored from codervent.com/skodash/demo/collapsed-menu/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jul 2026 13:53:49 GMT -->
</html>