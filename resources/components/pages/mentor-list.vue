<template>
<div class="row">
  <div class="col-lg-12 mb-3">
    <b-card header="Mentores cadastradas" header-tag="h4" class="bg-success-card">
      <v-client-table :columns="columnsnew" :data="datanew" :options="optionsnew">
        <div slot="avatar" slot-scope="props">
          <img :src="props.row.avatar" :alt="props.row.name" :height="48" :width="48" style="border-radius: 50%;">
        </div>
        <div slot="edit" slot-scope="props">
          <a :href="'admin#/mentor-registro/'+props.row.id_user" class=""><i style="font-size: 16pt" class="fa fa-eye"></i></a>
        </div>
      </v-client-table>
    </b-card>
  </div>
</div>
</template>
<script>
import Vue from 'vue';
import {
  ClientTable,
  Event
} from 'vue-tables-2';


import datatable from "components/plugins/DataTable/DataTable.vue";
Vue.use(ClientTable, {}, false);

export default {
  name: "Mentor",
  components: {
    datatable
  },
  data() {
    return {
      columnsnew: ['id_user', 'avatar', 'name', 'email', 'phone', 'edit'],
      datanew: [],
      optionsnew: {
        sortIcon: {
          base: 'fa',
          up: 'fa fa-angle-up',
          down: 'fa fa-angle-down'
        },
        pagination: {
          chunk: 4,
          //set dropdown to true to get dropdown instead of pagenation
          dropdown: false
        },
        headings: {
          id_user: 'Id',
          avatar: 'Foto',
          name: 'Nome',
          email: 'Email',
          phone: 'Telefone',
          edit: 'Ações'
        },
        filterable: ['id_user', 'name', 'email']
      }
    }
  },
  mounted() {
    this.getData();
  },
  methods: {
    getData() {
      let url = '/mentor/list';
      let vue = this;
      axios.get(url).then(function(response) {
        vue.datanew = response.data.data;
      });

      var list = document.getElementsByClassName("VueTables__search-field");
      list[0].childNodes[0].innerHTML = 'Filtro';
      list[0].childNodes[1].placeholder = 'Fazer busca...';
    },

    showDeleteAlert(id) {
      swal({
          title: "Você tem certeza?",
          text: "Após apagado, não poderá ser recuperado!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal({
              icon: 'info',
              title: 'Deletando',
              text: "Aguarde, estamos deletando o registro",
              buttons: false,
            });
            let url = '/mentor/delete';
            axios.post(url, {'id': id}).then((res) => {
              if (res.data.status) {
                swal("Registro deletado com sucesso!", {
                  icon: "success",
                  buttons: false,
                  timer: 1500,
                });
                this.getData();
              }
            });
          } else {
            swal({
              icon: 'info',
              text: "Nada foi alterado!",
              buttons: false,
              timer: 1500
            });

          }
          swal.close()
        });
    },
  }

}
</script>
<style>
.VuePagination {
  text-align: center;
}

.vue-title {
  text-align: center;
  margin-bottom: 10px;
}

.vue-pagination-ad {
  text-align: center;
}

.fa.fa-eye {
  width: 16px;
  display: block;
  margin: 0 auto;
}


.VueTables__child-row-toggler {
  width: 16px;
  height: 16px;
  line-height: 16px;
  display: block;
  margin: auto;
  text-align: center;
}

a {
  cursor: pointer !important;
}

.VueTables__search-field label {
  justify-content: flex-start;
}
</style>
