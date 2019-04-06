<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Classy - Multipurpose Template | Coming Soon Background Default</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="{!!asset('assets/site/img/core-img/favicon.ico')!!}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{!!asset('assets/site/css/core-style.css')!!}">
    <link rel="stylesheet" href="{!!asset('assets/site/style.css')!!}">

    <!-- Responsive css -->
    <link href="{!!asset('assets/site/css/responsive/responsive.css')!!}" rel="stylesheet">

    <!-- Switch Fonts -->
    <link href="{!!asset('assets/site/css/fonts/opensans.css')!!}" rel="stylesheet">

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
                            <ul data-countdown="2019/02/27 14:37:38">
                                <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                                <li class="bg-primary text-white wow bounceInDown" data-wow-delay="0.2s"><span class="days">@{{count.days}}</span>d</li>
                                <li class="bg-info text-white wow bounceInDown" data-wow-delay="0.7s"><span class="hours">@{{count.hours}}</span>h</li>
                                <li class="bg-success text-white wow bounceInDown" data-wow-delay="1.2s"><span class="minutes">@{{count.minutes}}</span>m</li>
                                <li class="bg-dark text-white wow bounceInDown" data-wow-delay="1.7s"><span class="seconds">@{{count.seconds}}</span>s</li>
                            </ul>
                        </div>
                        <div class="subscribe_bar m-xs-top-15 wow fadeIn" data-wow-delay="2s">
                            <p>Nosso website está em construção.</p>
                            <p class="p-0">Estaremos aqui em breve com nosso novo site incrível, inscreva-se para ser notificado.</p>
                        </div>
                        <div class="social_share_area m-top-30 m-xs-top-15 wow fadeIn" data-wow-delay="3s">
                            <a href="https://www.facebook.com/ifpr.assis/" class="csi csi-circle csi-sm csi-facebook-active"><i class="ion-social-facebook-outline" aria-hidden="true"></i></a>
                            <a href="#" class="csi csi-circle csi-sm csi-github-active"><i class="ion-social-github-outline" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- >>>>>>>>>>>>>>>> All jQuery Plugins <<<<<<<<<<<<<<<< -->

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
    <!-- CDN Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <!-- Active js -->
    <script src="{!!asset('assets/site/js/coming-soon.js')!!}"></script>


</body>

</html>
