<template>
<div>

    <!-- Inicio do teste -->
    <div class="col-md-6 col-md-offset-3" v-show="test == 1">
        <h2>Teste Perfil Empreendedor ou Inovador</h2>
        <p>Após um teste de perfil respondido por você a plataforma para identificar suas preferências de trabalho e seu perfil profissional, você será convidado a seguir para uma das trilhas a seguir:</p>
        <div class="alert alert-danger" role="alert">
            Preste atenção nas instruções. O próximo teste somente poderá ser realizado novamente daqui a 90 dias.
        </div>
        <h3 class="intructions">Instruções</h3>

        <p class="text-uppercase text-black">Leia cada par de perguntas e decida qual das respostas do par melhor descreve aquelas que te representam.</p>
        <p class="text-uppercase text-black">Então, utilizando a seguinte escala:</p>

        <div class="col-md-12 test-content-button">
            <div class="row">
                <div class="col-xs-6 col-md-3 test-button">
                    <button type="button" class="btn btn-block" name="button">Menos provável</button>
                </div>

                <div class="col-xs-6 col-md-3 test-button">
                    <button type="button" class="btn btn-block" name="button">Possível</button>
                </div>

                <div class="col-xs-6 col-md-3 test-button">
                    <button type="button" class="btn btn-block" name="button">Bem provável</button>
                </div>

                <div class="col-xs-6 col-md-3 test-button">
                    <button type="button" class="btn btn-block" name="button">Mais provável</button>
                </div>
            </div>
        </div>
        <a v-on:click="testNextLevel" class="default-radar-btn btn btn-sm">Iniciar o teste</a>
    </div>



    <!-- Inicio do questionário -->
    <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" v-show="test == 2">
        <h2 class="text-uppercase">Mapeamento de preferencias no trabalho</h2>
        <p>
            Selecione a operação para cada pergunta
        </p>




        <!-- perguntas -->
        <div :id="question.odr" class="col-md-12 test-content-button test-content-questions" v-for="(question, key) in questions">

            <div class="row" v-for="alternativa in question.alternatives">
                <div class="col-md-12 question-title">
                    <span class="question-item">
                        {{question.odr + '.' + alternativa.option}}
                    </span>
                    <p class="question" :class="{'text-danger': alternativa.error == true}">
                        {{alternativa.title}}
                    </p>
                </div>
                <div class="col-xs-6 col-md-3 test-button">
                    <button v-model="alternativa.res" v-bind:class="{ active: alternativa.res ==0  }" @click="calculate(key, 0, alternativa.option)" type="button" class="btn btn-block" name="button">Menos provável</button>
                </div>

                <div class="col-xs-6 col-md-3 test-button">
                    <button v-model="alternativa.res" v-bind:class="{ active: alternativa.res ==1  }" @click="calculate(key, 1, alternativa.option)" type="button" class="btn btn-block" name="button">Possível</button>
                </div>

                <div class="col-xs-6 col-md-3 test-button">
                    <button v-model="alternativa.res" v-bind:class="{ active: alternativa.res ==2  }" @click="calculate(key, 2, alternativa.option)" type="button" class="btn btn-block" name="button">Bem provável</button>
                </div>

                <div class="col-xs-6 col-md-3 test-button">
                    <button v-model="alternativa.res" v-bind:class="{ active: alternativa.res ==3  }" @click="calculate(key, 3, alternativa.option)" type="button" class="btn btn-block" name="button">Mais provável</button>
                </div>


            </div>
        </div>

        <a v-on:click="sendResult" class="default-radar-btn btn btn-sm">Ver resultado</a>
    </div>


    <!-- mostrar resultado do questionário -->
    <div class="col-md-6 col-md-offset-3 text-result" v-show="test == 3">
        <h2 class="text-uppercase">Parabéns</h2>
        <div class="alert alert-warning" role="alert" v-if="testDone == true">
            Atenção, você já realizou o nosso teste. Poderá realizar um novo dentro de {{90-last_test}} dias.
        </div>
        <h3>Seu perfil é {{profile.initials}}</h3>
        <div class="col-md-12 text-left">
            <h4>Caracteristicas</h4>
            <div v-html="profile.features"></div>
            <h4>Comportamento geral</h4>
            <div v-html="profile.general_behavior"></div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
