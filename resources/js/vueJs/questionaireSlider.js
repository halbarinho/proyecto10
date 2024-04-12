import {createApp} from 'vue';
import questionaire from '../components/Questionaire/questionaire.vue';

const app =  createApp(questionaire);

app.mount('#questionApp');


app.component("questionaire",questionaire);

app.mount("#questionaire");
// // import function to register Swiper custom elements
// import { register } from 'swiper/element/bundle';
// // register Swiper custom elements
// register();
