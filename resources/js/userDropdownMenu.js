import { createApp }    from 'vue';
// Configura Axios para incluir el token en todas las solicitudes
import axios from 'axios';

import userDropdownMenu from "@/components/userDropdownMenu.vue";
import dropdownItems from "@/components/dropdownItems.vue";


axios.defaults.headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
};


const app = createApp(userDropdownMenu);
app.component('userDropdownMenu',userDropdownMenu);
app.component('dropdownItems',dropdownItems);

app.mount("#userDropdownMenu");

