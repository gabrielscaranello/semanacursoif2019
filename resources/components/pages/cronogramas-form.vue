<template>
<div>
    <div class="row">
        <div class="col-lg-12">
            <b-card class="mb-2 bg-default-card" header="Editar Item" header-tag="h4">
                <div>
                    <form method="" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Tipo: </label>
                                    <select v-model="formData.type" id="title" class="form-control">
                                        <option value="palestra">Palestra</option>
                                        <option value="mini-curso">Minicurso</option>
                                        <option value="oficina">Oficina</option>
                                        <option value="outros">Outros</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Titulo: </label>
                                    <input type="text" v-model="formData.title" id="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12" v-if="formData.type == 'palestra'">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Instituição: </label>
                                    <input type="text" v-model="formData.instituicao" id="instituicao" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Auxiliares: </label>
                                    <input type="text" v-model="formData.auxiliares" id="auxiliares" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Local: </label>
                                    <input type="text" v-model="formData.local" id="local" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Ministrante: </label>
                                    <input type="text" v-model="formData.ministrante" id="ministrante" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12" v-if="formData.type == 'mini-curso'">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Monitor: </label>
                                    <input type="text" v-model="formData.monitor" id="monitor" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Horario Inicio: </label>
                                    <input type="time" v-model="formData.horario_inicio" id="horario_inicio" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Horario Fim: </label>
                                    <input type="time" v-model="formData.horario_fim" id="horario_fim" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Dia: </label>
                                    <input type="date" v-model="formData.dia_mes" id="dia_mes" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Dia Semana: </label>
                                    <select v-model="formData.dia_semana" id="monitor" class="form-control">
                                        <option value="Segunda-Feira">Segunda-Feira</option>
                                        <option value="Terça-Feira">Terça-Feira</option>
                                        <option value="Quarta-Feira">Quarta-Feira</option>
                                        <option value="Quinta-Feira">Quinta-Feira</option>
                                        <option value="Sexta-Feira">Sexta-Feira</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Cor: </label>
                                    <select v-model="formData.cor" id="monitor" class="form-control">
                                        <option value="">Branco</option>
                                        <!-- <option value="">Verde</option>
                                      <option value="">Vermelho</option>
                                      <option value="">Amarelo</option>
                                      <option value="">Marrom</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mt-4 mb-2">
                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <a @click.prevent.stop="goBack()" class="btn btn-danger btn-block text-light">
                                                Cancelar
                                                <span class="fa fa-times"></span>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <button @click="sendData()" class="btn btn-success btn-block">
                                                Salvar
                                                <span class="fa fa-check"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </b-card>
        </div>
    </div>
</div>
</template>
<script>
export default {
    name: "cronograma-edit",
    mounted: function() {
        this.getdata();
    },
    data() {
        return {
            quilleditorOption: {
                placeholder: '',
                readOnly: true,
            },
            formData: {},
        };
    },
    methods: {
        getdata() {
            if (this.$route.params.id) {
                let url = `/cronograma/getItem`;

                let vue = this;
                axios.post(url, vue.$route.params).then(function(response) {
                    vue.formData = response.data.data;
                });
            }
        },

        sendData() {
            swal({
                icon: 'info',
                title: 'Registrando',
                text: "Aguarde, estamos realizando o registro.",
                buttons: false,
            });

            console.log(this.formData);

            let url = '/cronograma/store';
            if (this.formData.id) url = '/cronograma/update';

            let vue = this;
            axios.post(url, vue.formData).then(function(response) {

                if (response.data.status == 'success') {
                    swal("Registro realizado com sucesso!", {
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });
                    vue.$router.push('/cronogramas');
                } else {
                    swal("Desculpe! Ocorreu um erro ao realizar o registro. Por favor, tente novamente mais tarde.", {
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });
                }

            });
        },
        goBack() {
            this.$router.push('/cronogramas');
        },

        uploadImage: function(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;

            this.createImage(files[0]);
        },
        createImage(file) {
            var reader = new FileReader();
            var vue = this;

            reader.onload = (e) => {
                let url = '/cronograma/uploadBanner';
                let data = {
                    'image': e.target.result,
                };
                let vue = this;
                axios.post(url, data).then(function(response) {
                    vue.formData.image = response.data.image;
                });
            };
            reader.readAsDataURL(file);
        }
    },
}
</script>
<style type="text/css" scoped>
#color {
    height: 35px;
}

/deep/ .form-control:disabled {
    cursor: not-allowed;
}

.disabled {
    cursor: not-allowed;
}

a {
    text-decoration: none;
}

a:hover,
button:hover {
    color: #fff !important;
}

button .fa,
a .fa {
    font-weight: bold;
}

.form-control:active,
.input-group .form-control:hover {
    z-index: 1;
}

.banner {
    height: 300px;
    width: 300px;
    background-position: center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    margin-left: 1.5rem !important;
    margin-bottom: 3rem;
    border-radius: .5rem;
}

.banner img {
    max-width: 100%;
    max-height: 300px;
}


#banner_input_label {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(rgba(0, 0, 0, .8), rgba(0, 0, 0, .4));
    opacity: 0;
    transition: .3s;
    border-radius: .5rem;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

#banner_input_label:hover {
    opacity: 1;
}

#banner_input {
    display: none;
}
</style>
