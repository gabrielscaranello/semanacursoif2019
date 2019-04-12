new Vue({
    el: '#app',
    data: {
        formLogin: {},
        formRegister: {
            aluno: -1,
            avatar: '/uploads/avatar/no-avatar.png'
        },
        userdata: {},
        miniCursosHasUser: [],
        images: [],
        miniCursos: {},
        index: null,
        leftMenu: 'closed',
        leftMenuForm: 'login',
        register: false,
        cronograma: 'TADS',
        showRegisterMinicursos: false,
    },
    mounted: function() {
        this.loadLoginInfo();
        this.getGalleryImages();
        this.getMiniCursos();
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
        getMiniCursos: function() {
            let vue = this;
            axios.get('/api/mini-curso/show').then(function(res) {
                if (res.data.status == 'success') {
                    vue.miniCursos = res.data.data;
                }

            });
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
            var vue = this;
            axios.post(url, vue.formLogin).then(function(response) {
                if (response.data.status == 'success') {
                    localStorage.user = JSON.stringify(response.data.user);
                    vue.userdata = response.data.user;


                    swal('Bem vindo, ' + response.data.user.name + '.', {
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });
                    vue.getMiniCursosHasUser();

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
                this.getMiniCursosHasUser();
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
            } else {
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
        uploadImage: function(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;

            this.createImage(files[0]);
        },
        createImage(file) {
            var reader = new FileReader();

            reader.onload = (e) => {
                let url = '/api/users/uploadAvatar';
                let data = {
                    'avatar': e.target.result,
                };
                let vue = this;
                axios.post(url, data).then(function(response) {
                    if (vue.userdata) {
                        vue.userdata.avatar = response.data.avatar;
                        // vue.updateUser();
                    }
                    if (!vue.userdata) {
                        vue.formRegister.avatar = response.data.avatar
                    }
                });
            };
            reader.readAsDataURL(file);
        },
        registerMiniCurso: function(id, name) {
            let minicursoLogin = {
                id: id,
                name: name
            };
            localStorage.minicursoLogin = JSON.stringify(minicursoLogin);
            if (this.userdata) {
                this.sendMiniCursoRegister();
            } else {
                $('#question').modal('show');

            }
        },
        loginMiniCurso: function(type) {
            this.leftMenu = 'open';
            if (type == 'register') this.register = true;
            if (type != 'register') this.register = false;
            $('#question').modal('hide');
            var vue = this;

            function id() {
                if (localStorage.user) {
                    vue.sendMiniCursoRegister();
                    vue.leftMenu = 'close';
                } else run();
            }

            function run() {
                setTimeout(id, 500);
            }
            run();
        },
        sendMiniCursoRegister: function() {
            swal({
                icon: 'info',
                title: 'Aguarde',
                text: "Realizando cadastro...",
                buttons: false
            });
            let url = '/api/mini-curso/inscrever'
            let minicursoLogin = JSON.parse(localStorage.minicursoLogin)
            let vue = this;
            data = {
                id_user: vue.userdata.id,
                id_curso: minicursoLogin.id
            };
            axios.post(url, data).then(function(res) {
                if (res.data.status == 'success') {
                    let msg = 'Cadastro realizado com sucesso no mini curso ' + minicursoLogin.name + '.';
                    swal(msg, {
                        icon: "success",
                        buttons: false,
                        timer: 3000,
                    });
                    localStorage.removeItem(minicursoLogin);
                    vue.miniCursosHasUser.push(res.data.data);
                    console.log(vue.miniCursosHasUser);
                } else {
                    swal(res.data.msg, {
                        icon: "error",
                        buttons: false,
                        timer: 3000,
                    });
                }
            }).catch(function() {
                let msg = 'Ocorreu um erro, tente novamente mais tarde.'
                swal(msg, {
                    icon: "error",
                    buttons: false,
                    timer: 3000,
                });
            })
        },
        getMiniCursosHasUser: function() {
            let vue = this
            let url = '/api/mini-curso/miniCursosHasUser';
            data = {
                user_id: vue.userdata.id
            }
            axios.post(url, data).then(function(res) {
                if (res.data.status == 'success') {
                    vue.miniCursosHasUser = res.data.data;
                    console.log(vue.miniCursosHasUser);
                }
                return;
            })
        },
        alterRegisterMinicursos: function() {
            this.showRegisterMinicursos = !this.showRegisterMinicursos;
        }
    },
    components: {
        VueGallerySlideshow
    },
});
