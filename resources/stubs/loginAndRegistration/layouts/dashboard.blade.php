@include('partials.header')

<body class="">
    @include('partials.aside')
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            @include('partials.nav')
            <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                @include('partials.navHeader')
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Footer Section Start -->
        @include('partials.footer')
        <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->
    <!-- offcanvas start -->
    @include('partials.overlay')
    <!-- Wrapper End-->
    <!-- Library Bundle Script -->
    @include('partials.scripts')

    @yield('scripts')
</body>

</html>
