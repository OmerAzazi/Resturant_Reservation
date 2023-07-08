<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="shortcut icon" href="Template/image/icon.jpg" type="">       
        <meta name="csrf-token" content="{{ csrf_token() }}">


<!--
Victory HTML CSS Template
https://templatemo.com/tm-507-victory
-->
        <title>Sizzle & Spice</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="Template/css/bootstrap.min.css">
        <link rel="stylesheet" href="Template/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="Template/css/fontAwesome.css">
        <link rel="stylesheet" href="Template/css/hero-slider.css">
        <link rel="stylesheet" href="Template/css/owl-carousel.css">
        <link rel="stylesheet" href="Template/css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="Template/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>

<body>
    <div class="header">
        <div class="container">
            <a href="#" class="navbar-brand scroll-top">Sizzle & Spice</a>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('Menu')}}">Our Menus</a></li>
                        @if (Route::has('login'))
                        @auth
                        <li>
                            <a href="{{url('BookPage')}}">Reservation</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.show') }}">Profile</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <button type="submit" style="background-color:Transparent;border: none;padding-top:15px">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                         </li>
                        @else 
                        <li>
                            <a href="{{route('login')}}">Log In</a>
                         </li>
                         <li>
                            <a href="{{route('register')}}">Register</a>
                         </li>
                        @endauth 
                        @endif  

                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>