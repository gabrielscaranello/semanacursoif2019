<template>
<div class="row">
  <div class="col-lg-12 mb-3">
    <b-card header="Ideias" header-tag="h4" class="bg-warning-card">
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
  name: "advanced_tables",
  components: {
    datatable
  },
  data() {
    return {
      tableData: [],
      options: {
        sortIcon: {
          base: 'fa',
          up: 'fa fa-angle-up',
          down: 'fa fa-angle-down'
        },
        // see the options API
        skin: "table-hover table-striped table-bordered",
        perPage: 7,
        // footerHeadings: true,
        highlightMatches: true,
        pagination: {
          chunk: 3,
          //set dropdown to true to get dropdown instead of pagenation
          dropdown: false
        }
      },
      columnsnew: ['user_name', 'id', 'user_id'],
      datanew: '',
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
          user_name: 'Nome',
          id: 'Responsável',
          user_id: 'Mentor'
        },
        filterable: ['user_name', 'id', 'id_user']
      }
    }
  },
  mounted() {
    // const vue = this;
    let data = {
      id_user: 2
    };
    //
    let url = '/idea/list';
    let vue = this;
    axios.post(url, data).then(function(response) {
      vue.datanew = response.data.data;
    });
    
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

th:nth-child(3) {
  text-align: center;
}

.VueTables__child-row-toggler {
  width: 16px;
  height: 16px;
  line-height: 16px;
  display: block;
  margin: auto;
  text-align: center;
}

</style>
