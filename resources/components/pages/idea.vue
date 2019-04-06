<template>
<div class="row">
  <div class="col-lg-12 mb-3">
    <b-card header="Ideias" header-tag="h4" class="bg-success-card">
      <v-client-table :columns="columnsnew" :data="datanew" :options="optionsnew"></v-client-table>
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
  name: "idea",
  components: {
    datatable
  },
  data() {
    return {
      columnsnew: ['title', 'user_name', 'mentor_name'],
      datanew: [],
      optionsnew: {
        sortIcon: {
          base: 'fa',
          up: 'fa fa-angle-up',
          down: 'fa fa-angle-down'
        },
        pagination: {
          chunk: 3,
          //set dropdown to true to get dropdown instead of pagenation
          dropdown: false
        },
        headings: {
          title: 'Título da ideia',
          user_name: 'Idealizador',
          user_id: 'Mentor'
        },
        filterable: ['title', 'user_name', 'mentor_name']
      }
    }
  },
  mounted() {
    let url = '/idea/all';
    let vue = this;
    axios.post(url).then(function(response) {
      vue.datanew = response.data.data;
    });

    var list = document.getElementsByClassName("VueTables__search-field");
    list[0].childNodes[0].innerHTML = 'Filtro';
    list[0].childNodes[1].placeholder = 'Fazer busca...';
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

.VueTables__search-field label {
  justify-content: flex-start;
}
</style>
