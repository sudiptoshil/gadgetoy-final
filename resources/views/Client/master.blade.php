<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gadgetoy</title>

    <!-- favicon -->
    <link rel="stylesheet" href="{{'/'}}client/assets/vendor/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/')}}client/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}client/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}client/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{asset('/')}}client/assets/favicon/site.webmanifest">
    {{-- <script src="https://unpkg.com/@popperjs/core@2"></script> --}}
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>


    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <!-- CSS files -->

    <link href="{{asset('/')}}client/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="{{asset("/")}}client/assets/css/owl.carousel.theme.min.css" rel="stylesheet">
    <link href="{{asset("/")}}client/assets/css/ionicons.css" rel="stylesheet">
    <link href="{{asset("/")}}client/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset("")}}client/assets/css/main.css" rel="stylesheet">

    <link href="{{asset('/')}}client/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <link href="{{asset('/')}}client/assets/rating.css" rel="stylesheet">

    {{--<script src="{{ asset('') }}js/app.js"></script>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    <![endif]-->
</head>
<body>

<!-- Site Header -->
<!--<div id="navbar-head-top" class="site-header-bg" > -->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-6">-->
<!--                <a href="index.html"><img src="assets/images/logo.png" alt="logo"></a>-->
<!--            </div>-->
<!--            <div class="col-3 offset-3 text-right">-->
<!--                <a href="cart.html"><span class="ion-android-cart"> 0 products </span> </a>-->
<!--                <form>-->
<!--                    <div class="input-group">-->
<!--                        <input type="text" class="form-control" placeholder="">-->
<!--                        <span class="input-group-btn">-->
<!--                            <button class="btn btn-default btn-robot" type="button">Search</button>-->
<!--                        </span>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Header -->

@include('Client.Header.header')


<!-- trending Product -->

{{--@include('Client.Slider.slider')--}}

<!-- products -->

{{-- home content --}}
@yield('home-content')



<!-- Footer -->
@include('Client.Footer.footer')
<p>&copy; Developed by <a href="https://cursorbd.com/">CURSOR LTD</a></p>
</footer>
<!-- Scripts -->

<script src="{{asset('/')}}client/assets/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}client/assets/rating.js"></script>
<script src="{{asset('client/assets/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{asset('client/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('client/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('client/assets/js/script.js')}}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


</body>
</html>
