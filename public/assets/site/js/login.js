new Vue({
    el: '#app',
    data: {
        formLogin: {},
        formRegister: {
            aluno: -1
        },
        userdata: {},
        images: [],
        index: null,
        leftMenu: 'closed',
        leftMenuForm: 'login',
        register: false,
        cronograma: 'TADS'
    },
    mounted: function() {
        this.loadLoginInfo();
        this.getGalleryImages();
    },
    methods: {
        getGalleryImages: function() {
            let url = '/api/gallery/list'
            let vue = this;
            axios.get(url).then(function(response) {
                for (var i = 0; i < response.data.data.length; i++) {
                    vue.images.push(response.data.data[i].image);
                }
            })
        },
        openLeft: function() {
            this.leftMenu = 'open';
        },
        closeLeft: function() {
            this.leftMenu = 'closed';
        },
        login: function() {
            swal({
                icon: 'info',
                title: 'Aguarde',
                text: "Realizando login...",
                buttons: false
            });
            const url = '/api/users/login';
            let vue = this;
            axios.post(url, vue.formLogin).then(function(response) {
                if (response.data.status == 'success') {
                    localStorage.user = JSON.stringify(response.data.user);
                    vue.userdata = response.data.user;
                    $('#loginModal').modal('hide')
                    swal('Bem vindo, ' + response.data.user.name + '.', {
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });
                } else {
                    swal('Usuário ou senha invalidos.', {
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });
                }
            }).catch(function() {
                swal('Ocorreu um erro, tente novamente mais tarde.', {
                    icon: "error",
                    buttons: false,
                    timer: 2000,
                });
            });
        },
        store: function() {
            let vue = this;
            let error_input = false;
            if (
                !this.formRegister.email || this.formRegister.email == '' ||
                !this.formRegister.password || this.formRegister.password == '' ||
                !this.formRegister.password || this.formRegister.password_confirm == '' ||
                !this.formRegister.name || this.formRegister.name == ''
            ) {
                error_input = true;
            } else {
                if (this.formRegister.aluno == 1) {
                    if (
                        !this.formRegister.ra || this.formRegister.ra == '' ||
                        !this.formRegister.turma || this.formRegister.turma == '' ||
                        !this.formRegister.curso || this.formRegister.curso == ''
                    ) {
                        error_input = true;
                    }
                }
            }
            if (error_input == true) {
                swal('Atenção, é necessário preencher todos os campos.', {
                    icon: "error",
                    buttons: true,
                });
            } else {
                if (this.formRegister.password == this.formRegister.password_confirm) {
                    sendRegister();
                } else {
                    swal('Atenção, as senhas digitadas não conferem.', {
                        icon: "error",
                        buttons: true,
                    });
                }
            }

            function sendRegister() {
                swal({
                    icon: 'info',
                    title: 'Aguarde',
                    text: "Realizando cadastro...",
                    buttons: false
                });
                const url = '/api/auth/register';

                axios.post(url, vue.formRegister).then(function(response) {
                    if (response.data.status == 'success') {
                        let msg = 'Bem vindo, ' + vue.formRegister.name + '. Cadastro realizado com sucesso, já pode fazer login...';
                        swal(msg, {
                            icon: "success",
                            buttons: false,
                            timer: 3000,
                        });
                        vue.formLogin.email = vue.formRegister.email;
                        vue.formRegister = {};
                        vue.register = false;
                    } else {
                        swal('Desculpe, ocorreu um erro, tente novamente mais tarde.', {
                            icon: "error",
                            buttons: false,
                            timer: 2000,
                        });
                    }
                }).catch(function() {
                    swal('Ocorreu um erro, tente novamente mais tarde.', {
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                    });
                });
            }
        },

        loadUserData: function() {
            if (localStorage.user) {
                this.userdata = JSON.parse(localStorage.user);
                return true;
            }
            return false;
        },

        loadLoginInfo: function() {
            if (this.loadUserData()) {
                let url = '/api/users/verificaToken';
                let vue = this;
                axios.post(url, vue.userdata).then((response) => {
                    if (response.data == 'nao') {
                        vue.logout()
                    }
                });
            }
            if (!this.loadUserData()) {
                this.logout()
            }
        },

        logout: function() {
            localStorage.removeItem('user')
            this.userdata = null;
            let url = '/api/users/logout';
            axios.post(url);
        },

        alterRegisterForm: function() {
            this.register = !this.register
        },

        alterCronogram: function() {

            let vue = this;
            if (vue.cronograma == 'TADS') {
                vue.cronograma = 'IIN'
            } else {
                vue.cronograma = 'TADS'
            }

        },
        updateAvatar: function(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            vue.this;
            this.createImageUp(files[0], vue);
        },
        createImageUp: function(file) {
            var reader = new FileReader();
            var vue = this;

            reader.onload = (e) => {
                let url = '/api/users/uploadAvatar';
                let data = {
                    'avatar': e.target.result,
                    'id': vue.userdata.id
                };
                let vue = this;
                axios.post(url, data).then(function(response) {
                    vue.userdata.avatar = response.data.avatar;
                    localStorage.userdata = JSON.stringify(vue.userdata);
                });
            };
            reader.readAsDataURL(file);
        },
        createAvatar: function(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;

            this.createImageCreate(files[0]);
        },
        createImageCreate: function(file) {
            var reader = new FileReader();
            var vue = this;

            reader.onload = (e) => {
                let url = '/api/users/uploadAvatar';

                let data = {
                    'avatar': e.target.result,
                };
                data.push({'id':this.userdata.id})
                let vue = this;
                axios.post(url, data).then(function(response) {
                    vue.formRegister.avatar = response.data.avatar;
                });
            };
            reader.readAsDataURL(file);
        }
    },
    components: {
        VueGallerySlideshow
    },
});
