<template>
<div>
  <div class="row">
    <div class="col-lg-12">
      <b-card class="mb-2 bg-default-card" header="Análise de Perfil" header-tag="h4">
        <div class="container">
          <div class="row mentor-data mt-3">

            <div class="col-md-6">
              <div class="row">
                <div class="col-12">
                  <h2 class="mb-2">Dados Pessoais</h2>
                </div>
                <div class="col-12 mb-2">
                  <img :src="mentorData.avatar" :alt="mentorData.name" :height="300">
                </div>

                <div class="col-12">
                  <h4><span>Nome:</span></h4>
                  <p>{{mentorData.name}}</p>
                </div>

                <div class="col-12">
                  <h4><span>Idade:</span> </h4>
                  <p>{{mentorData.age}} anos</p>
                </div>

                <div class="col-12">
                  <h4><span>Email:</span></h4>
                  <p>{{mentorData.email}}</p>
                </div>

                <div class="col-12">
                  <h4><span>Telefone:</span></h4>
                  <p>{{mentorData.phone}}</p>
                </div>

                <div class="col-12">
                  <h4><span>Endereço:</span></h4>
                  <p> {{mentorData.address}}</p>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="row">
                <div class="col-12">
                  <h2 class="mb-2">Dados Profissionais</h2>
                </div>

                <div class="col-12">
                  <h4><span>Mini Curriculo:</span></h4>
                  <p>{{mentorData.mini_curriculum}}</p>
                </div>

                <div class="col-12">
                  <h4><span>Experiencia:</span></h4>
                  <p>{{mentorData.experience}}</p>
                </div>

                <div class="col-12">
                  <h4><span>Maior desafio profissional:</span></h4>
                  <p>{{mentorData.chanllenge}}</p>
                </div>

                <div class="col-12">
                  <h4><span>Suporte:</span></h4>
                  <p class="py-0 my-0" v-for="support in mentorData.support">
                    {{support.name}}
                  </p>
                </div>

                <div class="col-12">
                  <h4><span>Nível:</span></h4>
                  <p class="py-0 my-0" v-for="level in mentorData.level">
                    {{level.name}}
                  </p>
                </div>

                <div class="col-12">
                  <h4><span>Mentoriado em:</span></h4>
                  <p class="py-0 my-0" v-for="category in mentorData.category">
                    {{category.name}}
                  </p>
                </div>

              </div>
            </div>
            <div class="col-md-12 mt-5">
              <div class="row">
                <div class="col-12 text-center mt-2">
                  <h4><span>Status atual</span></h4>
                  <p :class="{'text-warning': mentorData.approval === 'Aguardando análise',
                  'text-success': mentorData.approval === 'Aprovado',
                  'text-danger': mentorData.approval === 'Recusado',}">
                    {{mentorData.approval}}
                  </p>
                </div>
              </div>
            </div>


            <div class="col-md-8 offset-md-2 mt-2 mb-2">
              <div class="col-12 mt-3">
                <div class="row">
                  <div class="col-md-4">
                    <a @click.prevent.stop="goBack()" class="btn btn-info btn-block text-light">
                      Voltar
                      <span class="fa fa-arrow-left"></span>
                    </a>
                  </div>

                  <div class="col-md-4">
                    <a @click.prevent.stop="sendData('Recusado')" class="btn btn-danger btn-block text-light">
                      Recusar cadastro
                      <span class="fa fa-times"></span>
                    </a>
                  </div>
                  <div class="col-md-4">
                    <button @click="sendData('Aprovado')" class="btn btn-success btn-block">
                      Aprovar cadastro
                      <span class="fa fa-check"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </b-card>
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: "mentor-edit",
  mounted: function() {
    this.getdata();
  },
  data() {
    return {
      mentorData: {},
    };
  },
  methods: {
    getdata() {
      if (this.$route.params.id) {
        let url = `/mentor/getItem`;

        let vue = this;
        axios.post(url, vue.$route.params).then(function(response) {
          vue.mentorData = response.data.data;
        });
      }
    },

    sendData(status) {
      swal({
        icon: 'info',
        title: 'Registrando',
        text: "Aguarde, estamos realizando o registro.",
        buttons: false,
      });

      let url = '/mentor/update';
      let vue = this;
      vue.mentorData.approval = status;
      axios.post(url, vue.mentorData).then(function(response) {

        if (response.data.status == 'success') {
          swal("Registro realizado com sucesso!", {
            icon: "success",
            buttons: false,
            timer: 2500,
          });
          vue.$router.push('/mentores');
        } else {
          swal("Desculpe! Ocorreu um erro ao realizar o registro. Por favor, tente novamente mais tarde.", {
            icon: "error",
            buttons: false,
            timer: 2000,
          });
        }

      });
    },
    goBack() {
      this.$router.push('/mentores');
    }
  },
}
</script>
<style type="text/css" scoped>
#color {
  height: 35px;
}

/deep/ .form-control:disabled {
  cursor: not-allowed;
}

.disabled {
  cursor: not-allowed;
}

a {
  text-decoration: none;
}

a:hover,
button:hover {
  color: #fff !important;
}

button .fa,
a .fa {
  font-weight: bold;
}

.mentor-data span {
  font-weight: bold;
}

.mentor-data {
  text-align: justify;
}

h2,
h4 {
  font-size: 16pt;
  color: #002147;
}

h4 {
  font-size: 12pt;
  margin-top: 1.5rem;
}

p {
  margin-bottom: 0;
  margin-top: 0;
}

.form-control:active,
.input-group .form-control:hover {
  z-index: 1;
}
</style>
