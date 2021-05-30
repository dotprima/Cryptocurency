<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beta </title>
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('/')}}/assets/images/favicon.png" type="image/x-icon" />
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" href="{{url('/')}}/assets/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{url('/')}}/assets/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{url('/')}}/assets/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{url('/')}}/assets/images/apple-touch-icon-144-precomposed.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.8/swiper-bundle.min.js"
        integrity="sha512-sAHYBRXSgMOV2axInO6rUzuKKM5SkItFLlLHQ8YjRD+FBwowtATOs4njP9oim3/MzyAGrB52SLDjpAOLcOT9TA=="
        crossorigin="anonymous"></script>
    <!-- CORE CSS FRAMEWORK - START -->
    <link href="{{url('/')}}/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{url('/')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{url('/')}}/assets/fonts/webfont/cryptocoins.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->

    <link href="{{url('/')}}/assets/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{url('/')}}/assets/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{url('/')}}/assets/plugins/calendar/fullcalendar.css" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{url('/')}}/assets/plugins/icheck/skins/minimal/minimal.css" rel="stylesheet" type="text/css"
        media="screen" />


    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE CSS TEMPLATE - START -->
    <link href="{{url('/')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cryptodash.netlify.app/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS TEMPLATE - END -->

    <!-- Chart -->
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>
    @livewireStyles
    <!-- Chart END -->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class=" ">
    <!-- START TOPBAR -->
    @include('Template.v_topbar')
    <!-- END TOPBAR -->

    <!-- START CONTAINER -->
    <div class="page-container row-fluid container-fluid">

        <!-- SIDEBAR - START -->
        @include('Template.v_sidebar')
        <!--  SIDEBAR - END -->

        <!-- START CONTENT -->
        @yield('content')
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

    <!-- CORE JS FRAMEWORK - START -->

    <script src="{{url('/')}}/assets/js/jquery.easing.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/pace/pace.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/viewport/viewportchecker.js"></script>
    <script>
    window.jQuery || document.write(
        '<script src="{{url(' / ')}}/assets/js/jquery-1.11.2.min.js"><\/script>');
    </script>
    <!-- CORE JS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <script src="{{url('/')}}/assets/plugins/sparkline-chart/jquery.sparkline.min.js"></script>

    <script src="{{url('/')}}/assets/plugins/flot-chart/jquery.flot.js"></script>
    <script src="{{url('/')}}/assets/plugins/flot-chart/jquery.flot.time.js"></script>
    <script src="{{url('/')}}/assets/js/chart-flot.js"></script>
    <script src="{{url('/')}}/assets/plugins/chartjs-chart/Chart.min.js"></script>
    <script src="{{url('/')}}/assets/js/dashboard-crypto.js"></script>


    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE TEMPLATE JS - START -->
    <script src="{{url('/')}}/assets/js/scripts.js"></script>
    <!-- END CORE TEMPLATE JS - END -->


    @livewireScripts
</body>

</html>