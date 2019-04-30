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
                    <div class="col-12">
                        <label class="label-control">Foto de perfil</label>
                    </div>
                    <div class="profile-image" :style="'background: url('+formRegister.avatar+')'">
                        <input id="banner_input" type="file" @change="uploadImage">
                        <label id="banner_input_label" v-if="!loadingAvatar" for="banner_input"></label>
                        <div class="loadingAvatar d-flex align-items-center justify-content-center" v-if="loadingAvatar">
                            <i class="fas fa-circle-notch"></i>
                        </div>
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
                                <option value="TDS">TDS</option>
                                <option value="Outro">Outro</option>
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
                            <p class="text-danger" v-if="(formRegister.password_confirm != formRegister.password)">
                                Senhas digitadas não conferem
                            </p>
                        </div>
                    </div>

                    <div class="col-12">
                        <p>
                            Ao se cadastrar você estará de acordo com nossos <a @click.prevent.stop="showTermodeUso" class="text-info">Termos de uso</a>.
                        </p>
                    </div>


                    <div class="col-12">
                        <button type="submit" @click.prevent.stop="store" class="btn btn-block btn-success mb-2">Cadastrar-se <i class="fa fa-paper-plane"></i></button>
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

        <div class="col-12 login-form" v-if="!userdata && !register && !termodeuso" :class="{active:leftMenuForm == 'login'}">
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
        <div class="col-12 login-form" v-if="!userdata && !register && termodeuso" :class="{active:leftMenuForm == 'login'}">
            <div class="row">
                <div class="col-12">
                    <h2 class="left-title">Termos de uso</h2>
                </div>
                <div class="col-12">
                    <p class="text-justify">
                        A senha de acesso obtida por meio do cadastro é pessoal e intransferível, sendo o usuário o único responsável por qualquer ato decorrente do uso do site a partir de seu login e senha.
                    </p>
                    <p class="text-justify">
                        A responsabilidade de acesso e inscrições nos minicursos é de total responsabilidade do usuário.
                    </p>
                    <p class="text-justify">
                        Ao fazer o cadastro em nosso sistema o usuário está de acordo com a utilização de seus dados, inseridos no momento do cadastro.
                    </p>
                    <p class="text-justify">
                        O nosso sistema possui uma galeria de fotos, a qual, irá apresentar as fotos do evento e todos os participantes, ao fazer o cadastro em nosso sistema e se inscrever em nossos minicursos o usuário está de acordo com a
                        utilização de sua imagem e voz.
                    </p>
                </div>
                <div class="col-12">
                    <div class="col-6 p-0 mt-2">
                        <button class="btn btn-block btn-pill btn-success" @click.prevent.stop="hideTermoDeUso">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 profile" v-if="userdata && !showRegisterMinicursos">
            <div class="row">
                <div class="col-12">
                    <h2 class="left-title">Perfil</h2>
                </div>
                <div class="profile-image" :style="'background: url('+userdata.avatar+')'">
                    <label id="banner_input_label" v-if="!loadingAvatar" for="banner_input"></label>
                    <div class="loadingAvatar d-flex align-items-center justify-content-center" v-if="loadingAvatar">
                        <i class="fas fa-circle-notch"></i>
                    </div>
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



                <div class="col-12" v-if="!passwordChangeArea">
                    <p class="text-dark">
                        <a href="#" @click.prevent.stop="alterPasswordChange">Alterar senha</a>
                    </p>
                </div>

                <form v-if="passwordChangeArea" class="col-12 px-0 py-2 bg-light">
                    <div class="col-12">
                        <h2 class="left-title">Alterar senha</h2>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="label-control">Digite Sua Senha Atual</label>
                            <input v-model="formChangePass.currentPass" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="label-control">Digite a Nova Senha</label>
                            <input v-model="formChangePass.pass" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="label-control">Confirme a Nova Senha</label>
                            <input v-model="formChangePass.confirmPass" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" @click.prevent.stop="alterPassword" class="btn btn-block btn-success mb-2">Alterar <i class="fa fa-edit"></i></button>
                    </div>
                    <div class="col-12">
                        <button type="reset" @click.prevent.stop="alterPasswordChange" class="btn btn-block btn-danger mb-2">Cancelar <i class="fa fa-ban"></i></button>
                    </div>
                </form>


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
                    <div class="row">
                        <div class="col-10">
                            <p class="text-dark">
                                @{{value.name}}
                            </p>
                        </div>
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <i @click="cancelMinicursoRegister(value.id_inscricao, value.name)" class="fas fa-trash text-danger"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12" v-if="!(miniCursosHasUser.length > 0)">
                    <div class="alert alert-dark" role="alert">
                        <p>
                            Você ainda não se cadastrou em nenhum mini curso.
                        </p>
                    </div>
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



<!-- Modal questão cadastro-->
<div class="modal fade" id="question" tabindex="-1" role="dialog" aria-labelledby="questionTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Faça login para continuar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-dark">Para cadastrar-se em um mini curso é necessário estar logado.</p>
                <p class="text-dark">Caso ainda não possua cadastro, cadastre-se agora mesmo.</p>
            </div>
            <div class="modal-footer">
                <div class="col-12">
                    <div class="row d-flex justify-content-end">
                        <div class="col-12 col-md-6 col-lg-4 mb-2 mb-md-0">
                            <button type="button" @click.prevent.stop="loginMiniCurso('login')" class="btn btn-block btn-pill btn-success">Logar-se</button>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2 mb-md-0">
                            <button type="button" @click.prevent.stop="loginMiniCurso('register')" class="btn btn-block btn-pill btn-success">Cadastrar-se</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
