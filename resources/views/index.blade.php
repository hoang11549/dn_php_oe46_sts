<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flexCard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detailCourse.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detailSubject.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detailReport.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/buttonAdd.css') }}">
    <!--JS-->  
    <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
     @include('layout.header')
 
        <!-- End Topbar header -->
 
 
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
 
       @include('layout.scrollBar')
 
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- Page wrapper  -->

        <div class="page-wrapper">
     
            <!-- Container fluid  -->
     @yield('content')
            <!-- End Container fluid  -->
     
            <!-- footer -->
     
            <footer class="footer text-center"> 2021 © Sun* System 
            </footer>
     
            <!-- End footer -->
     
        </div>
 
        <!-- End Page wrapper  -->
 
    </div>
    
    <!-- End Wrapper -->
<!------------------------- Code Library------------------>
    <!-- All Jquery -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js ')}}"></script>
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js ')}}"></script>
    <script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/bower_components/font-awesome/js/all.min.js') }}"></script>
    
    
    <!--------------Code by Member------------------->
    <!--Wave Effects -->
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
      <!-- searchList -->
    <script src="{{ asset('assets/js/validate.js') }}"></script>
    <script src="{{ asset('assets/js/valiJquery.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets/js/pages/dashboards/dashboard1.js') }}"></script>
</body>

</html>
