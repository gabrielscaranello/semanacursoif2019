import Vue from 'vue';
import VcRegister from '../components/register.vue';
import VueMask from 'v-mask';
Vue.use(VueMask);
new Vue({
    el: '#register',

    components: {
        VcRegister
    },

});
