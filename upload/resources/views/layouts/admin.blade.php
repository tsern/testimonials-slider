<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script data-require="bootstrap@3.3.7" data-semver="3.3.7" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script data-require="MomentJS@2.10.0" data-semver="2.10.0" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link data-require="bootstrap@3.3.7" data-semver="3.3.7" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


</head>
<body>
    <div id="wrap">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li
                                @if($indexActiveView == 0)
                                class="active"
                                @endif
                        ><a href="/admin">Dashboard</a></li>
                        <li
                                @if($indexActiveView == 1)
                                class="active"
                                @endif
                        ><a href="/admin/testimonialslider">Testimonial Slider</a></li>
                        <li
                                @if($indexActiveView == 2)
                                class="active"
                                @endif
                        ><a href="/admin/testimonial">Testimonial</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li  @if($indexActiveView == 5)
                                class="active"
                             @endif>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> {{$viewTitle}}
                            <small>Manage Your Site</small>
                        </h1>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Create Content</button>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/testimonialslider/create/">Add Testimonial Slider</a></li>
                                <li><a href="/admin/testimonial/create/">Add Testimonial</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <br>

        <section id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
                            <a href="/admin" class="list-group-item
                             @if($indexActiveView == 0)
                                    active
                             @endif
                                    "><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                Dashboard</a>
                            <a href="/admin/testimonialslider" class="list-group-item
                              @if($indexActiveView == 1)
                                    active
                              @endif
                                    "><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Testimonial Slider<span
                                        class="badge"></span></a>
                            <a href="/admin/testimonial" class="list-group-item
                              @if($indexActiveView == 2)
                                    active
                              @endif
                                    "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Testimonial<span
                                        class="badge">126</span></a>
                        </div>
                    </div>

                    @yield('content')
                </div>
            </div>
        </section>
    </div>

    <footer id="footer">
        <p>Copyright : Tania Sernivka<br>2019</p>
    </footer>

    <style>
        * {
            margin: 0;
        }

        html,
        body {
            height: 100%;
            overflow-x: hidden;
        }

        body {
            background: #f4f4f4;
            padding-bottom:60px;
        }

        .navbar {
            min-height: 33px !important;
            margin-bottom: 0;
            border-radius: 0;
        }

        ul.nav.navbar-nav{
            display: inline-block;
        }

        .navbar-nav > li > a, .navbar-brand {
            padding-top: 6px !important;
            padding-bottom: 0;
            height: 33px;

        }

        .container {
            min-height:100%;
            position:relative;
        }

        .main-color-bg {
            background-color: #095f59;
            color: #ffffff !important;
        }


        /*Header */

        #header {
            background: #333333;
            color: #ffffff;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        #header .create {
            padding-top: 20px;
        }

        .dash-box {
            text-align: center;
        }

        #footer {
            background: #333333;
            color: #ffffff;
            text-align: center;
            /*margin-top: 200px;*/
            /*flex: 0 0 auto;*/
            position:absolute;
            bottom:0;
            width:100%;
            height:60px;
        }

        .navbar-default {
            background-color: #095f59;
            border-color: #689a9b;
        }

        .navbar-default .navbar-brand {
            color: #efee24;
        }

        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            color: #010800;
        }

        .navbar-default .navbar-text {
            color: #efee24;
        }

        .navbar-default .navbar-nav > li > a {
            color: #efee24;
        }

        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
            color: #010800;
        }

        .navbar-default .navbar-nav > .active > a,
        .navbar-default .navbar-nav > .active > a:hover,
        .navbar-default .navbar-nav > .active > a:focus {
            color: #010800;
            background-color: #689a9b;
        }

        .navbar-default .navbar-nav > .open > a,
        .navbar-default .navbar-nav > .open > a:hover,
        .navbar-default .navbar-nav > .open > a:focus {
            color: #010800;
            background-color: #689a9b;
        }

        .navbar-default .navbar-toggle {
            border-color: #689a9b;
        }

        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus {
            background-color: #689a9b;
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: #efee24;
        }

        .navbar-default .navbar-collapse,
        .navbar-default .navbar-form {
            border-color: #efee24;
        }

        .navbar-default .navbar-link {
            color: #efee24;
        }

        .navbar-default .navbar-link:hover {
            color: #010800;
        }

        @media (max-width: 767px) {
            .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                color: #efee24;
            }

            .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
                color: #010800;
            }

            .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
                color: #010800;
                background-color: #689a9b;
            }

        }

        select {
            padding: 5px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            background-color: inherit;
            width: 100%;
            border: 1px solid #ccc;
        }
    </style>
</body>
</html>