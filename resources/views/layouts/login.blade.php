<div class="left-menu" :class="leftMenu">
    {{-- <div>
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
</div> --}}
<div class="close-left">
    <i @click="closeLeft" class="fas fa-times"></i>
</div>
<div class="container-fluid internal">
    <div class="col-12 login-form" v-if="!userdata && register" :class="{active:leftMenuForm == 'login'}">
        <form>
            <div class="row">
                <div class="col-12">
                    <h2>Faça seu Cadastro</h2>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="label-control">Nome Completo</label>
                        <input v-model="formRegister.nome" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label class="label-control">É aluno(a) do IFPR?</label>
                            </div>
                            <div class="col-6">
                                <input type="radio" v-model="formRegister.aluno" name="aluno" id="aluno-sim" value="1"> <label for="aluno-sim">Sim</label>
                            </div>
                            <div class="col-6">
                                <input type="radio" v-model="formRegister.aluno" name="aluno" id="aluno-nao" value="-1"> <label for="aluno-nao">Não</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" v-if="formRegister.aluno == 1">
                    <div class="form-group">
                        <label class="label-control">Registro Acadêmico (RA)</label>
                        <input v-model="formRegister.ra" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-12" v-if="formRegister.aluno == 1">
                    <div class="form-group">
                        <label class="label-control">Cruso</label>
                        <select v-model="formRegister.curso" class="custom-select form-control">
                          <option value="IIN">IIN</option>
                          <option value="TADS">TADS</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group" v-if="formRegister.aluno == 1">
                        <label class="label-control">Turma</label>
                        <input v-model="formRegister.turma" type="text" class="form-control">
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
                <div class="col-12">
                    <div class="form-group">
                        <label class="label-control">Confirmação de Senha</label>
                        <input v-model="formRegister.password_confirm" type="password" class="form-control">
                    </div>
                </div>


                <div class="col-12">
                    <button type="submit" @click.prevent.stop="login" class="btn btn-block btn-success mb-2">Entrar <i class="fa fa-paper-plane"></i></button>
                </div>

                <div class="col-12">
                    Já possui registro?
                </div>
                <div class="col-12 mb-2">
                    <a class="text-info" href="#" @click.prevent.stop="alterRegisterForm()" data-toggle="modal" data-target="#registerModal">
                    Faça Login
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="col-12 login-form" v-if="!userdata && !register" :class="{active:leftMenuForm == 'login'}">
        <form>
            <div class="row">
                <div class="col-12">
                    <h2>Faça Login</h2>
                </div>
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
                    <button type="submit" @click.prevent.stop="login" class="btn btn-block btn-success mb-2">Entrar <i class="fa fa-paper-plane"></i></button>
                </div>

                <div class="col-12">
                    Ainda não possui registro?
                </div>
                <div class="col-12">
                    <a class="text-info" href="#" @click.prevent.stop="alterRegisterForm()" data-toggle="modal" data-target="#registerModal">
                    Cadastre-se
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="col-12 profile" v-if="userdata">
        <div class="row">
            <div class="col-12">
                <h2 class="left-title">Perfil</h2>
            </div>
            <div class="profile-image" :style="'background: url('+userdata.avatar+')'">

            </div>
            <div class="col-12">
                <p class="text-dark">
                    @{{userdata.name}}
                </p>
            </div>
            <div class="col-12" v-if="userdata.estudante ==1">
                <p class="text-dark text-uppercase">
                    @{{userdata.curso+userdata.ano}}
                </p>
            </div>
            <div class="col-12">
                <p class="text-dark">
                    RA
                    @{{userdata.ra}}
                </p>
            </div>
            <div class="col-12">
                <p class="text-dark">
                    <a href="#" @click.prevent.stop="showRegisterMinicursos">
                        Minicursos Incritos
                    </a>
                </p>
            </div>

            <div class="col-12">
                <p class="text-dark">
                    <a href="#" @click.prevent.stop="logout(true)">Sair</a>
                </p>
            </div>

        </div>

    </div>
</div>

<div class="left-button" @click.prevent.stop="openLeft()">
    <div class="left-content">
        <i class="fas fa-angle-right"></i>
    </div>
</div>
</div>


<!-- Modal -->
{{-- <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <div class="col-12">
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
</div> --}}

<!-- Modal -->
{{-- <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
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

                        <div class="col-12">
                            Possui registro?
                            <a class="text-info" href="#" @click.prevent.stop="closeRegisterModal()" data-toggle="modal" data-target="#loginModal">
                            Entrar
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
                                <button type="submit" @click.prevent.stop="register" class="btn btn-block btn-success">Cadastrar <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}
