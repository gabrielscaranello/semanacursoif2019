<template>
<div class="cssload-aim"></div>
</template>
<script type="text/javascript">
export default {
    mounted() {
        this.validaUser();
    },
    methods: {
        validaUser() {
            setTimeout(() => {
                if (localStorage.token && localStorage.userId > 0) {
                    let url = '/auth/verificaToken';
                    let data = {
                        'token': localStorage.token,
                        'id': localStorage.userId,
                        'role': localStorage.role
                    };
                    let vue = this;
                    axios.post(url, data).then((response) => {
                        if (response.data == 'nao') {
                            vue.logout();
                        } else {
                            vue.$store.state.user.picture = localStorage.avatar;
                            vue.$store.state.user.name = localStorage.username;
                            vue.$store.state.user.role = localStorage.role;
                        }

                    });
                } else {
                    this.logout();
                }
            }, 1);

        },
        logout() {
            window.localStorage.removeItem('token')
            window.localStorage.removeItem('userId')
            window.localStorage.removeItem('role')
            window.localStorage.removeItem('avatar')
            window.localStorage.removeItem('username')
            delete axios.defaults.headers.common['Authorization']
            this.$router.push({
                name: "login"
            })
        }
    }
}
</script>
<style scoped lang="scss">
.cssload-aim {
    position: fixed;
    z-index: 1500;
    left: calc(100% - 42px);
    top: 60px;
    border-radius: 20px;
    background-color: transparent;
    border-width: 15px;
    border-style: double;
    border-color: transparent #428bca;
    animation: cssload-anim 0.7s linear infinite;
    @media screen and (max-width: 560px) {
        top: 106px;
    }
}

@keyframes cssload-anim {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
