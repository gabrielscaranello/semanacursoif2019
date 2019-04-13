new Vue({
    el: '#app',
    data: {
        formLogin: {},
        formRegister: {
            aluno: -1,
            avatar: '/uploads/avatar/no-avatar.png'
        },
        formChangePass: {},
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
        minicursoTurma: 'TADS',
        termodeuso: false,
        loadingAvatar: false,
        passwordChangeArea: false
    },
    mounted: function() {
        this.loadLoginInfo();
        this.getGalleryImages();
        this.getMiniCursos();
    },
    methods: {
        showTermodeUso: function() {
            this.termodeuso = true;
            this.register = false;
        },
        hideTermoDeUso: function() {
            this.termodeuso = false;
            this.register = true;
        },
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
                text: "Por favor, aguarde...",
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
                    swal(response.data.msg, {
                        icon: "info",
                        button: true,
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
            let msg = 'Nosso termo de uso está em fase de desenvolvimento e estará pronto até dia 15/04. Aguarde e poderá criar seu usuário e se inscrever nos minicursos. Obrigado';
            swal(msg, {
                icon: "info",
                button: true,
            });
            return;
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
                    text: "Por favor, aguarde...",
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

        updateUser: function(type, params) {
            let url = '/api/users/update';
            let vue = this;
            let data = {};
            data.id = vue.userdata.id;

            if (type == 'password') {
                data.password = params.pass;
                data.current_password = params.currentPass;
            }
            if (type == 'avatar') data.avatar = params;


            axios.post(url, data).then(function(res) {
                if (res.data.status == 'success') {
                    let msg = '';
                    if (data.avatar) {
                        msg = 'Foto de perfil alterada com sucesso';
                        vue.loadingAvatar = false;
                        vue.userdata.avatar = data.avatar;
                        localStorage.user = JSON.stringify(vue.userdata);
                    }

                    if (data.password) {
                        msg = 'Senha alterada com sucesso, faça login novamente';
                        vue.alterPasswordChange;
                        setTimeout(function() {
                            vue.logout();
                            vue.alterPasswordChange();
                            vue.formChangePass = {}
                            vue.formLogin = {}
                        }, 2500);
                    }

                    swal(msg, {
                        icon: "success",
                        buttons: false,
                        timer: 3000,
                    });
                } else {
                    swal(res.data.msg, {
                        icon: "error",
                        buttons: false,
                        timer: 3000,
                    });
                }

            }).catch(function() {
                let msg = "Desculpe. Ocorreu um erro, tente novamente mais tarde";
                swal(msg, {
                    icon: "error",
                    buttons: false,
                    timer: 3000,
                });
            });

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
                vue.loadingAvatar = true;
                axios.post(url, data).then(function(response) {
                    if (vue.userdata) {
                        let avatar = response.data.avatar;
                        vue.updateUser('avatar', avatar);
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
                // $('#question').modal('show');
                let msg = 'Nosso termo de uso está em fase de desenvolvimento e estará pronto até dia 15/04. Aguarde e poderá criar seu usuário e se inscrever nos minicursos. Obrigado';
                swal(msg, {
                    icon: "info",
                    button: true,
                });
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
                text: "Por favor, aguarde...",
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
                    vue.getMiniCursos();
                    vue.getMiniCursosHasUser();

                } else {
                    swal(res.data.msg, {
                        icon: "error",
                        button: false,
                        timer: 3000,
                    });
                    vue.getMiniCursos();
                }
            }).catch(function() {
                let msg = 'Ocorreu um erro, tente novamente mais tarde.'
                swal(msg, {
                    icon: "error",
                    buttons: false,
                    timer: 3000,
                });
                vue.getMiniCursos();

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
                }
                return;
            })
        },
        alterRegisterMinicursos: function() {
            this.showRegisterMinicursos = !this.showRegisterMinicursos;
        },
        alterPasswordChange: function() {
            this.passwordChangeArea = !this.passwordChangeArea;
        },
        alterPassword: function() {
            if (this.formChangePass.currentPass != '' && this.formChangePass.currentPass != null && this.formChangePass.pass != '' &&
                this.formChangePass.pass != null && this.formChangePass.confirmPass != '' && this.formChangePass.confirmPass != null) {
                if (this.formChangePass.pass == this.formChangePass.confirmPass) {
                    swal({
                        icon: 'info',
                        text: "Por favor, aguarde...",
                        buttons: false
                    });
                    this.updateUser('password', this.formChangePass);

                } else {
                    let msg = 'Senhas digitadas não são iguais.'
                    swal(msg, {
                        icon: "error",
                        button: true,
                    });
                }
            } else {
                let msg = 'É necessário preencher todos os campos.'
                swal(msg, {
                    icon: "error",
                    button: true,
                });
            }
        },
        alterMiniCurso: function() {
            let vue = this;
            if (vue.minicursoTurma == 'TADS') {
                vue.minicursoTurma = 'IIN'
            } else {
                vue.minicursoTurma = 'TADS'
            }
        }
    },
    components: {
        VueGallerySlideshow
    },
});
