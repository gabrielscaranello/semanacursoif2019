<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Cadastro - IFPR Eventos</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="{!!asset('assets/site/img/core-img/favicon.png')!!}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{!!asset('assets/site/css/core-style.css')!!}">
    <link rel="stylesheet" href="{!!asset('assets/site/style.css')!!}">

    <!-- Responsive css -->
    <link href="{!!asset('assets/site/css/responsive/responsive.css')!!}" rel="stylesheet">

    <link href="{!!asset('assets/site/css/cronogram.css')!!}" rel="stylesheet">
    <link rel="stylesheet" href="{!!asset('assets/site/css/buttontop.css')!!}">


    <!-- Switch Fonts -->
    <link href="{!!asset('assets/site/css/fonts/opensans.css')!!}" rel="stylesheet">
    <link href="{!!asset('assets/site/css/home.css')!!}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="classy-load"></div>
    </div>

    <div id="app">


        <div class="col-12">
            <div class="form-group">
                <label class="label-control">Nome</label>
                <input v-model="formRegister.name" type="text" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="label-control">É estudante do IFPR?</label>
                <div class="row radio">
                    <div class="col-6 text-left">
                        <input id="estudante-sim" v-model="formRegister.estudante" type="radio" value="1" class="form-control">
                        <label for="estudante-sim">Sim</label>
                    </div>
                    <div class="col-6 text-left">
                        <input id="estudante-nao" v-model="formRegister.estudante" type="radio" value="0" class="form-control">
                        <label for="estudante-nao">Não</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="label-control">Registro Academico (Número de Matrícola)</label>
                <input v-model="formRegister.ra" type="text" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="label-control">Curso</label>
                <input v-model="formRegister.curso" type="text" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="label-control">Ano</label>
                <input v-model="formRegister.ano" type="year" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="label-control">Email</label>
                <input v-model="formRegister.email" type="email" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="label-control">Senha</label>
                <input v-model="formRegister.password" type="password" class="form-control">
            </div>
        </div>
    </div>


    <!-- >>>>>>>>>>>>>>>> All jQuery Plugins <<<<<<<<<<<<<<<< -->
    <!-- CDN Vue -->

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

    <script src="{!!asset('assets/site/js/active.js')!!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/vue-gallery-slideshow"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{!!asset('assets/site/js/login.js')!!}"></script>

</body>

</html>
