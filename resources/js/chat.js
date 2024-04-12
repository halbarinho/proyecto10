


// Configura Axios para incluir el token en todas las solicitudes
import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


// //USO DE LARAVEL ECHO
// import Echo from "laravel-echo"

// // window.Pusher = require('pusher-js');
// import Pusher from 'pusher-js';

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: true,
//     disableStats: true,
// });


// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: false,
//     disableStats: true,
// });

// VALIDO SIN FUNCIONAR EL LISTENER PERO SI EL BROADCAST
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';

// window.Pusher = Pusher;


// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });


import Echo from "laravel-echo"
import { Input } from 'postcss';
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


//DOCUMENTACION DE WEBSOCKETS
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     forceTLS: false,
//     disableStats: true,
// });


//DOCUMENTACION WEBSOCKETS CON SSL
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     disableStats: true,
//     forceTLS: true
// });

/**
 * Selectores
 */
const chatForm = document.getElementById("chat-inputarea");
const chatInput = document.getElementById("chat-input");
// const chatBody = get(".chat-body");
const chatBody= document.getElementById('chat-body');

// Icons made by Freepik from www.flaticon.com
const PERSON_IMG = "https://iconos8.es/icon/k6v69zoAsLLY/frida-kahlo";

const chatWith = document.getElementById('chatWith');
const chatWithLastName = document.getElementById('chatWithLastName');
const typing = document.getElementById('typing');
const chatStatus = document.getElementById('chatStatus');
const chatStatusText = document.getElementById('chatStatusText');

//Obtener el chat_id del inputHidden para escuchar el evento
const chat_id = document.getElementById('chat_id').value;

let authUser;


let timerTyping=false;


const rightContainer = "col-start-6 col-end-13 ";
const leftContainer = "col-start-1 col-end-8  ";


const rightSubcontainer ="flex flex-row-reverse items-center justify-start ";
const leftSubcontainer ="flex flex-row items-center";

const rightColor = 'bg-blueDarkPersonal';
const leftColor='bg-gray-200';

// const usersConnected=[];
let usersChat;
let usersAtChat;

window.onload=function(){

    axios.get('/auth/user')
    .then(res=>{
        authUser = res.data.authUser;
        showAuthUser();
        markAsReadNotification(chat_id);
    })
    .then(()=>{
//Recuperar usuarios del chat
//el proceso asincrono no carga a tiempo la variable authUser, por eso
//lo incluyo en otra peticion asincrona enlazada tras la 1era

axios.get(`/chat/${chat_id}/get_users`)
.then(response=>{
    usersAtChat = response.data.users.filter(user=>user.id !=authUser.id);
    console.log(usersAtChat);
    if(usersAtChat.length>0){

        chatWith.innerHTML =usersAtChat[0].name;

        chatWithLastName.innerHTML =usersAtChat[0].last_name_1 +" "+usersAtChat[0].last_name_2 ;

    }
})
    })
    //Ahora peticion para recuperar todos los messages de la conversacion
    .then(()=>{
        axios.get(`/chat/${chat_id}/get_messages`)
        .then(response=>{
            appendOldMessages(response.data.messages);
        })
    })
    //Esto lo añado aqui para evitar errores
    .then(()=>{
        window.Echo.join(`chat.${chat_id}`)
        .listen('MessageSend',(e)=>{

          console.log('Mensajito: ',e);


          if(e.message.user.id!==authUser.id){
          appendMessage(
            e.message.user.name,
                PERSON_IMG,
                leftContainer,
                leftSubcontainer,
                leftColor,
                e.message.content,
                formatDate(new Date(e.message.created_at))
          );

        }

        console.log(usersChat);
          //AQUI DEBO IMPLEMENTAR EL ENVIO DE LA NOTIFICACION
            if(usersChat.length<2){
                console.log(usersChat);
                console.log(usersAtChat[0].id);

            axios.post('/send/notification',{
                'user_id':usersAtChat[0].id,
                'target_id':chat_id,
                })
                .then(response => {
                    console.log(usersAtChat[0].id)
                    console.log('Notificación enviada correctamente');
                })
                .catch(error => {
                    console.error('Error al enviar la notificación:', error);
                });
                }

        // console.log(usersConnected);

        })
        .here((users)=>{
          //console.log('Usuarios en el chat',users);
          //usuarios en la conexion solo con el que se chatea
        //   let usersConnected = users.filter(user=>user.id!=authUser.id);

        usersChat=users;

        let usersConnected = users.filter(user=>user.id!=authUser.id);
        console.log(usersConnected);
          if(usersConnected.length>0){
            chatStatus.className = 'flex flex-col justify-center w-12 h-4 rounded-full bg-greenPersonal';
            chatStatusText.innerHTML='Activo';
        }

        })

        .joining(user=>{
            if(user.id!=authUser.id){
                chatStatus.className='flex flex-col justify-center w-12 h-4 rounded-full bg-greenPersonal';
                chatStatusText.innerHTML='Activo';
            }
        })

        .leaving(user=>{
            if(user.id!=authUser.id){
                chatStatus.className='flex flex-col justify-center w-24 h-4 rounded-full bg-redPersonal';
                chatStatusText.innerHTML='Desconectado';
            }
        })
        //whisper de typing
        .listenForWhisper('typing',e=>{
            // console.log(e);
            //esta escribiendo y ha introducido al menos 1
            if(e>0){
                typing.style.display='';
            }

            //evitar que el mensaje de typing aparezca/desaparezca
            //pone el contador a 0
            if(timerTyping){
                clearTimeout(timerTyping);
            }

            timerTyping = setTimeout(()=>{
                typing.style.display='none';

                //han pasado el tiempo estimado
                timerTyping=false;

            },4000);
        })
        .error((error) => {
          console.error('Error: ',error);
      });
    })
    .catch(error=>{
        console.log(error);
    });




};


