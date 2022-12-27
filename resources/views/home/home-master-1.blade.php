<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!--Styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
{{--    @include('layouts.navigation')--}}
    <!--NAVIGATION BAR-->
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center pt-6">
                        <a href="{{ url('/') }}">
                            <x-navigation-logo class="block h-9 w-auto fill-current text-gray-800"/>
                        </a>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
{{--                    <x-dropdown align="right" width="48">--}}
{{--                        <x-slot name="trigger">--}}
{{--                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">--}}
{{--                                <div>{{ Auth::user()->name }}</div>--}}
{{--                                --}}

{{--                                <div class="ml-1">--}}
{{--                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                        </x-slot>--}}

{{--                        <x-slot name="content">--}}
{{--                            <x-dropdown-link :href="route('profile.edit')">--}}
{{--                                {{ __('Profile') }}--}}
{{--                            </x-dropdown-link>--}}

{{--                            <!-- Authentication -->--}}
{{--                            <form method="POST" action="{{ route('logout') }}">--}}
{{--                                @csrf--}}

{{--                                <x-dropdown-link :href="route('logout')"--}}
{{--                                                 onclick="event.preventDefault();--}}
{{--                                                this.closest('form').submit();">--}}
{{--                                    {{ __('Log Out') }}--}}
{{--                                </x-dropdown-link>--}}
{{--                            </form>--}}
{{--                        </x-slot>--}}
{{--                    </x-dropdown>--}}
                    <div align="right">
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
                                    <a id="login" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                    @if (Route::has('register'))
                                        <a id="register" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
{{--                @admin--}}
{{--                <x-responsive-nav-link :href="route('dashboard-admin')" :active="request()->routeIs('dashboard-admin')">--}}
{{--                    {{ __('Dashboard') }}--}}
{{--                </x-responsive-nav-link>--}}
{{--                @endadmin--}}
{{--                @customer--}}
{{--                <x-responsive-nav-link :href="route('dashboard-customer')" :active="request()->routeIs('dashboard-customer')">--}}
{{--                    {{ __('Dashboard') }}--}}
{{--                </x-responsive-nav-link>--}}
{{--                @endcustomer--}}
            </div>

{{--            <!-- Responsive Settings Options -->--}}
{{--            <div class="pt-4 pb-1 border-t border-gray-200">--}}
{{--                <div class="px-4">--}}
{{--                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>--}}
{{--                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
{{--                </div>--}}

{{--                <div class="mt-3 space-y-1">--}}
{{--                    <x-responsive-nav-link :href="route('profile.edit')">--}}
{{--                        {{ __('Profile') }}--}}
{{--                    </x-responsive-nav-link>--}}

{{--                    <!-- Authentication -->--}}
{{--                    <form method="POST" action="{{ route('logout') }}">--}}
{{--                        @csrf--}}

{{--                        <x-responsive-nav-link :href="route('logout')"--}}
{{--                                               onclick="event.preventDefault();--}}
{{--                                        this.closest('form').submit();">--}}
{{--                            {{ __('Log Out') }}--}}
{{--                        </x-responsive-nav-link>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </nav>
    <!--NAVIGATION BAR END-->

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

{{--    <!-- Page Content -->--}}
{{--    <main>--}}
{{--        {{ $slot }}--}}
{{--    </main>--}}
    <main>
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
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
