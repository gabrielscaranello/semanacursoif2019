{{-- <div id="login-button" class="container-fluid">
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

--}}

<div class="left-menu wow fadeInLeft" :class="leftMenu">
    <div>
        <ul v-if="userdata" class="navbar-nav align-to-right btn nav-logon">
            <li class="dropdown open">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle active" aria-expanded="true">
                    @{{userdata.name}} </a>
                <ul class="dropdown-menu">
                    {{-- <li class="nav-item"><a href="/perfil" class="nav-link"><i class="fa fa-user mr-2"></i> Minha Conta</a></li> --}}
                    <li class="nav-item"><a href="#" @click.prevent.stop="logout(true)" class="nav-link"><i class="fa fa-sign-out-alt  mr-2"></i> Sair</a></li>
                </ul>
            </li>
        </ul>
        <a v-if="!userdata" class="align-to-right btn nav-logon" data-toggle="modal" data-target="#loginModal">Entrar</a>  
    </div>
    <div class="left-button" @click.prevent.stop="alterLeft()">
        <div class="left-content">
            <i class="fas fa-angle-right"></i>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Faça login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="label-control">Email</label>
                                <input v-model="formLogin.email" type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="label-control">Senha</label>
                                <input v-model="formLogin.password" type="password" class="form-control">
                            </div>
                        </div>

                        <div class="col-12">
                            Ainda não possui registro?
                            <a class="text-info" href="#" @click.prevent.stop="closeloginmodal()" data-toggle="modal" data-target="#registerModal">
                            Cadastre-se
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <div class="col-12 col-lg-6 offset-lg-6">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cancelar <i class="fas fa-times"></i></button>
                            </div>
                            <div class="col-6">
                                <button type="submit" @click.prevent.stop="login" class="btn btn-block btn-success">Entrar <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastre-se</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
