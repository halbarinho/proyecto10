import { createApp }    from 'vue';

import selectStageLevel from "@/components/selectStageLevel.vue";
// createApp(questionPanel).mount("#questionPanel");
// esto funciona
// import axios from 'axios';

// window.axios = axios;

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
//hasta aqui


// Configura Axios para incluir el token en todas las solicitudes
import axios from 'axios';

axios.defaults.headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
};


const app = createApp(selectStageLevel);
app.component('selectStageLevel',selectStageLevel);

app.mount("#selectStageLevel");

