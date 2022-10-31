<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/frontend-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
</head>

<body style="">
    <div id="app">
        <div class="top-bar">
            <div class="top-left-bar">
                welcome to tradefunds investment group
            </div>
            <div class="top-right-bar">

                <a href="mailto:support@trustfunds-investment.com"> <i class="fa fa-envelope"></i>
                    support@tradefunds-investment.com</a>



                <a href="#"><i class="fa fa-phone"></i> +61 421 359 236</a>


                    @auth
                    <a href="{{route('home')}}"><i class="fa fa-user"></i> My account</a>
                    @endauth
               

            </div>
            <div id="google_translate_element"></div>
<script type="text/javascript">// <![CDATA[
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
// ]]></script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
        </div>
        <nav class="navbar navbar-expand-md shadow-sm" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('assets/images/logo.jpeg')}}" alt="" height="80" style="margin-top: -1.2em; margin-left: 0.8em"  class="position-absolute ml-3 d-inline-block align-text-top">
                  {{--   {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" style="color: #fff;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }} ">
                    <span class="navbar-toggler-icon" style="color: #fff; z-index: 50;">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav me-auto">

                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faqs') }}">FAQ's</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rules') }}">Rules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('support') }}">Support</a>
                        </li>
                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid">
            @yield('content')
        </div>



        <div class="footer mt-5 mb-2 px-3">
            <div class="container px-3">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <h4>
                            COMPANY
                        </h4>
                        <ul>
                            <li>
                                <a href="{{ route('index') }}"> Home </a>
                            </li>
                            <li>
                                <a href="{{ route('faqs') }}"> Faq's </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h4>
                            USER
                        </h4>
                        <ul>
                            <li>
                                <a href="{{ route('rules') }}"> Terms </a>
                            </li>
                            <li>
                                <a href="{{ route('support') }}"> Contact us </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 ">
                        <h4>
                            Account
                        </h4>
                        <ul>
                            <li>
                                <a href="{{ route('register') }}"> Register </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}">Login </a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-sm-12">
                       Registered Office Address: Gesine-Stumpf-Ring 73, Kaarst, Germany
                    </div>
                </div>

            </div>

        </div>

        <div class="container px-3">
            <div class="col-md-8 px-3 py-3" style="font-size: 14px;">
                Copyright @2017 trustfunds-investment.com All rights reserved
            </div>
        </div>

         <div>
            @yield('price-marquee')
        </div> 
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            telegram: "Tradefunds01", // Telegram bot username
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->

<script type="text/javascript">
    const $ = window.jQuery;
    
    $(document).ready(function() {
        console.log("jquery");
        $('#nav-toggle-bar').click(function() {
            console.log("ere");
            $('#cps-nav').toggleClass('cps-nav-sidebar cps-nav-sidebar-hide')
            $('#content').toggleClass('content content-fluid')
        })
    })
    window.onscroll = function() {
        myFunction()
    };

    // Get the navbar
    var navbar = document.getElementById("navbar");

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("fixed-top")
        } else {
            navbar.classList.remove("fixed-top");
        }
    }
</script>
@yield('app_js')
@stack('app_js')

</html>
