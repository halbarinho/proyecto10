


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
const chatForm = get(".chat-inputarea");
const chatInput = get(".chat-input");
// const chatBody = get(".chat-body");
const chatBody= document.getElementById('chat-body');

// Icons made by Freepik from www.flaticon.com
const PERSON_IMG = "https://iconos8.es/icon/k6v69zoAsLLY/frida-kahlo";

const chatWith = get(".chatWith");
const typing = get('.typing');
const chatStatus = get('.chatStatus');

//Obtener el chat_id del inputHidden para escuchar el evento
const chat_id = document.getElementById('chat_id').value;

let authUser;


let timerTyping=false;

window.onload=function(){

    axios.get('/auth/user')
    .then(res=>{
        authUser = res.data.authUser;
        showAuthUser();
    })
    .then(()=>{
//Recuperar usuarios del chat
//el proceso asincrono no carga a tiempo la variable authUser, por eso
//lo incluyo en otra peticion asincrona enlazada tras la 1era

axios.get(`/chat/${chat_id}/get_users`)
.then(response=>{
    let usersAtChat = response.data.users.filter(user=>user.id !=authUser.id);

    if(usersAtChat.length>0){
        chatWith.innerHTML =usersAtChat[0].name;
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

          //console.log('Mensajito: ',e);
          appendMessage(
            e.message.user.name,
                PERSON_IMG,
                'left',
                e.message.content,
                formatDate(new Date(e.message.created_at))
          );

        })
        .here((users)=>{
          //console.log('Usuarios en el chat',users);
          //usuarios en la conexion solo con el que se chatea
          let usersConnected = users.filter(user=>user.id!=authUser.id);

          if(usersConnected.length>0){
            chatStatus.className = 'chatStatus online';
          }

        })

        .joining(user=>{
            if(user.id!=authUser.id){
                chatStatus.className='chatStatus online';
            }
        })

        .leaving(user=>{
            if(user.id!=authUser.id){
                chatStatus.className='chatStatus online';
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
        'right',
        data.content,
        formatDate(new Date(data.created_at))
    );

  }).catch(error=>{
    console.log('Error: '+error);
  });

  chatInput.value = "";



});




function appendMessage(name, img, side, text,date) {
  //   Simple solution for small apps
  const mssgHTML = `


  <div class="mssg ${side}-mssg">

  <div class="flex items-start gap-2.5">
      <img class="w-8 h-8 rounded-full" src="${img}" alt="Jese image">
      <div class="flex flex-col gap-1 w-full max-w-[320px]">
          <div class="flex items-center space-x-2 rtl:space-x-reverse">
              <span class="text-sm font-semibold text-gray-900 dark:text-white">${name}</span>
              <span class="text-sm font-normal text-gray-500 dark:text-gray-400">${date}</span>
          </div>
          <div
              class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
              <p id="mssg-text" class="text-sm font-normal text-gray-900 dark:text-white">${text}</p>
          </div>
          <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
      </div>
  </div>

</div>`;

  chatBody.insertAdjacentHTML("beforeend", mssgHTML);
  scrollToEnd();
}

function appendOldMessages(messages){

    //console.log(messages);

    let side = 'left';

    messages.forEach(msg => {

        //console.log(msg)

        side = (msg.user_id == authUser.id)?'right':'left';

        appendMessage(msg.user.name,
            PERSON_IMG,
            side,
            msg.content,
            formatDate(new Date(msg.created_at))
            );

    });

}

    //ECHO
//Lo he cambiado de sitio para evitar errores
//aqui funcionaba perfectamente
//     window.Echo.join(`chat.${chat_id}`)
//     .listen('MessageSend',(e)=>{

//       //console.log('Mensajito: ',e);
//       appendMessage(
//         e.message.user.name,
//             PERSON_IMG,
//             'left',
//             e.message.content,
//             formatDate(new Date(e.message.created_at))
//       );

//     })
//     .here((users)=>{
//       //console.log('Usuarios en el chat',users);
//       //usuarios en la conexion solo con el que se chatea
//       let usersConnected = users.filter(user=>user.id!=authUser.id);

//       if(usersConnected.length>0){
//         chatStatus.className = 'chatStatus online';
//       }

//     })

//     .joining(user=>{
//         if(user.id!=authUser.id){
//             chatStatus.className='chatStatus online';
//         }
//     })

//     .leaving(user=>{
//         if(user.id!=authUser.id){
//             chatStatus.className='chatStatus online';
//         }
//     })
//     .error((error) => {
//       console.error('Error: ',error);
//   });


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