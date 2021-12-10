<!doctype html>
<html >

<head>

    <title>PAQ-DGSE</title>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <!-- fontawesome icon  -->
    
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <h3 class="">
                    PAQ-DGSE
                </h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- [ navigation menu ] start -->
        <nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
            <div class="navbar-wrapper ">
                <div class="navbar-brand header-logo">
                    <a href="index.html" class="b-brand text-white">
                    PAQ-DGSE

                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                </div>
                <div class="navbar-content scroll-div">
                    <ul class="nav pcoded-inner-navbar">
                        <li class="nav-item pcoded-menu-caption">
                            <label>Navigation</label>
                        </li>
                        <li class="nav-item">
                            <a href="index.html" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-home"></i></span><span
                                    class="font-weight-700">Dashboard</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                          <span> UI Element</span>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="fal fa-calendar-alt  "></i> </span><span
                                    class="pcoded-mtext">Rendez-vous</span></a>
                            <ul class="pcoded-submenu">
                                <li class=""><a href="bc_button.html" class="">Button</a></li>
                                <li class=""><a href="bc_badges.html" class="">Badges</a></li>
                                <li class=""><a href="bc_breadcrumb-pagination.html" class="">Breadcrumb &
                                        paggination</a></li>
                                <li class=""><a href="bc_collapse.html" class="">Collapse</a></li>
                                <li class=""><a href="bc_progress.html" class="">Progress</a></li>
                                <li class=""><a href="bc_tabs.html" class="">Tabs & pills</a></li>
                                <li class=""><a href="bc_typography.html" class="">Typography</a></li>
                            </ul>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Forms &amp; table</label>
                        </li>
                        <li class="nav-item">
                            <a href="form_elements.html" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-file-text"></i></span><span class="pcoded-mtext">Form
                                    elements</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="tbl_bootstrap.html" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-align-justify"></i></span><span
                                    class="pcoded-mtext">Bootstrap table</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Chart & Maps</label>
                        </li>
                        <li class="nav-item">
                            <a href="chart-morris.html" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-pie-chart"></i></span><span
                                    class="pcoded-mtext">Chart</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="map-google.html" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Pages</label>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-lock"></i></span><span
                                    class="pcoded-mtext">Authentication</span></a>
                            <ul class="pcoded-submenu">
                                <li class=""><a href="auth-signup.html" class="" target="_blank">Sign up</a></li>
                                <li class=""><a href="auth-signin.html" class="" target="_blank">Sign in</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                    
                </div>
            </div>
        </nav>
        <!-- [ navigation menu ] end -->

        <!-- [ Header ] start -->
        <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
                <a href="index.html" class="b-brand">
                    <img src="../assets/images/logo.svg" alt="" class="logo images">
                    <img src="../assets/images/logo-icon.svg" alt="" class="logo-thumb images">
                </a>
            </div>
            <a class="mobile-menu" id="mobile-header" href="#!">
                <i class="feather icon-more-horizontal"></i>
            </a>
            <div class="collapse navbar-collapse">
                <a href="#!" class="mob-toggler"></a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <div class="main-search open">
                            <div class="input-group">
                                <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                                <a href="#!" class="input-group-append search-close">
                                    <i class="feather icon-x input-group-text"></i>
                                </a>
                                <span class="input-group-append search-btn btn btn-primary">
                                    <i class="feather icon-search input-group-text"></i>
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    
                    <li>
                        <div class="dropdown drp-user ">
                            <div href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                
                                <img src="{{ URL::to('images/photos/'.Auth::User()->photo) }}" class="img-radius" >
                               
                            </div>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head d-flex align-items-center">
                                    <div class="avatar-menu">
                                <img src="{{ URL::to('images/photos/'.Auth::User()->photo) }}" class="img-radius"
                                       >
                                       </div>
                                    <span class="pl-3 text-capitalise">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</span>
                                   
                                </div>
                                <ul class="pro-body">
                                    
                                    <li><a href="#!" class="dropdown-item"><i class="feather icon-user"></i> Profil</a>
                                    </li>
                                    
                                    <li><a href=" {{ route('Logout') }}" class="dropdown-item"><i
                                                class="fal fa-sign-out"></i> Déconnexion</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- [ breadcrumb ] start -->
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center m-0">
                                            <div class="col-md-12 p-0">
                                                <div class="page-header-title">
                                                    <h5>Dashboard</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i
                                                                class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item "><a href="#!">Analytics Dashboard</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ breadcrumb ] end -->
                                <!-- [ Main Content ] start -->
                                <main class="">
                                    @yield('content')
                                </main>

                                <!-- [ Main Content ] end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
     -->
</body>

</html>
