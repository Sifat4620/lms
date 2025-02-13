<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>

    <!-- Link to CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/modernizr-3.6.0.min.js') }}"></script>
</head>

<body class="v-light compact-nav fix-header fix-sidebar">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div id="main-wrapper">
        <!-- Sidebar -->
        @include('Dashboard.main.sidebar')  <!-- This includes the sidebar -->

        <!-- Header -->
        @include('Dashboard.main.header')  <!-- This includes the header -->

        <!-- Main Content Area -->
        <main>
            @yield('content')  <!-- This is where your page-specific content will be inserted -->
        </main>

        <!-- Footer -->
        @include('Dashboard.main.footer')  <!-- This includes the footer -->
    </div>

    <!-- JavaScript Files -->
    <script src="{{ asset('assets/js/custom+mini-nav.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>

    <script src="{{ asset('assets/js/dashboard-1.js') }}"></script>
</body>

</html>
