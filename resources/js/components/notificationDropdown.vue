<template>
    <div>
        <button @click="toggleMenuNotification">
            <div class="relative">
                <span
                    class="absolute top-0 right-0 flex items-center justify-center w-5 h-5 text-white transform translate-x-3 -translate-y-3 rounded-full bg-redPersonal">{{
                        notifications.length }}</span>

                <svg class="w-10 h-10 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                    <path
                        style="text-indent:0;text-align:start;line-height:normal;text-transform:none;block-progression:tb;-inkscape-font-specification:Bitstream Vera Sans;"
                        d="M 16 5 C 12.145852 5 9 8.1458513 9 12 C 9 14.408843 10.23116 16.55212 12.09375 17.8125 C 8.5266131 19.342333 6 22.881262 6 27 L 8 27 C 8 22.569334 11.569334 19 16 19 C 20.430666 19 24 22.569334 24 27 L 26 27 C 26 22.881262 23.473387 19.342333 19.90625 17.8125 C 21.76884 16.55212 23 14.408843 23 12 C 23 8.1458513 19.854148 5 16 5 z M 16 7 C 18.773268 7 21 9.2267317 21 12 C 21 14.773268 18.773268 17 16 17 C 13.226732 17 11 14.773268 11 12 C 11 9.2267317 13.226732 7 16 7 z"
                        color="#037dbf" overflow="visible" font-family="Bitstream Vera Sans" />
                </svg>
            </div>
        </button>

        <div v-if="menuOpen" class="absolute right-0 z-40 mt-2 bg-white shadow">
            <ul>
                <li v-if="notifications.length > 0" v-for=" notification in notifications" :key="notification.id">
                    <!-- <a :href="getNotificationLink(notification)">{{ notification.type }}: {{ notification.message}}</a> -->
                    <a :href="getNotificationLink(notification)" @click.prevent="markAsRead(notification.id)"><span
                            style="color: 00b3e3;" onmouseover="this.style.color = '037dbf'"
                            onmouseout="this.style.color = '00b3e3'"
                            class=" bg-blueLightPersonal text-blueLightPersonal hover:text-blueDarkPersonal">{{
                            notification.message }}</span></a>
                </li>
                <li v-else>
                    <span>No hay notificaciones pendientes.</span>
                </li>
            </ul>

        </div>
    </div>

</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

// import Echo from '../vueJs/notificationMenu.js';

const menuOpen = ref(false);
let notifications = ref([])
let authUser = ref('')
let link = ref('');

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

//Añado para obtener el userId al cargar
onMounted(() => {

    axios.get('/auth/user')
        .then(res => {
            authUser = res.data.authUser;
            // console.log(authUser.id);
        })
        .then(() => {

            window.Echo.private(`notification.${authUser.id}`)
                .listen('NotificationSend', (e) => {
                    // console.log('Escuchando', e.message);
                    getNotifications();
                });

        })
        .then(() => {

            getNotifications();
        })





});

const getNotifications = () => {
    axios.get(`/notification/getNotifications`)
        .then(function (response) {

            if (response.data instanceof Object) {
                notifications.value = Object.values(response.data);
            } else {

                notifications.value = response.data;
            }
            console.log(notifications.value)
            console.log(notifications.value.length);

        })
        .catch((er) => {
            console.log(er)
        });
}

const toggleMenuNotification = () => {
    menuOpen.value = !menuOpen.value;
}

const getNotificationLink = (notification) => {
    //LOGICA PARA GENERAR LOS ENLACES SEGUN TIPO
    //DEBO CAMBIAR LOCALHOST EN PRODUCCION
    let link;
    switch (notification.type) {
        case 'activity':
            link = `http://localhost:8000/estudiante/${notification.user_id}/activity/${notification.target_id}`;
            // console.log($link);
            return link;
            break;
        case 'alerta':

            // $link = `http://localhost:8000/alert/${notification.target_id}/edit`;
            link = "http://localhost:8000/alerta/" + notification.target_id;
            return link;
            break;
        case 'chat':
            link = `http://localhost:8000/chat/${notification.target_id}`;
            return link;
            break;
        // default:
        //     break;
    }

}

const markAsRead = (notificationId) => {


    console.log(notificationId);

    // Obtener el token CSRF de la etiqueta meta
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    // Agregar el token CSRF al encabezado de la solicitud
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

    axios.post(`/notification/markAsRead/${notificationId}`)
        .then(response => {
            if (response.data.success) {


                // Redirigir al usuario a la dirección vinculada
                const notificationLink = getNotificationLink(response.data.notification);
                console.log(notificationLink);
                window.location.href = notificationLink;
            }
        })
        .catch(error => {
            console.error(error);
        });

}

</script>
