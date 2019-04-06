new Vue({
    el: '#site',
    data: {
        formLogin: {},
        userdata: {}
    },
    mounted: function() {
        this.loadLoginInfo();
    },
    methods: {
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

        closeloginmodal: function() {
            $('#loginModal').modal('hide');
            setTimeout(function() {
                $('#registerModal').modal('show');
            }, 250);
        }
    }
});