function showAuthUser(){
    console.log('authUser: ',authUser);
}

chatForm.addEventListener("submit", event => {

  event.preventDefault();

  const msgText = chatInput.value;

  if (!msgText) return;

  //Axios
  axios.post('/message/send',{
    'message':msgText,
    'chat_id':chat_id,
  }).then(response=>{
    console.log(response);

    let data = response.data;

    appendMessage(
        data.user.name,
        PERSON_IMG,
        rightContainer,
        rightSubcontainer,
        rightColor,
        data.content,
        formatDate(new Date(data.created_at))
    );

  }).catch(error=>{
    console.log('Error: '+error);
  });

  chatInput.value = "";



});




function appendMessage(name, img, sideContainer,sideSubcontainer,sideColor, text,date) {




// console.log(text);
  const mssgHTML = `

<div class="p-3 rounded-lg ${sideContainer}">

<div class="flex items-center ${sideSubcontainer}">
<div
class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
A
</div>
<div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">
<div>${text}</div>
</div>
</div>
</div>





  </div>`;

  chatBody.insertAdjacentHTML("beforeend", mssgHTML);
  scrollToEnd();
}

function appendOldMessages(messages){

    //console.log(messages);

    let side = 'left';
    let sideColor= 'leftColor';
    let sideContainer='';
    let sideSubcontainer='';

    messages.forEach(msg => {

        //console.log(msg)



        sideContainer = (msg.user_id == authUser.id)?rightContainer:leftContainer;

        sideSubcontainer = (msg.user_id == authUser.id)?rightSubcontainer:leftSubcontainer;

        sideColor = (msg.user_id == authUser.id)?rightColor:leftColor;

        appendMessage(msg.user.name,
            PERSON_IMG,
            sideContainer,
            sideSubcontainer,
            sideColor,
            msg.content,
            formatDate(new Date(msg.created_at))
            );

    });

}

// Utils
function get(selector, root = document) {
  return root.querySelector(selector);
}


/**
 * No la he cambiado
 */
function formatDate(date) {
    const d= date.getDate();
    const month = date.getMonth();
    const year = date.getFullYear();
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();

    return `${d}-${month}-${year} ${h.slice(-2)}:${m.slice(-2)}`;
}


/**
 * Deberia implantar logica para que si esta el usuario escribiendo no lo envie
 * abajo para no perder el hilo
 */
function scrollToEnd(){

    // const chatB = document.getElementById('chatBody');
    // chatB.scrollTop=chatB.scrollHeight;
    chatBody.scrollTop=chatBody.scrollHeight;


}

// // function chatWith(){

// // }

// function chatStatus(){

// }
chatInput.addEventListener('input',()=>{

    timerTyping=true;

    window.Echo.join(`chat.${chat_id}`)
    .whisper('typing',chatInput.value.length)
});


//No la uso porque deberia añadir en el html de chat.blade el evento
//loo he creado con el addEventListener
// function userTyping(){
// window.Echo.join(`chat.${chat_id}`)
// .whisper('typing',chatInput.value.length)
// }

function markAsReadNotification(chat_id){

    axios.get(`/notification/${chat_id}/getChatNotifications`)
    .then(response=>{
        // appendOldMessages(response.data.messages);
    })
    .catch(error=>{
        console.error('Error al obtener las notificaciones:', error);
    })

}
