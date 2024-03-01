import { createApp }    from 'vue';
import questionPanel from "@/components/questionPanel.vue";

import boolForm from "@/components/Forms/boolForm.vue";
import multipleForm from "@/components/Forms/multipleForm.vue";
import shortForm from "@/components/Forms/shortForm.vue";
import singleQuestionForChoice from "@/components/Forms/singleQuestionForChoice.vue";


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

const app = createApp(questionPanel);

app.component("questionPanel",questionPanel);
app.component("boolForm",boolForm);
app.component("multipleForm",multipleForm);
app.component("shortForm",shortForm);
app.component('singleQuestionForChoice',singleQuestionForChoice);


app.mount("#questionPanel");

