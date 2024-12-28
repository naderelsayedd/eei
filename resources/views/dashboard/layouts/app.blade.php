<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Dashboard | {{ config('settings.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/'.config('settings.icon')) }}"/>
    <link href="{{ url('admin/assets/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ url('admin/assets/js/loader.js') }}"></script>

    <!-- Begin DataTable Styles -->
    <link href="{{ url('admin/plugins/src/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/plugins/css/light/table/datatable/custom_dt_custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/plugins/css/dark/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/plugins/css/dark/table/datatable/custom_dt_custom.css') }}" rel="stylesheet" type="text/css">
    <!-- End DataTable Styles -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ url('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/css/light/elements/alert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/assets/css/dark/elements/alert.css') }}" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->

    @yield('css')
</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('dashboard.layouts.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('dashboard.layouts.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">

                    @yield('content')

                </div>
            </div>

            @include('dashboard.layouts.footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ url('admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('admin/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('admin/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ url('admin/plugins/src/waves/waves.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/app.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ url('admin/assets/js/custom.js') }}"></script>
    <script src="{{ url('admin/plugins/src/table/datatable/datatables.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    @yield('js')
</body>
</html>