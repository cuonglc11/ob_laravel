<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <title>OB Network</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <header class="container-fluid sticky-top navbar">
            <div class="container-fluid">
                <div class="container px-0">
                    <nav class="navbar navbar-expand-xl" >
                        <a href="{{asset('/')}}" class="navbar-brand">
                            <img src="{{asset('img/logo-while.svg')}}"  id="logo"/>
                        </a>
                        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars text-primary"></span>
                        </button>
                        <div class="collapse navbar-collapse  py-3" style="border-top: none;" id="navbarCollapse">
                            {{-- <div class="navbar-nav mx-auto  menu_khoang">
                                <a href="#home" class="nav-item nav-link active">Home</a>
                                <a href="#Expertise" class="nav-item nav-link">Expertise</a>
                                <a href="#whatWedo" class="nav-item nav-link">What we do</a>
                                <a href="#stack" class="nav-item nav-link">Staking</a>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                                <a href="appointment.html" class="login-button">Login</a>
                            </div> --}}
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="container footer_controller">
                <div class="row">
                   <div class="col-lg-5 col-md-12">
                    <img src="./img/logo-while.svg"  />
                     <!-- <p style="color: black;">© 2023 0bnetwork Blockchain Technology, All rights reserved.</p>  style="background: white;"-->
                   </div>


                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