export default {
    data() {
        return {
            test: null,
            testDone: false,
            last_test: null,
            questions: [],
            userId: '',
            profile: {}
        }
    },

    methods: {
        testNextLevel: function() {
            this.test += 1;
            $(window).scrollTop(0);
        },
        calculateResult: function() {
            this.test += 1;
            $(window).scrollTop(0);
        },
        calculate: function(key, res, option) {
            switch (res) {
                case 0:
                    this.questions[key].alternatives[0].res = 3;
                    this.questions[key].alternatives[1].res = res;

                    if (option == 'A') {
                        this.questions[key].alternatives[0].res = res;
                        this.questions[key].alternatives[1].res = 3;
                    }
                    break;

                case 1:
                    this.questions[key].alternatives[0].res = 2;
                    this.questions[key].alternatives[1].res = res;
                    if (option == 'A') {
                        this.questions[key].alternatives[0].res = res;
                        this.questions[key].alternatives[1].res = 2;
                    }
                    break;

                case 2:
                    this.questions[key].alternatives[0].res = 1;
                    this.questions[key].alternatives[1].res = res;
                    if (option == 'A') {
                        this.questions[key].alternatives[0].res = res;
                        this.questions[key].alternatives[1].res = 1;
                    }
                    break;

                case 3:
                    this.questions[key].alternatives[0].res = 0;
                    this.questions[key].alternatives[1].res = res;
                    if (option == 'A') {
                        this.questions[key].alternatives[0].res = res;
                        this.questions[key].alternatives[1].res = 0;
                    }
                    break;

                default:
                    console.log("Desculpe, estamos sem nenhuma ");
            }

        },


        sendResult: function() {

            var fillError = false;
            for (var i = 1; i <= Object.keys(this.questions).length; i++) {
                if (this.questions[i].alternatives[0].res == -1) {
                    this.questions[i].alternatives[0].error = true;
                    fillError = true;
                } else {
                    this.questions[i].alternatives[0].error = false;
                    fillError = false;
                }

                if (this.questions[i].alternatives[1].res == -1) {
                    this.questions[i].alternatives[1].error = true;
                    fillError = true;
                } else {
                    this.questions[i].alternatives[1].error = false;
                    fillError = false;
                }

            }
            if (fillError == true) {
                Swal.fire({
                    type: 'error',
                    title: 'Atenção...',
                    text: 'É necessário responder todas as perguntas.',
                });
            } else {

                Swal.fire({
                    title: 'Aguarde!',
                    type: 'info',
                    text: 'Estamos analisando seu perfil...',
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    }
                })

                var url = '/api/profile/store-test';
                var vue = this;
                var data = {
                    'questions': this.questions,
                    'id_user': this.userId
                };

                axios.post(url, data).then(function() {

                    let url = '/api/profile/calc';

                    axios.post(url, data).then(function(response) {


                        vue.profile = response.data.data;

                        Swal.hideLoading();
                        Swal.close();
                        if (response.data.status == 'success') {
                            Swal.fire({
                                type: 'success',
                                title: 'Concluído',
                                text: 'A analise foi concluída com sucesso.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            vue.test = 3;
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Erro',
                                text: 'Desculpe, ocorreu um erro, tente novamente mais tarde.',
                            });

                        }
                        $(window).scrollTop(0);
                    });
                });
            }

        }
    },

    beforeCreate() {
        Swal.fire({
            title: 'Aguarde!',
            type: 'info',
            text: 'Carregando dados',
            onBeforeOpen: () => {
                Swal.showLoading()
            }
        })
    },
    mounted() {
        this.userId = document.getElementById('userId').value;
        let vue = this;
        let url = '/api/profile/checktest';


        axios.post(url, {
            'id_user': vue.userId
        }).then(function(response) {
            if (response.data.data) {
                vue.last_test = response.data.data.last_test_time;
                if (vue.last_test > 90) {
                    vue.test = 1;
                } else {
                    vue.testDone = true;
                    vue.test = 3;
                    vue.profile = response.data.data.profile;
                }
            } else {
                vue.test = 1;
            }
            if (vue.test == 1) {
                url = '/api/question/index';
                axios.get(url).then(function(response) {
                    vue.questions = response.data;
                }).catch(function() {

                });
            }
            Swal.hideLoading();
            Swal.close();

        });

    },
}
</script>
