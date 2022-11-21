<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap Rtl Min CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css" />
    <!-- Owl Theme Default Min CSS -->
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <!-- Boxicons Min CSS -->
    <link rel="stylesheet" href="assets/css/boxicons.min.css" />
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css" />
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="assets/css/flaticon.css" />
    <!-- Meanmenu Min CSS -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css" />
    <!-- Nice Select Min CSS -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css" />
    <!-- Odometer Min CSS-->
    <link rel="stylesheet" href="assets/css/odometer.min.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Dark CSS -->
    <link rel="stylesheet" href="assets/css/dark.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <!-- Rtl CSS -->
    <link rel="stylesheet" href="assets/css/rtl.css" />

    <!-- Media CSS -->
    <link rel="stylesheet" href="assets/css/media.css" />

    <!-- Style Site Addition -->
    <link rel="stylesheet" href="assets/css/stylesSite.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/alam/alam.png" />
    <!-- Title -->
    <title>{{ $title }}</title>
</head>

<body>
    <!-- Start Header Area -->
    <header class="header-area">
        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="mobile-nav">
                <div class="container pb-3">
                    <div class="mobile-menu">
                        <div class="logo">
                            <a href="{{ route('alam24.index',$page='index') }}">
                                <img src="assets/img/alam/alama-logo.png" alt="logo" class="image-logo" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="desktop-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('alam24.index',$page='index') }}">
                            <img src="assets/img/alam/alama-logo.png" alt="logo" class="image-logo" />
                        </a>
                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="{{ route('alam24.index',$page='index') }}" class="nav-link active"> الرئيسية </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        الأخبار
                                        <i class="bx bx-chevron-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="news.html" class="nav-link">آخر الأخبار</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="mixpage.html" class="nav-link"> منوعات </a>
                                </li>

                                <li class="nav-item">
                                    <a href="economie.html" class="nav-link"> اقتصاد </a>
                                </li>

                                <li class="nav-item">
                                    <a href="sport.html" class="nav-link"> رياضة</a>
                                </li>

                                <li class="nav-item">
                                    <a href="asra-page.html" class="nav-link">أسرى</a>
                                </li>

                                <li class="nav-item">
                                    <a href="global.html" class="nav-link"> دولي </a>
                                </li>

                                <li class="nav-item">
                                    <a href="images.html" class="nav-link"> صور </a>
                                </li>

                                <li class="nav-item">
                                    <a href="video.html" class="nav-link"> فيديو </a>
                                </li>
                            </ul>

                            <div class="others-option">
                                <div class="get-quote">
                                    <div class="live-part">
                                        <a href="live.html">
                                            <i class="bx bx-slideshow"></i>
                                            <span>مباشر</span>
                                        </a>
                                    </div>

                                    <div class="breaking-part">
                                        <a href="breacking.html">
                                            <i class="bx bx-news"></i>
                                            <span>عاجل</span>
                                        </a>
                                    </div>

                                    <div class="switch-theme">
                                        <a href=""> </a>
                                    </div>

                                    <div class="switch-box">
                                        <label id="switch" class="switch">
                                            <input type="checkbox" onchange="toggleTheme()" id="slider" />
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <!-- <a href=""
                      ><i
                        class="bx bx-broadcast broadcast-active broadcast-inactive"
                      ></i
                    ></a>
                    <a href=""> <i class="bx bx-search search-icon"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="others-option-for-responsive">
                <!-- <div class="container">
            <div class="dot-menu">
              <div class="inner">
                <div class="circle circle-one"></div>
                <div class="circle circle-two"></div>
                <div class="circle circle-three"></div>
              </div>
            </div>

            <div class="container">
              <div class="option-inner">
                <div
                  class="others-option justify-content-center d-flex align-items-center"
                >
                  <div class="get-quote"></div>
                </div>
              </div>
            </div>
          </div> -->
            </div>
        </div>
        <!-- End Navbar Area -->
    </header>
    <!-- End Header Area -->
    {{ $slot }}


    <!-- Start Footer Area -->
    <footer class="footer-area pt-5 mt-2" style="background-color: #0f0f0f; color: #fff">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/img/logo/footer-logo.svg" style="width: 98px; height: 50px" />
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="follow-us">
                        <span class="paragraph">تابعونا عبر</span>
                        <span class="seperator-line">|</span>
                        <a target="_blank" href="https://www.instagram.com/alam24press/">
                            <i class="bx bxl-instagram"></i>
                        </a>
                        <a target="_blank" href="https://twitter.com/alam24press">
                            <i class="bx bxl-twitter"></i>
                        </a>
                        <a target="_blank" href="https://www.facebook.com/alam24press">
                            <i class="bx bxl-facebook-square"></i>
                        </a>
                        <a target="_blank" href="https://www.tiktok.com/@alam24press">
                            <i class="bx bxl-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Copy Right Area -->
        <div class="copy-right-area">
            <div class="container" style="border-top: 1px solid #979797; text-align: start">
                <span>عاجل</span>
                <span>سياسة الخصوصية</span>
                <p style="text-align: start">
                    <i class="bx bx-copyright"></i>
                    <span style="color: #979797"> 2022الحقوق محفوظة لصالح شركة </span>
                    <a href="#" target="_blank" style="color: #979797">جدوى</a>
                </p>
            </div>
        </div>
        <!-- End Copy Right Area -->
    </footer>
    <!-- End Footer Area -->

    <!-- Jquery Min JS -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap Bundle Min JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Meanmenu Min JS -->
    <script src="assets/js/meanmenu.min.js"></script>
    <!-- Wow Min JS -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Owl Carousel Min JS -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Nice Select Min JS -->
    <script src="assets/js/nice-select.min.js"></script>
    <!-- Magnific Popup Min JS -->
    <script src="assets/js/magnific-popup.min.js"></script>
    <!-- Jarallax Min JS -->
    <script src="assets/js/jarallax.min.js"></script>
    <!-- Appear Min JS -->
    <script src="assets/js/appear.min.js"></script>
    <!-- Odometer Min JS -->
    <script src="assets/js/odometer.min.js"></script>
    <!-- Smoothscroll Min JS -->
    <script src="assets/js/smoothscroll.min.js"></script>
    <!-- Form Validator Min JS -->
    <script src="assets/js/form-validator.min.js"></script>
    <!-- Contact JS -->
    <script src="assets/js/contact-form-script.js"></script>
    <!-- Ajaxchimp Min JS -->
    <script src="assets/js/ajaxchimp.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/custom.js"></script>
    <!-- Ads JS -->
    <script src="assets/js/ads.js"></script>
    <!-- Marquee JS -->
    <script src="assets/js/marquee.js"></script>
</body>

</html>
