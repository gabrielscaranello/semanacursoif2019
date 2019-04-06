<template>
<div class="col-12 col-md-6 col-md-offset-3 form">
    <div v-if="step == 1">
        <h2>Olá {{user.name}}, cadastre sua ideia</h2>
        <form method="POST" class="register-form">

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <label for="idea-title">Qual sua faixa etária?</label>
                            <div class="radio-group">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <input type="radio" name="age-group" v-model="form.age_group" value="7-11">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="radio" name="age-group" v-model="form.age_group" value="12-17">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="radio" name="age-group" v-model="form.age_group" value="18+">
                                    </div>
                                </div>
                            </div>
                            <span class="alert-error"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <label for="idea-title">Título da ideia:</label>
                            <input v-model="form.title" class="form-control" id="idea-title" name="idea-title" type="text" placeholder="Ex: Máquina de vendas">
                            <span class="alert-error"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <label for="idea-explain">Explique brevemente sua ideia:</label>
                            <textarea v-model="form.short_description" class="form-control" rows="5" id="idea-explain" name="idea-explain"> </textarea>
                            <span class="alert-error"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <label for="idea-area">Sua ideia está relacionada com qual das áreas abaixo:</label>
                            <select v-model="form.category_id" name="" id="idea-area" class="form-control">
                                <option v-for="item in dataGet.category" :value="item.id">
                                    {{item.name}}
                                </option>
                            </select>
                            <span class="alert-error"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <label for="idea-stage">Estágio da ideia:</label>
                            <select v-model="form.level_id" name="" id="idea-stage" class="form-control">
                                <option v-for="item in dataGet.level" :value="item.id">
                                    {{item.name}}
                                </option>
                            </select>
                            <span class="alert-error"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group radio-list">
                            <label>Para você, qual o grau de novidade da sua ideia:</label>
                            <div class="col-md-12 text-left p-0">
                                <input v-model="form.degree_new_idea" value="baixo" type="radio" id="degree_new_idea1" name="degree_new_idea">
                                <label for="degree_new_idea1">
                                    Baixo (Já vi algo parecido)
                                </label>
                            </div>
                            <div class="col-md-12 text-left p-0">
                                <input v-model="form.degree_new_idea" value="médio" type="radio" id="degree_new_idea2" name="degree_new_idea">
                                <label for="degree_new_idea2">
                                    Médio (Não vi nada igual)
                                </label>
                            </div>
                            <div class="col-md-12 text-left p-0">
                                <input v-model="form.degree_new_idea" value="alto" type="radio" id="degree_new_idea3" name="degree_new_idea">
                                <label for="degree_new_idea3">
                                    Alto (Não vi nada igual e tem muita gente querendo uma solução como essa)
                                </label>
                            </div>
                            <span class="alert-error"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group radio-list">
                            <label>Para você, qual o resultado que a sua ideia terá:</label>
                            <div class="col-md-12 text-left p-0">
                                <input v-model="form.new_idea_result" value="baixo" type="radio" id="new_idea_result1" name="new_idea_result">
                                <label for="new_idea_result1">
                                    Baixo (Algumas pessoas poderiam se interessar)
                                </label>
                            </div>
                            <div class="col-md-12 text-left p-0">
                                <input v-model="form.new_idea_result" value="médio" type="radio" id="new_idea_result2" name="new_idea_result">
                                <label for="new_idea_result2">
                                    Médio (Algumas pessoas com certeza utilizariam ou comprariam)
                                </label>
                            </div>
                            <div class="col-md-12 text-left p-0">
                                <input v-model="form.new_idea_result" value="alto" type="radio" id="new_idea_result3" name="new_idea_result">
                                <label for="new_idea_result3">
                                    Alto (Não vi nada igual e tem muita gente querendo uma solução como essa)
                                </label>
                            </div>
                            <span class="alert-error"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-3">
                <div class="col-md-12">
                    <button @click.prevent.stop="store()" class="btn btn-block" type="submit" name="idea_register" id="idea_register">
                        Cadastrar ideia <i class="fab fa-telegram-plane"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div v-if="step == 2" class="idea-info col-md-8 col-md-offset-2">
        <h2>Cadastre sua ideia</h2>

        <p>Parabéns {{user.name}},</p>
        <p>
            A sua ideia foi cadastrada no Radar de inovação com sucesso. Ela será avaliada por um de nossos mentores do Conselho Municipal de Inovação e você receberá o contato deles ou então poderá verificar o feedback na própria plataforma.
        </p>
        <p>Para ver se tem novidades <a href="#">clique aqui</a>. </p>
        <p class="text-danger">
            * Você ainda não realizou o teste de perfil. É importante fazer pois o perfil do empreendedor é levado em conta na hora da avaliação pelo mentor.
        </p>

        <a href="/teste-de-perfil" class="btn default-radar-btn">FAZER O TESTE DE PERFIL AGORA!</a>

        <p>Obrigado!</p>
    </div>
</div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2'
export default {
    data() {
        return {
            user: {
                name: null,
                id: null,
            },
            dataGet: {
                category: [],
                level: [],
            },
            form: {},
            step: 1
        }
    },
    methods: {
        store: function() {

            var error = [];
            if (this.form.age_group == null || this.form.age_group == '') {
                error.push({
                    'type': 'fill',
                    'msg': '"faixa etária"'
                });
            }
            if (this.form.title == null || this.form.title == '') {
                error.push({
                    'type': 'fill',
                    'msg': '"título da ideia"'
                });
            }
            if (this.form.short_description == null || this.form.short_description == '') {
                error.push({
                    'type': 'fill',
                    'msg': '"breve explicação"'
                });
            }
            if (this.form.category_id == null || this.form.category_id == '') {
                error.push({
                    'type': 'fill',
                    'msg': '"área"'
                });
            }

            if (this.form.level_id == false || this.form.level_id == null) {
                error.push({
                    'type': 'fill',
                    'msg': '"estágio"'
                });
            }

            if (this.form.degree_new_idea == false || this.form.degree_new_idea == null) {
                error.push({
                    'type': 'fill',
                    'msg': '"grau de novidade"'
                });
            }

            if (this.form.new_idea_result == false || this.form.new_idea_result == null) {
                error.push({
                    'type': 'fill',
                    'msg': '"resultados esperados"'
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
                const url = '/api/idea/store';
                const vue = this;
                this.form.user_id = this.user.id;
                axios.post(url, this.form).then(function(response) {
                    if (response.data.status == 'success') {
                        Swal.fire({
                            type: 'success',
                            title: 'Ideia registrada com sucesso.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        vue.step = 2;
                        $(window).scrollTop(0);
                    }
                }).catch(function() {});
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

    mounted() {
        this.user.name = document.getElementById("userName").value;
        this.user.id = document.getElementById("userId").value;
        var userAge = document.getElementById("userAge").value;
        if (userAge >= 18) {
            this.form.age_group = '18+'
        }

        const vue = this;

        axios.get('/api/category/category').then(function(response) {
            vue.dataGet.category = response.data.data;
        });

        axios.get('/api/category/level').then(function(response) {
            vue.dataGet.level = response.data.data;
        });
    },
}
</script>
