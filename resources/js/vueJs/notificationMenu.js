import { createApp } from 'vue';
import notificationDropdown from "@/components/notificationDropdown.vue";

// Configura Axios para incluir el token en todas las solicitudes
import axios from 'axios';

// axios.defaults.headers = {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
// };


//Añado para estar a la escucha en el componente
//ahora realizo la logica en <script> en  vue
import Echo from "laravel-echo"
import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    disableStats: true,
});


const app1 = createApp(notificationDropdown);

app1.component("notificationDrop",notificationDropdown);

app1.mount("#notificationDropdown");
