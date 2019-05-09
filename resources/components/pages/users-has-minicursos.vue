<template>
<v-container fill-height fluid grid-list-xl>
    <v-layout justify-center wrap>
        <v-flex xs12 md12>
            <v-card color="green" title="Minicursos">
                <v-card-title>
                    <v-flex sm6 v-if="minicusoslist.length > 0" style="margin-top: 10px">
                        <v-combobox v-model="selected" :items="minicusoslist" @change="getMinicursos" item-text="namepainel" item-value="id" label="Minicurso"></v-combobox>
                    </v-flex>
                    <v-flex sm6 v-if="!loading && minicursos.length > 0">
                        <v-text-field v-model="search" append-icon="search" label="Pesquisa" color="green" single-line hide-details></v-text-field>
                    </v-flex>

                </v-card-title>
                <v-data-table v-if="!loading && minicursos.length > 0" rows-per-page-text="Quantidade por página:" :headers="headers" :items="minicursos" :search="search" :rows-per-page-items='[35, {"text":"Todos", "value":-1}]'>
                    <template v-slot:items="props">
                        <td style="text-transform: capitalize">{{ props.item.name.toLowerCase() }}</td>
                        <td>{{ props.item.curso }}</td>

                        <td>
                            <!-- <v-switch color="green" v-model="props.item.presenca"></v-switch> -->
                            <v-switch v-model="props.item.presenca">
                                <template v-slot:label>
                                    <v-progress-circular color="green" indeterminate :value="props.item.presenca" size="24" class="ml-2"></v-progress-circular>
                                </template>
                            </v-switch>
                        </td>
                    </template>
                    <template v-slot:no-results>
                        <v-alert :value="true" color="error" icon="warning">
                            A busca por "{{ search }}" não encontrou nenhum resultado.
                        </v-alert>
                    </template>
                    <template v-slot:no-data>
                        Sem dados para mostrar
                    </template>

                    <template v-slot:pageText="props">
                        {{ props.pageStart }} - {{ props.pageStop }} de {{ props.itemsLength }}
                    </template>
                </v-data-table>
                <v-flex sm12 v-if="loading && selected" class="text-sm-center">
                    <v-progress-circular :size="30" color="green" indeterminate></v-progress-circular>
                    <br>
                    Carregando...
                </v-flex>

            </v-card>
        </v-flex>
    </v-layout>
</v-container>
</template>

<script>
import axios from 'axios'
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)

export default {
    data() {
        return {
            search: '',
            loading: true,
            selected: [],
            minicusoslist: [],
            headers: [{
                text: 'Nome',
                align: 'left',
                sortable: true,
                value: 'name'
            }, {
                text: 'Curso',
                align: 'left',
                sortable: true,
                value: 'curso'
            }, {
                text: 'Presença',
                align: 'left',
                sortable: false,
                value: 'presenca'
            }],
            minicursos: []
        }
    },
    methods: {
        async getMinicursos() {
            if (this.selected && this.selected !== []) {
                this.loading = true

                const url = '/mini-curso/matricula'
                const data = {
                    id: this.selected.id
                }

                this.minicursos = (await axios.post(url, data)).data.data
                this.loading = false
            } else {
                this.minicursos = []
            }
        },
        async getMinicursosList() {
            const url = '/mini-curso/list'
            this.minicusoslist = (await axios.get(url)).data.data
            this.loading = false
        }
    },
    mounted() {
        // this.getMinicursos()
        this.getMinicursosList()
    }
}
</script>
