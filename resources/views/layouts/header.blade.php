{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">IFPR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#evento">O evento</a></li>
            <li class="nav-item"><a class="nav-link" href="#galeria">Galeria</a></li>
            <li class="nav-item"><a class="nav-link" href="#palestras">palestras</a></li>
            <li class="nav-item"><a class="nav-link" href="#mini-cursos">Mini Cursos</a></li>
        </ul>
        <ul v-if="userdata" class="navbar-nav align-to-right btn nav-logon">
            <li class="dropdown open">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle active" aria-expanded="true">
                    @{{userdata.name}} </a>
<ul class="dropdown-menu">
    <li class="nav-item"><a href="/perfil" class="nav-link"><i class="fa fa-user mr-2"></i> Minha Conta</a></li>
    <li class="nav-item"><a href="#" @click.prevent.stop="logout(true)" class="nav-link"><i class="fa fa-sign-out-alt  mr-2"></i> Sair</a></li>
</ul>
</li>
</ul>
<a v-if="!userdata" class="align-to-right btn nav-logon" data-toggle="modal" data-target="#loginModal">Entrar</a>
</div>
</nav> --}}



<!-- ***** Header Area Start ***** -->
<header class="header_area">
    <div class="main_header_area animated">
        <div class="container">
            <nav id="navigation1" class="navigation">
                <!-- Logo Area -->
                <div class="nav-header">
                    <a class="nav-brand" href="#">CLASSY.</a>
                    <div class="nav-toggle"></div>
                </div>
                <!-- Main Menus Wrapper -->
                <div class="nav-menus-wrapper">
                    <ul class="nav-menu align-to-right" id="nav">
                        <li class="active"><a href="#inicio">Início</a></li>
                        <li><a href="#evento">O Evento</a></li>
                        <li><a href="#galeria">Galeria</a></li>
                        <li><a href="#palestras">Palestras</a></li>
                        <li><a href="#mini-cursos">Mini Cursos</a></li>
                    </ul>
                    <ul v-if="userdata" class="navbar-nav align-to-right btn nav-logon">
                        <li class="dropdown open">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle active" aria-expanded="true">
                                @{{userdata.name}} </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="/perfil" class="nav-link"><i class="fa fa-user mr-2"></i> Minha Conta</a></li>
                                <li class="nav-item"><a href="#" @click.prevent.stop="logout(true)" class="nav-link"><i class="fa fa-sign-out-alt  mr-2"></i> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
