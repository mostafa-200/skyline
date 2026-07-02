<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CCESS CMS Dashboard">
    <meta name="author" content="CCESS">
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}" />

    <!-- Title -->
    <title>CCESS CMS - @yield('title', 'Admin Dashboard')</title>

    <!-- Common Css Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Optional extra styles -->
    @yield('styles')
</head>
<body>
    <!-- Loading starts -->
    <div id="loading-wrapper">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Loading ends -->

    <!-- Page wrapper start -->
    <div class="page-wrapper">
        
        <!-- Sidebar wrapper start -->
        @include('dashboard.components.layout.sidebar')
        <!-- Sidebar wrapper end -->

        <!-- Page content start  -->
        <div class="page-content" style="display: flex; flex-direction: column; min-height: 100vh;">

            <!-- Header start -->
            @include('dashboard.components.layout.header')
            <!-- Header end -->

            <!-- Main container start -->
            <div class="main-container" style="flex: 1; padding: 20px;">
                <!-- Breadcrumbs and page header -->
                <div class="page-header mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        @yield('breadcrumbs')
                    </ol>
                </div>

                <!-- Session Alert Messages -->
                @if(session('success'))
                    <x-dashboard.ui.alert type="success" :message="session('success')" />
                @endif

                @if(session('error'))
                    <x-dashboard.ui.alert type="danger" :message="session('error')" />
                @endif

                <!-- Page Main Content -->
                @yield('content')
            </div>
            <!-- Main container end -->

            <!-- Footer start -->
            @include('dashboard.components.layout.footer')
            <!-- Footer end -->

        </div>
        <!-- Page content end -->

    </div>
    <!-- Page wrapper end -->

    <!-- Required JavaScript Files -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('vendor/slimscroll/slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/slimscroll/custom-scrollbar.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Optional page scripts -->
    @yield('scripts')
</body>
</html>
