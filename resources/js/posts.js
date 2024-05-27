import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';




import { createApp }    from 'vue';

import postsModalCreate from "@/components/postsModalCreate.vue";





const app1 = createApp(postsModalCreate);
app1.component('postsModalCreate',postsModalCreate);

app1.mount("#postsModalCreate");
