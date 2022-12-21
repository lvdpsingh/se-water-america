<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Company Bootstrap Template - Index</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('frontend/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header">
    <h1 class="logo flex justify-between h-16">
        <a class="nav-brand" href="index.html">Water America</a>

    </h1>
   <div class="relative flex items-top justify-right  bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    @admin
                    <a href="{{ url('/admin/dashboard-admin') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @endadmin
                    @customer
                    <a href="{{ url('/customer/dashboard-customer') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @endcustomer
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="flex">
    <div style="filldiv height-100vh"></div>
    <div id="heroCarousel" class="carousel slide carousel-fade" >

        <div class="carousel-inner" >

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url({{asset('logo/slide-water.jpg')}});">
                <div class="carousel-container">

                    <div class="carousel-content align-center">
                        <h2>Welcome to <span>Water America</span></h2>
                        <p>With a history dating back to 1886, Water America is the largest and most geographically diverse U.S. publicly traded water and wastewater utility company. The company employs more than 6,400 dedicated professionals who provide regulated and regulated-like drinking water and wastewater services to more than 14 million people in 24 states. American Water provides safe, clean, affordable and reliable water services to our customers to help keep their lives flowing. For more information, visit amwater.com and diversityataw.com. Follow American Water on Twitter, Facebook, Instagram and LinkedIn.</p>
                        <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                    </div>
                    <br>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Hero -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>

</html>
