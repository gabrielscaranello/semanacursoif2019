<template>
<v-container fill-height fluid grid-list-xl>
  <v-layout justify-center wrap>
    <v-flex xs12 md6>
      <material-card color="green" title="Cadastro" text="">
        <v-form>
          <v-container py-0>
            <v-layout wrap>
              <v-flex xs12 md6>
                <v-text-field label="Primeiro Nome" class="purple-input" />
              </v-flex>

              <v-flex xs12 md6>
                <v-text-field label="Sobrenome" class="purple-input" />
              </v-flex>

              <v-flex xs12 md12>
                <v-text-field label="Endreço" class="purple-input" />
              </v-flex>

              <v-flex xs12 md4>
                <v-text-field label="Cidade" class="purple-input" />
              </v-flex>

              <v-flex xs12 md4>
                <v-text-field label="Estado" class="purple-input" />
              </v-flex>

              <v-flex xs12 md4>
                <v-text-field class="purple-input" label="CEP" type="number" />
              </v-flex>

              <v-flex xs12>
                <v-text-field label="Email" class="purple-input" />
              </v-flex>

              <v-flex xs6>
                <v-text-field label="Senha" type="password" class="purple-input" />
              </v-flex>

              <v-flex xs6>
                <v-text-field label="Confirme a Senha" type="password" class="purple-input" />
              </v-flex>

              <v-flex xs12 text-xs-right>
                <v-btn class="mx-0 font-weight-light" color="success">
                  Salvar
                </v-btn>
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
export default {
  //
}
</script>
