<template>
<v-container fill-height fluid grid-list-xl>
    <v-layout justify-center wrap>
        <v-flex xs12 md6>
            <material-card color="green" title="Login" text="">
                <v-form>
                    <v-container py-0>
                        <v-layout wrap>

                            <v-flex xs12>
                                <form>
                                    <v-flex xs12>
                                        <v-text-field color="success" v-model="form.email" label="Email" class="purple-input" />
                                    </v-flex>

                                    <v-flex xs12>
                                        <v-text-field color="success" v-model="form.password" label="Senha" type="password" class="purple-input" />
                                    </v-flex>

                                    <v-flex xs12 text-xs-right>
                                        <v-btn @click.prevent.stop="login" type="submit" class="mx-0 font-weight-light" color="success">
                                            Entrar
                                        </v-btn>
                                    </v-flex>
                                </form>
                            </v-flex>

                        </v-layout>
                    </v-container>
                </v-form>
            </material-card>
        </v-flex>
    </v-layout>
</v-container>
</template>

<script>
import axios from 'axios'
import sweet from 'sweetalert'

export default {
    data: () => ({
        form: {}
    }),
    methods: {
        async login() {
            const url = '/api/auth/login/mederator'
            const data = this.form
            const vue = this

            try {
                axios.post(url, data).then((res) => {
                    if (res.data.status === 'success') {
                        localStorage.setItem('token', res.data.token)
                        localStorage.setItem('user', JSON.stringify(res.data.user))
                        vue.$router.push('/minicursos')
                    }
                })

                // if (loged) this.$router.push('/minicursos')
            } catch (e) {
                sweet({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Usuário ou senha inválidos.'
                })
            }
        }
    }
}
</script>
