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
        register: function() {
            swal({
                icon: 'info',
                title: 'Aguarde',
                text: "Realizando cadastro...",
                buttons: false
            });
            const url = '/api/users/register';
            let vue = this;
            axios.post(url, vue.formLogin).then(function(response) {
                if (response.data.status == 'success') {
                    // localStorage.user = JSON.stringify(response.data.user);
                    // vue.userdata = response.data.user;
                    $('#registerModal').modal('hide')
                    let msg = 'Bem vindo, ' + response.data.user.name + '. Cadastro realizado com sucesso, iremos fazer seu login...';
                    swal(msg, {
                        icon: "success",
                        buttons: false,
                        timer: 2000,
                    });
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
    },
    components: {
        VueGallerySlideshow
    },
});
