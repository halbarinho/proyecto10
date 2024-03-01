// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();


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
