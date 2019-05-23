<template>
<v-container fill-height fluid grid-list-xl>
    <v-layout justify-center wrap>
        <v-flex xs12 md12>
            <material-card color="green" title="Minicursos">
                <v-flex sm12 v-if="!loading" class="align-right py-0">
                    <v-btn v-if="minicursos.length > 0" color="success" @click.prevent.stop="print(1)">Imprimir Este Minicurso </v-btn>
                    <v-btn color="success" @click.prevent.stop="print(2)">Imprimir Todos Minicursos </v-btn>
                </v-flex>
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
                        <td>
                            {{ props.item.curso ? props.item.curso : 'Nenhum'}}
                            {{ props.item.ano ?  props.item.ano : '' }}
                        </td>
                        <td>
                            <v-progress-circular color="green" :value="props.item.presenca ? 100:0" size="24" class="ml-2"></v-progress-circular>
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

            </material-card>
        </v-flex>
    </v-layout>
</v-container>
</template>

<script>
import axios from 'axios'
import print from 'print-js'

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
            minicursos: [],
            user: {}
        }
    },
    methods: {
        async getMinicursos() {
            if (this.selected && this.selected !== []) {
                this.loading = true

                const url = '/api/mini-curso/matricula'
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
            const url = '/api/mini-curso/list'
            this.minicusoslist = (await axios.get(url)).data.data
            this.loading = false
        },
        presenca(id) {
            const vue = this
            let index = 0
            for (var i = 0; i < this.minicursos.length; i++) {
                if (id === this.minicursos[i].id) {
                    index = i
                    vue.minicursos[index].loading = !vue.minicursos[index].loading
                }
            }

            const data = {
                id: vue.minicursos[index].id,
                presenca: vue.minicursos[index].presenca ? 1 : 0
            }
            const url = '/api/mini-curso/presenca'
            axios.post(url, data).then((res) => {

                if (res.data === 1) {
                    vue.minicursos[index].presenca = true
                } else {
                    vue.minicursos[index].presenca = false
                }
                vue.minicursos[index].loading = false
            }).catch((err) => {
                vue.minicursos[index].presenca = !vue.minicursos[index].presenca
                vue.minicursos[index].loading = !vue.minicursos[index].loading

            })
        },
        loginfo() {
            if (!localStorage.token) {
                this.$router.push('/login')
                return true
            }
            if (localStorage.token) {
                this.getMinicursosList()
                this.user = JSON.parse(localStorage.user)
                return false
            }
        },
        print(cond) {
            const vue = this
            if (cond === 1) {
                const json = this.minicursos
                var data = []
                for (var i = 0; i < json.length; i++) {
                    let item = {}
                    item.nome = json[i].name.toUpperCase()
                    if (json[i].curso) {
                        if (json[i].ano) {
                            item.curso = json[i].curso.toUpperCase() + json[i].ano
                        } else {
                            item.curso = json[i].curso.toUpperCase()
                        }
                    } else {
                        item.curso = ''
                    }
                    item.presenca = json[i].presenca ? 'C' : 'F'
                    item.ra = json[i].ra ? json[i].ra : '';
                    item.dia = json[i].day ? json[i].day : '';
                    item.hora = json[i].hour ? json[i].hour : '';
                    data.push(item)
                }
                data.sort(function(a, b) {
                    if (a.curso > b.curso) {
                        return 1;
                    }
                    if (a.curso < b.curso) {
                        return -1;
                    }
                    // a must be equal to b
                    return 0;
                });

                printJS({
                    printable: data,
                    properties: ['curso', 'nome', 'ra', 'dia', 'hora', 'presenca'],
                    type: 'json',
                    gridHeaderStyle: 'color: #4ca750;  border: 2px solid #000; width:10%',
                    gridStyle: 'border: 2px solid #000; padding: 3px 2px;',
                    header: vue.selected.name + ' - ' + vue.selected.turma,
                    headerStyle: 'font-size: 11pt; font-weigth: 400; text-transform: uppercase;',
                    documentTitle: 'Semana de Cursos IFPR 2019',
                    style: 'tr td {text-align: center} tr td:nth-child(2) {width: 60% !important;  text-align: left}  tr td:first-child {width: 10% !important;}'
                })
            }
            if (cond === 2) {
                const url = '/api/mini-curso/matricula'
                axios.post(url).then((res) => {
                    const json = res.data.data
                    var data = []
                    for (var i = 0; i < json.length; i++) {
                        let item = {}
                        item.nome = json[i].name.toUpperCase()

                        if (json[i].curso) {
                            if (json[i].ano) {
                                item.curso = json[i].curso.toUpperCase() + json[i].ano
                            } else {
                                item.curso = json[i].curso.toUpperCase()
                            }
                        } else {
                            item.curso = ''
                        }
                        item.assinatura = ''
                        item.alimento = ''
                        data.push(item)
                    }

                    printJS({
                        printable: data,
                        properties: ['nome', 'curso', 'alimento', 'assinatura'],
                        type: 'json',
                        gridHeaderStyle: 'color: #4ca750;  border: 2px solid #000; width:10%',
                        gridStyle: 'border: 2px solid #000; padding: 3px 2px;',
                        header: 'Alunos Cadastrados no Sistema',
                        headerStyle: 'font-size: 11pt; font-weigth: 400; text-transform: uppercase;',
                        documentTitle: 'Semana de Cursos IFPR 2019',
                        style: 'tr td:nth-child(2) {width: 8% !important; text-align: center} tr td:nth-child(3) {width: 10% !important;}  tr td:first-child {width: 40% !important;}'
                    })
                })
            }
        }
    },
    mounted() {
        this.loginfo()
    }
}
</script>

<style media="screen">
.align-right {
    text-align: right;
}

.py-0 {
    padding-top: 0;
    padding-left: 0;
}
</style>
