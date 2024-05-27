import { createApp }    from 'vue';

import selectStageLevel from "@/components/selectStageLevel.vue";



// Configura Axios para incluir el token en todas las solicitudes
import axios from 'axios';

axios.defaults.headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
};


const app = createApp(selectStageLevel);
app.component('selectStageLevel',selectStageLevel);

app.mount("#selectStageLevel");

