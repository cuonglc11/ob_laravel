<!DOCTYPE html>
<html lang="en">

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
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <header class="container-fluid sticky-top navbar">
        <div class="container-fluid">
            <div class="container px-0">
                <nav class="navbar navbar-expand-xl" style="background: white;">
                    <a href="index.html" class="navbar-brand">
                        <img src="./img/logo-while.svg"  id="logo"/>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse  py-3" style="border-top: none;" id="navbarCollapse">
                        <div class="navbar-nav mx-auto  menu_khoang">
                            <a href="#home" class="nav-item nav-link active">Home</a>
                            <a href="#Expertise" class="nav-item nav-link">Expertise</a>
                            <a href="#whatWedo" class="nav-item nav-link">What we do</a>
                            <a href="#stack" class="nav-item nav-link">Staking</a>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                            <a href="{{asset('login')}}" class="login-button">Login</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
   <main>
    <section class="layout">
        <h1>0BNetw<span>o</span>rk token Pre-sale</h1>
        <p class="cotentToken">Buy token <img src="./img/token.png"/> to participate in the Stake program built on Web3 technology</p>
        <div class="pageHome">
            <div class="row">
                <div class="col">
                    <div class="time-box">
                        <span class="time-number" id="days">15</span>
                        <span class="time-unit">Days</span>
                    </div>
                </div>
                <div class="col">
                    <div class="time-box">
                        <span class="time-number" id="hours">08</span>
                        <span class="time-unit">Hour</span>
                    </div>
                </div>
                <div class="col">
                    <div class="time-box">
                        <span class="time-number" id="minutes">15</span>
                        <span class="time-unit">Minute</span>
                    </div>
                </div>
                <div class="col">
                    <div class="time-box">
                        <span class="time-number" id="seconds">09</span>
                        <span class="time-unit">Second</span>
                    </div>
                </div>
            </div>
            <div class="container info-row">
                <div class="info">
                    <img src="./img/group.svg" alt="USDT Logo" class="usdt-logo">
                    <span class="usdt_span">USDT BEP-20</span>
                </div>
                <div class="info">
                    <span class="listing_price">LISTING PRICE: <span class="price">$0.43</span></span>
                </div>
                <div class="info">
                    <span class="usdt_span">NOW: 1 OB = <span class="current-price">$0.39</span></span>
                </div>
            </div>
            <form class="form_play">
              <div class="row">
                <div class=" col-md-12 col-lg-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">You Pay</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="col-md-12 col-lg-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">You Receive</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
              </div>
              <div class="row">
                <div class=" col-md-12 col-lg-7 mb-3">
                    <button class="purch_button">Purchase 0B</button>
                  </div>
                  <div class="col-md-12 col-lg-5 mb-3">
                    <button class="program_button">Referral Program</button>
                  </div>
              </div>
            </form>
        </div >
         <div class="img_abum">
            <img src="./img/yahoo.svg" class="img_yahoo"/>
            <img src="./img/busing.svg" class="img_yahoo"/>
            <img src="./img/trading.svg" class="img_yahoo"/>
         </div>
    </section>
   </main>
    <footer>
        <div class="container footer_controller">
            <div class="row">
               <div class="col-lg-5 col-md-12">
                <img src="./img/logo-while.svg"  />
                 <!-- <p style="color: black;">© 2023 0bnetwork Blockchain Technology, All rights reserved.</p> -->
               </div>


            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
