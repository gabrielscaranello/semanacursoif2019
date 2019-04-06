<template>
<div class="container-fluid img_backgrond">
    <div class="row">
        <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 col-xs-10 offset-xs-1 login-content mt-5">
            <div class="row">
                <div class="col-sm-12 mt-3">
                    <h2 class="text-center">
                        <img src="~img/logo_7cliques_black.png" alt="Logo">
                    </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12">
                    <div class="text-center">
                        <img src="~img/pages/login_user-01.png" class="rounded-circle">
                    </div>
                </div>
            </div>
            <vue-form :state="formstate" @submit.prevent="onSubmit">
                <div class="row mx-1 mb-3">
                    <div class="col-sm-12 mt-3 ">
                        <p v-show="show_error" class="text-danger">E-mail ou senha não é válida</p>

                        <div class="form-group">
                            <validate tag="div">
                                <label for="email">E-mail</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input v-model="model.email" name="email" id="email" type="email" required autofocus placeholder="E-mail" class="form-control" />
                                </div>
                                <field-messages name="email" show="$invalid && $submitted" class="text-danger">
                                    <div slot="required">E-mail é um campo obrigatório</div>
                                    <div slot="email">E-mail não é válido</div>
                                </field-messages>
                            </validate>
                        </div>



                    </div>

                    <div class="col-sm-12">


                        <div class="form-group">
                            <validate tag="div">
                                <label for="password"> Senha</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                                    </div>
                                    <input v-model="model.password" name="password" id="password" type="password" required placeholder="Password" class="form-control" minlength="4" maxlength="10" />
                                </div>
                                <field-messages name="password" show="$invalid && $submitted" class="text-danger">
                                    <div slot="required">Senha requerida</div>
                                    <div slot="minlength">A senha deve ter pelo menos 4 caracteres</div>
                                    <div slot="maxlength">A senha deve ter no máximo 10 caracteres</div>
                                </field-messages>

                            </validate>
                        </div>



                    </div>
                    <div class="col-lg-6 col-md-6">
                        <validate tag="label">
                            <b-form-checkbox id="remember" v-model="model.remember">Lembre de mim</b-form-checkbox>
                            <field-messages name="remember" show="$invalid && $submitted" class="text-danger">
                                <div slot="check-box">Os termos devem ser aceitos</div>
                            </field-messages>
                        </validate>
                    </div>

                    <div class="col-lg-6 text-right">
                        <div class="form-group">
                            <div class="login-text">
                                <router-link tag="a" to="/forgotpassword" class="">Esqueceu sua senha ?</router-link>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-right">
                        <div class="form-group">
                            <input type="submit" value="Logar" class="btn btn-success btn-block" />
                        </div>
                    </div>
                    <br>

                    <div class="col-lg-12 text-left">
                        <div class="form-group">
                            <div class="login-text">
                                Novo usuário?
                                <router-link tag="a" to="/register" class="">Inscrever-se</router-link>
                            </div>
                        </div>
                    </div>


                </div>
            </vue-form>
        </div>

    </div>
</div>
</template>
<script>
import Vue from 'vue'

import VueForm from "vue-form";
import options from "src/validations/validations.js";
import ApiService from "../../common/api.service";

Vue.use(VueForm, options);
export default {
    name: "login2",
    data() {
        return {
            formstate: {},
            show_error: false,
            model: {
                email: "",
                password: ""

            }
        }
    },
    methods: {
        onSubmit() {
            if (this.formstate.$invalid) {
                return;
            } else {
                ApiService.post('auth/login', this.model)
                    .then(data => {
                        localStorage.token = data.data.token
                        localStorage.userId = data.data.user.id
                        localStorage.avatar = data.data.user.avatar
                        localStorage.username = data.data.user.name
                        this.$store.state.user.picture = data.data.user.avatar
                        this.$store.state.user.name = data.data.user.name
                        // this.$store.dispatch('login', data);
                        this.show_error = false;
                    })
                    .then(() => {
                        this.$router.push('/')
                    })
                    .catch(error => {
                        this.show_error = true;
                    })

            }
        }
    },
    mounted: function() {

    },
    destroyed: function() {

    },

}
</script>
<style scoped>
.login-content {
    margin-top: 7%;
    margin-bottom: 7%;
    box-shadow: 0 0 20px #ccc;
    background-size: 100% 100%;
    border-radius: 7px;
    background-color: #ffffff;

}


.img_backgrond {
    background-image: url("../../img/pages/Login-03-01.png");
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    padding: 75px 15px;
}

label {
    font-size: 14px !important;
}

::-webkit-input-placeholder {
    font-size: 14px;
}

.img_backgrond .input-group-text {
    background-color: white;
}

.fa-user,
.fa-key,
.fa {
    color: #ced4da;
}

.custom-checkbox label::before {
    background-color: #ced4da !important;
}

.login-text {
    font-size: 14px;
}
</style>
