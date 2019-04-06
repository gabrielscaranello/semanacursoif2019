<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Em Breve - IFPR Eventos</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="{!!asset('assets/site/img/core-img/favicon.png')!!}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{!!asset('assets/site/css/core-style.css')!!}">
    <link rel="stylesheet" href="{!!asset('assets/site/style.css')!!}">

    <!-- Responsive css -->
    <link href="{!!asset('assets/site/css/responsive/responsive.css')!!}" rel="stylesheet">

    <!-- Switch Fonts -->
    <link href="{!!asset('assets/site/css/fonts/opensans.css')!!}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="classy-load"></div>
    </div>

    <div class="comingsoon_area full_height bg-gray" id="app">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12">
                    <div class="cooming_soon_content text-center">
                        <div class="coming_soon_timer">
                            <ul>
                                <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                                <li class="bg-primary text-white" data-aos="fade-down" data-aos-easing="ease-in-out" data-aos-offset="500" data-aos-delay="450"  data-aos-duration="400">
                                    <span class="days">
                                        @{{count.days}}</span>d
                                </li>
                                <li class="bg-info text-white" data-aos="fade-down" data-aos-easing="ease-in-out" data-aos-offset="500" data-aos-delay="900"  data-aos-duration="400"><span class="hours">
                                        @{{count.hours}}</span>h
                                </li>
                                <li class="bg-success text-white" data-aos="fade-down" data-aos-easing="ease-in-out" data-aos-offset="500" data-aos-delay="1350"  data-aos-duration="400"><span class="minutes">
                                        @{{count.minutes}}</span>m
                                </li>
                                <li class="bg-dark text-white" data-aos="fade-down" data-aos-easing="ease-in-out" data-aos-offset="500" data-aos-delay="1800"  data-aos-duration="400"><span class="seconds">
                                        @{{count.seconds}}</span>s
                                </li>
                            </ul>
                        </div>
                        <div class="subscribe_bar m-xs-top-15">
                            <p data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-offset="500" data-aos-delay="2000"  data-aos-duration="400">Nosso website está em construção.</p>
                            <p class="p-0" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-offset="500" data-aos-delay="2350"  data-aos-duration="400">Estaremos aqui em breve com nosso novo site incrível.</p>
                        </div>
                        <div class="social_share_area m-top-30 m-xs-top-15 " data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-offset="500" data-aos-delay="2700"  data-aos-duration="400">
                            <a target="_blank" href="https://www.facebook.com/ifpr.assis/" class="csi csi-circle csi-sm csi-facebook-active"><i class="ion-social-facebook-outline" aria-hidden="true"></i></a>
                            {{-- <a href="#" class="csi csi-circle csi-sm csi-github-active"><i class="ion-social-github-outline" aria-hidden="true"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- >>>>>>>>>>>>>>>> All jQuery Plugins <<<<<<<<<<<<<<<< -->
    <!-- CDN Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>

    <script src="{!!asset('assets/site/js/coming-soon.js')!!}"></script>
    <!-- Active js -->
    <!-- jQuery (necessary for all JavaScript plugins) -->
    <script src="{!!asset('assets/site/js/jquery/jquery-2.2.4.min.js')!!}"></script>
    <!-- Popper js -->
    <script src="{!!asset('assets/site/js/bootstrap/popper.min.js')!!}"></script>
    <!-- Bootstrap js -->
    <script src="{!!asset('assets/site/js/bootstrap/bootstrap.min.js')!!}"></script>
    <!-- Plugins js -->
    <script src="{!!asset('assets/site/js/include-all-plugins.js')!!}"></script>
    <!-- Active js -->
    <script src="{!!asset('assets/site/js/active.js')!!}"></script>



    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
