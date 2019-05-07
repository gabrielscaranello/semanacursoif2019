<template>
<v-app>
  <!-- <core-filter /> -->

  <core-toolbar v-if="logedin" />

  <core-drawer v-if="logedin" />

  <core-view />
</v-app>
</template>

<script>
export default {
    name: 'app',
    computed: {
        logedin() {
            return true
        },
        background() {
            if (this.$route.path === '/cadastro') return 'background: url("https://images.pexels.com/photos/1193942/pexels-photo-1193942.jpeg")'
            if (this.$route.path === '/login') return 'background: url("https://images.pexels.com/photos/1193942/pexels-photo-1193942.jpeg")'
            return false
        }
    }
}
</script>

<style lang="scss">
@import '@/styles/index.scss';

/* Remove in 1.2 */
.v-datatable thead th.column.sortable i {
    vertical-align: unset;
}
</style>
