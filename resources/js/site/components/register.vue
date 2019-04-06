<template>
<div class="col-12 col-md-6 col-md-offset-3 form">

    <div v-if="registerStep == 1">
        <div class="heading">
            <h2>Cadastre-se</h2>
        </div>
        <form method="POST" class="register-form">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="name">Tipo de perfil</label>
                                <select class="form-control" v-model="form.role">
                                    <i class="fas fa-angle-down"></i>
                                    <option value="mentor">Mentor</option>
                                    <option value="usuario">Usuário</option>
                                </select>
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="name">Nome completo</label>
                                <input v-model="form.name" class="form-control" id="name" name="name" type="text">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input v-mask="'###.###.###-##'" v-model="form.cnpj_cpf" class="form-control" id="cpf" name="cpf" type="text">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="cpf">Data de nascimento</label>
                                <input v-model="form.birth_date" class="form-control" id="birth_date" name="birth_date" type="date">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input v-model="form.email" class="form-control" id="email" name="email" type="email">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input v-model="form.password" min="6" class="form-control" id="password" name="password" type="password">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group acceptTerms">
                                <input v-model="form.acceptTerms" id="acceptTerms" name="acceptTerms" type="checkbox" class="form-check-input">
                                Ao realizar o casdastro, você aceita o <a href="#">termo de uso</a> e <a href="#">política de privacidade</a> da plataforma.
                                <span class="alert-error"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <div v-if="registerStep == 2">
        <h2>Bem vindo(a), {{form.name}}</h2>

        <form method="POST" class="contact-form">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label for="id_hours">Quantas horas você tem disponibilidade para mentorar</label>
                        <select v-model="form.id_hours" class="form-control" id="id_hours" name="id_hours">
                            <option value="" disabled selected>Selecione</option>
                            <option v-for="item in dataGet.hours" :value="item.id">
                                {{item.name}}
                            </option>
                        </select>
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label>Mentores categorizados</label>
                        <div class="row text-left checkbox-list">
                            <div class="col-sm-6 col-md-3" v-for="item in dataGet.category">
                                <input :id="item.id" type="checkbox" :value="item.id" v-model="form.checkedCategories">
                                <label :for="item.id">{{item.name}}</label>
                            </div>
                        </div>
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label>Escolher nível que quer mentorar</label>
                        <div class="row text-left checkbox-list">
                            <div class="col-sm-6 col-md-3" v-for="item in dataGet.level">
                                <input :id="item.id" type="checkbox" :value="item.id" v-model="form.checkedLevel">
                                <label :for="item.id">{{item.name}}</label>
                            </div>
                        </div>
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label>Seu suporte será para</label>
                        <div class="row text-left checkbox-list">
                            <div class="col-sm-6 col-md-6" v-for="item in dataGet.support">
                                <input :id="item.id" type="checkbox" :value="item.id" v-model="form.checkedSupport">
                                <label :for="item.id">{{item.name}}</label>
                            </div>
                        </div>
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>


        </form>
    </div>

    <div v-if="registerStep == 3">
        <div class="heading">
            <h2>Bem vindo(a), {{form.name}}</h2>
        </div>
        <form method="POST" class="register-form">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label for="mini_curriculum">Mini Curriculo</label>
                        <textarea v-model="form.mini_curriculum" class="form-control" id="mini_curriculum" name="mini_curriculum"></textarea>
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label for="phone">Telefone para contato</label>
                        <input v-mask="'(##) # ####-####'" v-model="form.phone" class="form-control" id="phone" name="phone" type="tel">
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label for="experience">Descreva a sua experiência como empreendedor</label>
                        <textarea v-model="form.experience" class="form-control" id="experience" name="experience"></textarea>
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label for="chanllenge">Qual o maior desafio da sua vida profissional</label>
                        <input v-model="form.chanllenge" class="form-control" id="chanllenge" name="chanllenge" type="text">
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>


            <!-- Alert Message -->
            <div class="col-md-12 alert-notification">
                <div id="message" class="alert-msg"></div>
            </div>
        </form>
    </div>

    <div v-if="registerStep == 4" class="col-12 col-md-10 col-md-offset-1 registerStep4">
        <div class="heading">
            <h2>Bem vindo(a), {{form.name}}</h2>
        </div>

        <p>
            Parabéns, você se cadastrou para ser um mentor do Programa municipal de inocação de Cascavel.
        </p>

        <p>
            Estamos muito felizes por você ajudar o ecossistema de inovação da nossa região.
        </p>

        <p>
            Seu cadastro está sendo avaliado pela equipe da Fundetec, que irá fazer uma entrevista remota ou presencial para te conhecer mais profundamente e alinhar o funcionamento do programa.
        </p>

        <p>
            Confira se seu email e telefone estão corretamente cadastrados na plataforma para entrarmos em contato contigo.
        </p>

        <p>Obrigado.</p>

        <div class="col-12 text-center">
            <img alt="logo" src="/assets/site/img/mentor/logo-fundetec.png">
        </div>
    </div>

    <div v-if="registerStep < 4 && form.loading == false">
        <div class="col-md-12">
            <div class="row">
                <transition name="fade">
                    <div class="col-md-4" v-show="registerStep > 1">
                        <button class="btn preview btn-block" type="button" @click.prevent.stop="previewStep" name="previewStep" id="previewStep">
                            <i class="fas fa-chevron-left mr-auto"></i> <span class="mr-auto">Anterior</span>
                        </button>
                    </div>
                </transition>
                <transition name="fade">
                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn next btn-block" type="button" @click.prevent.stop="registerStore" name="registerStore" id="registerStore">
                            Próximo <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </transition>
            </div>
        </div>
    </div>
    <div v-if="form.loading == true" class="col-12 text-center">
        carregando...
    </div>

    <div v-if="registerStep == 5" class="col-12 col-md-10 col-md-offset-1 registerStep4">
        <div class="heading">
            <h2>Bem vindo(a), {{form.name.substring(0, form.name.indexOf(' ') + 1)}}</h2>
        </div>

        <p>
            Parabéns, você se cadastrou no Programa municipal de inocação de Cascavel.
        </p>

        <p>
            Estamos muito felizes por você ajudar o ecossistema de inovação da nossa região.
        </p>

        <p>
            Seu cadastro está sendo avaliado pela equipe da Fundetec, que irá fazer uma entrevista remota ou presencial para te conhecer mais profundamente e alinhar o funcionamento do programa.
        </p>

        <p>
            Confira se seu email e telefone estão corretamente cadastrados na plataforma para entrarmos em contato contigo.
        </p>

        <div class="col-md-8 col-md-offset-2">
            <a href="/teste-de-perfil" class="btn btn-block default-radar-btn">Fazer teste de perfil agora!</a>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <p>Obrigado.</p>
        </div>

        <div class="col-12 text-center">
            <img alt="logo" src="/assets/site/img/mentor/logo-fundetec.png">
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2'
export default {
    data() {
        return {
            form: {
                loading: false,
                checkedCategories: [],
                checkedLevel: [],
                checkedSupport: [],
                role: document.getElementById('userType').value,
            },
            dataGet: {
                hours: [],
                category: [],
                level: [],
                support: [],
            },
            registerStep: 1,
        }
    },
    methods: {

        previewStep: function() {
            this.registerStep--;
            $(window).scrollTop(0);
        },

        registerStore: function() {
            this.form._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


            if (this.registerStep == 1) {
                var error = [];
                if (this.form.name == null || this.form.name == '') {
                    error.push({
                        'type': 'fill',
                        'msg': '"nome"'
                    });
                }
                if (this.form.cnpj_cpf == null || this.form.cnpj_cpf == '') {
                    error.push({
                        'type': 'fill',
                        'msg': '"CPF"'
                    });
                }

                if (this.form.birth_date == null || this.form.birth_date == '') {
                    error.push({
                        'type': 'fill',
                        'msg': '"data de nascimento"'
                    });
                }
                if (this.form.email == null || this.form.email == '') {
                    error.push({
                        'type': 'fill',
                        'msg': '"email"'
                    });
                }
                if (this.form.password == null || this.form.password == '') {
                    error.push({
                        'type': 'fill',
                        'msg': '"senha"'
                    });
                }

                if (this.form.acceptTerms == false || this.form.acceptTerms == null) {
                    error.push({
                        'type': 'fill',
                        'msg': '"aceito os termos de uso"'
                    });
                }


                if (error.length > 0) {
                    if (error.length == 1) {
                        this.alertError(error[0]);
                    } else {
                        var compiled_msg = 'Os campos ';
                        for (var i = 0; i < error.length; i++) {
                            if ((error.length - i) == 2) {
                                compiled_msg += error[i].msg + ' e ';
                            } else if ((error.length - i) == 1) {
                                compiled_msg += error[i].msg;
                            } else {
                                compiled_msg += error[i].msg + ', ';
                            }
                        }
                        compiled_msg = compiled_msg + ' são obrigatórios.';
                        error.compiled_msg = compiled_msg;
                        this.alertError(error);
                    }
                } else {
                    $(window).scrollTop(0);
                    if (this.form.role == 'usuario') {
                        this.form.loading = true;
                        var url = '/api/users/store';
                        var vue = this;
                        axios.post(url, this.form).then(function(response) {
                            if (response.data.status == 'success') {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Registro concluído com sucesso.',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                vue.registerStep = 5;
                                $(window).scrollTop(0);
                                vue.form.loading = false;

                            }
                        }).catch(function() {

                        });
                    } else {
                        this.registerStep++;
                    }
                }
            } else if (this.registerStep == 2) {
                var error = [];
                if (this.form.id_hours == null || this.form.id_hours == '') {
                    error.push({
                        'type': 'checked',
                        'msg': '"quantidade de horas"'
                    });
                }
                if (this.form.checkedCategories.length == 0) {
                    error.push({
                        'type': 'checked',
                        'msg': '"caterogias"'
                    });
                }
                if (this.form.checkedLevel.length == 0) {
                    error.push({
                        'type': 'checked',
                        'msg': '"nível de mentoria"'
                    });
                }
                if (this.form.checkedSupport.length == 0) {
                    error.push({
                        'type': 'checked',
                        'msg': '"suporte"'
                    });
                }



                if (error.length > 0) {
                    if (error.length == 1) {
                        this.alertError(error[0]);
                    } else {
                        var compiled_msg = 'É necessário selecionar os campos ';
                        for (var i = 0; i < error.length; i++) {
                            if ((error.length - i) == 2) {
                                compiled_msg += error[i].msg + ' e ';
                            } else if ((error.length - i) == 1) {
                                compiled_msg += error[i].msg + '.';
                            } else {
                                compiled_msg += error[i].msg + ', ';
                            }
                        }
                        error.compiled_msg = compiled_msg;
                        this.alertError(error);
                    }
                } else {
                    $(window).scrollTop(0);
                    this.registerStep++;
                }
            } else if (this.registerStep == 3) {
                var error = [];

                if (this.form.mini_curriculum == null || this.form.mini_curriculum == '') {
                    error.push({
                        'type': 'fill',
                        'msg': '"mini curriculo"'
                    });
                }
                if (this.form.phone == null || this.form.phone == '') {
                    error.push({
                        'type': 'fill',
                        'msg': '"telefone"'
                    });
                }
                if (this.form.experience == null || this.form.experience == '') {
                    error.push({
                        'type': 'fill',
                        'msg': '"experiencia como empreendedor"'
                    });
                }
                if (this.form.chanllenge == null || this.form.chanllenge == '') {
                    error.push({
                        'type': 'fill',
                        'msg': '"desafio profissional"'
                    });
                }

                if (error.length > 0) {
                    if (error.length == 1) {
                        this.alertError(error[0]);
                    } else {
                        var compiled_msg = 'É necessário selecionar os campos ';
                        for (var i = 0; i < error.length; i++) {
                            if ((error.length - i) == 2) {
                                compiled_msg += error[i].msg + ' e ';
                            } else if ((error.length - i) == 1) {
                                compiled_msg += error[i].msg + '.';
                            } else {
                                compiled_msg += error[i].msg + ', ';
                            }
                        }
                        error.compiled_msg = compiled_msg;
                        this.alertError(error);
                    }
                } else {
                    this.form.loading = true;
                    var url = '/api/users/store';
                    var vue = this;
                    axios.post(url, this.form).then(function(response) {
                        if (response.data.status == 'success') {
                            Swal.fire({
                                type: 'success',
                                title: 'Registro concluído com sucesso.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            vue.registerStep = 4;
                            $(window).scrollTop(0);
                            vue.form.loading = false;

                        }
                    }).catch(function() {

                    });

                }
            }
        },

        alertError: function(error) {
            if (error.type == 'fill') {
                Swal.fire({
                    type: 'error',
                    title: 'Atenção...',
                    text: 'O campo ' + error.msg + ' é obrigatório.',
                });
            } else if (error.type == 'checked') {
                Swal.fire({
                    type: 'error',
                    title: 'Atenção...',
                    text: 'É necessário selecionar o campo ' + error.msg + '.',
                });
            } else if (error.compiled_msg != '') {
                Swal.fire({
                    type: 'error',
                    title: 'Atenção...',
                    text: '' + error.compiled_msg,
                });
            }
        }
    },
    beforeCreate() {
        const vue = this;
        axios.get('/api/category/hours').then(function(response) {
            vue.dataGet.hours = response.data.data;
        });

        axios.get('/api/category/category').then(function(response) {
            vue.dataGet.category = response.data.data;
        });


        axios.get('/api/category/level').then(function(response) {
            vue.dataGet.level = response.data.data;
        });


        axios.get('/api/category/support').then(function(response) {
            vue.dataGet.support = response.data.data;
        });
    }
}
</script>
