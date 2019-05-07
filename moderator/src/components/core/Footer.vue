<template>
  <v-footer
    id="core-footer"
    absolute
    height="82">

    <v-spacer />
    <span class="font-weight-light copyright">
      &copy;
      {{ (new Date()).getFullYear() }}
      <a
        href=""
        target="_blank"></a>
    </span>
  </v-footer>
</template>

<script>
export default {
    data: () => ({})
}
</script>

<style>
#core-footer {
  z-index: 0;
}
</style>
