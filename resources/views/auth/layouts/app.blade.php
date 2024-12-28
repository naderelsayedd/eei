<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Dashboard | {{ config('settings.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/'.config('settings.icon_en')) }}"/>
    <link href="{{ url('admin/assets/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ url('admin/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ url('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/css/light/elements/alert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/assets/css/dark/elements/alert.css') }}" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->

</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT AREA  -->
        <div class="main-content mt-5">
            <div class="middle-content container-xxl p-0">

                @yield('content')

            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ url('admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('admin/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('admin/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>