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
                                    <label for="title" class="label-control">Nome do Mini Curso: </label>
                                    <input type="text" v-model="formData.name" id="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Categoria: </label>
                                    <input type="text" v-model="formData.category" id="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Logo: </label>
                                </div>
                                <div class="col-12 banner" :style="{background: 'url('+formData.image+')'}">
                                    <label id="banner_input_label" for="banner_input">Clique para alterar a imagem da postagem</label>
                                    <input id="banner_input" type="file" @change="uploadImage">
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Descrição: </label>
                                    <input type="text" v-model="formData.descript" id="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Responsáveis: </label>
                                    <input type="text" v-model="formData.autors" id="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Data: </label>
                                    <input type="text" v-model="formData.day" id="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Hora: </label>
                                    <input type="text" v-model="formData.hour" id="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-12">
                                    <label for="title" class="label-control">Duração: </label>
                                    <input type="text" v-model="formData.hours" id="title" class="form-control">
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
    name: "mini-curso-edit",
    mounted: function() {
        this.getdata();
    },
    data() {
        return {
            quilleditorOption: {
                placeholder: '',
                readOnly: true,
            },
            formData: {
                image: '/uploads/image/noImage-large.png'
            },
        };
    },
    methods: {
        getdata() {
            if (this.$route.params.id) {
                let url = `/mini-curso/getItem`;

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

            let url = '/mini-curso/store';
            if (this.formData.id) url = '/mini-curso/update';

            let vue = this;
            axios.post(url, vue.formData).then(function(response) {

                if (response.data.status == 'success') {
                    swal("Registro realizado com sucesso!", {
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });
                    vue.$router.push('/mini-cursos');
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
            this.$router.push('/mini-cursos');
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
                let url = '/mini-curso/uploadBanner';
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
