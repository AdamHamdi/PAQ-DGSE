<!doctype html>
<html>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

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
                       
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- [ navigation menu ] start -->
        <nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
            <div class="navbar-wrapper ">
                <div class="navbar-brand header-logo">
                    <a  class="b-brand text-white">
                        PAQ-DGSE

                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                </div>
                <div class="navbar-content scroll-div">
                    <ul class="nav pcoded-inner-navbar">
                    @if(Auth::user()->role =='admin')
                        <li class="nav-item">
                            <a href="{{route('dashboard-admin')}}" class="nav-link"><span class="pcoded-micon"><i
                                        class="fal fa-home"></i></span><span
                                    class="font-weight-700">Dashboard</span></a>
                        </li>
                        @endif @if(Auth::user()->role =='responsable domaine')
                        <li class="nav-item">
                            <a href="{{route('dashboard-responsable-domaine')}}" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-home"></i></span><span
                                    class="font-weight-700">Dashboard </span></a>
                        </li>
                        @endif 
                        @if(Auth::user()->role =='responsable action')
                        <li class="nav-item">
                            <a href="{{route('dashboard-responsable-action')}}" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-home"></i></span><span
                                    class="font-weight-700">Dashboard </span></a>
                        </li>
                        @endif 
                        @if(Auth::user()->role =='admin')
                        <li class="nav-item">
                          
                            <a href="{{ route('domaines')}}" class="nav-link"><span class="pcoded-micon"><i class="fal fa-columns  "></i></span><span
                                    class="font-weight-700">Domaines</span></a>
                        </li>
                        @endif
                        @if ((Auth::user()->role =='responsable domaine') || (Auth::user()->role =='admin'))
                        <li class="nav-item">
                            <a href="{{ route('actions')}}" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-home"></i></span><span
                                    class="font-weight-700">Actions</span></a>
                        </li> 
                        @endif
                        @if (Auth::user()->role =='responsable action')
                        <li class="nav-item">
                            <a href="{{ route('actions-action')}}" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-home"></i></span><span
                                    class="font-weight-700">Actions</span></a>
                        </li>
                        @endif
                        @if (Auth::user()->role =='admin')
                        <li class="nav-item pcoded-hasmenu">
                            <a href="{{ route('rendez-vous')}}" class="nav-link"><span class="pcoded-micon"><i class="fal fa-calendar-alt  "></i> </span>
                            <span
                                    class="pcoded-mtext">Rendez-vous</span></a>
                        </li>
                        @endif
                        @if ((Auth::user()->role =='responsable domaine') || (Auth::user()->role =='responsable action'))
                        <li class="nav-item pcoded-hasmenu">
                            <a href="{{ route('cahier-charge')}}" class="nav-link"><span class="pcoded-micon"><i
                                        class="fad fa-books "></i> </span><span class="pcoded-mtext">Cahier de
                                    charge</span></a>
                        </li>
                        @endif
                        <li class="nav-item pcoded-hasmenu">
                            <a href="{{ route('produits')}}" class="nav-link"><span class="pcoded-micon"><i class="fal fa-file-spreadsheet"></i> </span><span class="pcoded-mtext">Produits</span></a>
                        </li>
                        @if (Auth::user()->role =='admin')
                        <li class="nav-item pcoded-hasmenu">
                            <a href="{{ route('reunion')}}" class="nav-link"><span class="pcoded-micon"><i class="fal fa-calendar-alt "></i> </span><span class="pcoded-mtext">Réunions</span></a>
                        </li>
                        @endif
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
                        <!-- <div class="main-search open">
                            <div class="input-group">
                                <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                                <a href="#!" class="input-group-append search-close">
                                    <i class="feather icon-x input-group-text"></i>
                                </a>
                                <span class="input-group-append search-btn btn btn-primary">
                                    <i class="feather icon-search input-group-text"></i>
                                </span>
                            </div>
                        </div> -->
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    <li>
                        <div class="dropdown drp-user ">
                            <div href="#" class="dropdown-toggle avatar" data-toggle="dropdown">

                                <img src="{{ URL::to('images/photos/'.Auth::User()->photo) }}" class="img-radius">

                            </div>
                            <div class="dropdown-menu dropdown-menu-right profile-notification shadow">
                                <div class="pro-head d-flex align-items-center">
                                    <div class="avatar-menu">
                                        <img src="{{ URL::to('images/photos/'.Auth::User()->photo) }}"
                                            class="img-radius">
                                    </div>
                                    <div class="d-flex flex-column">
                                    <div class="pl-3 text-capitalise" style="height:20px">{{ Auth::user()->nom }}
                                        {{ Auth::user()->prenom }}</div>
                                        <small class="pl-3 text-light" >{{ Auth::user()->email }}
                                        </small>
                                        </div>

                                </div>
                                <ul class="pro-body">

                                    <li class="border-bottom"><a href="{{route('profil')}}" class="dropdown-item"><i class="feather icon-user text-success"></i> Profil</a>
                                    </li>
                                   

                                    <li><a href=" {{ route('Logout') }}" class="dropdown-item"><i
                                                class="fal fa-sign-out text-danger"></i> Déconnexion</a></li>
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

                                <!-- [ breadcrumb ] end -->
                                <!-- [ Main Content ] start -->
                                @if(Session::has('danger'))
                                <div class="alert alert-danger">
                                    {{ Session::get('danger') }} @php Session::forget('danger'); @endphp
                                </div>
                                @endif @if(Session::has('warning'))
                                <div class="alert alert-warning">
                                    {{ Session::get('warning') }} @php Session::forget('warning'); @endphp
                                </div>
                                @endif @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }} @php Session::forget('success'); @endphp
                                </div>
                                @endif
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