<div class="left-menu" :class="leftMenu">

    <div class="close-left">
        <i @click="closeLeft" class="fas fa-times"></i>
    </div>
    <div class="container-fluid internal">
        <div class="col-12 register-form" v-if="!userdata && register" :class="{active:leftMenuForm == 'register'}">
            <form>
                <div class="row">
                    <div class="col-12">
                        <h2>Faça seu Cadastro</h2>
                    </div>
                    <div class="profile-image" :style="'background: url('+formRegister.avatar+')'">
                        <label id="banner_input_label" for="banner_input"></label>
                        <input id="banner_input" type="file" @change="uploadImage">
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="label-control">Nome</label>
                            <input v-model="formRegister.name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="label-control">Sobrenome</label>
                            <input v-model="formRegister.subname" type="text" class="form-control">
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
                            <label class="label-control">Curso</label>
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
                        <button type="submit" @click.prevent.stop="store" class="btn btn-block btn-success mb-2">Entrar <i class="fa fa-paper-plane"></i></button>
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

        <div class="col-12 profile" v-if="userdata && !showRegisterMinicursos">
            <div class="row">
                <div class="col-12">
                    <h2 class="left-title">Perfil</h2>
                </div>
                <div class="profile-image" :style="'background: url('+userdata.avatar+')'">
                    <label id="banner_input_label" for="banner_input"></label>
                    <input id="banner_input" type="file" @change="uploadImage">
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
                <div class="col-12" v-if="userdata.ra">
                    <p class="text-dark">
                        RA
                        @{{userdata.ra}}
                    </p>
                </div>
                <div class="col-12">
                    <p class="text-dark">
                        <a href="#" @click.prevent.stop="alterRegisterMinicursos">
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

        <div class="col-12 miniCursosHasUser" v-if="showRegisterMinicursos">
            <div class="row">
              <div class="col-12">
                  <h2>Mini Cursos Inscritos</h2>
              </div>
                <div class="col-12" v-for="value in miniCursosHasUser">
                    <p class="text-dark">
                        @{{value.name}}
                    </p>
                </div>

                <div class="col-12">
                    <div class="col-6 p-0 mt-2">
                        <button class="btn btn-block btn-pill btn-success" @click.prevent.stop="alterRegisterMinicursos">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </button>
                    </div>
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
