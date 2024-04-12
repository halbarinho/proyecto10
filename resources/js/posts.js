import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


/**
 * hasta aqui el original ahora añado yo
 */

import { createApp }    from 'vue';

import postsModalCreate from "@/components/postsModalCreate.vue";


// axios.defaults.headers = {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
// };


const app1 = createApp(postsModalCreate);
app1.component('postsModalCreate',postsModalCreate);

app1.mount("#postsModalCreate");
