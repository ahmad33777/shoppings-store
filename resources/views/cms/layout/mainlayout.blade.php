<!doctype html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    @include('cms.includes.style')
    <title>Dashbord</title>
</head>

<body>
    <!-- main wrapper -->
    <div class="dashboard-main-wrapper">
        <!-- navbar -->
        @include('cms.includes.navbar')
        <!-- end navbar -->
        <!-- left sidebar -->
        @include('cms.includes.leftsidebar')
        <!-- end left sidebar -->
        <!-- wrapper  -->
        <div class="dashboard-wrapper">


            @yield('content')



            <!-- footer -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2022 Concept. All rights reserved. Dashboard by Nouh.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="#">About</a>
                                <a href="#">Support</a>
                                <a href="#">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end footer -->
        </div>
        <!-- end wrapper  -->
    </div>
    <!-- end main wrapper  -->
    <!-- Optional JavaScript -->
    @include('cms.includes.js')

</body>

</html>