<script setup>

import { ref, onMounted } from 'vue';

import axios from 'axios';

const categories = ref([]);
let user_id = ref('')

const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

let title = ref('')
let body = ref('')
let category = ref('')
let img_url = ref('')

// VARIABLE PARA RECOGER LOS ERRORES VALIDACION BACKEND
let formErrors = ref()


onMounted(() => {

    axios.get(`/categories`)
        .then(function (response) {
            categories.value = response.data;
            // console.log(categories.value)
        })

        .catch((error) => {
            console.log(error.response.data)
        });

    //Añado el metodo para obtener el userId

    axios.get(`/user_id`)
        .then(function (response) {
            user_id.value = response.data;
            console.log(user_id.value)
        })
        .catch((er) => {
            console.log(er)
        });

});



const showModal = ref(true);

const openModal = () => {
    showModal.value = false;
}

const closeModal = () => {
    showModal.value = true;
}

const handleSubmit = () => {

    try {




        // axios.post('/post/', {
        //     title: title.value,
        //     slug: 'slug',
        //     body: body.value,
        //     img_url: img_url.value,
        //     active: true,
        //     category_id: category.value,
        //     user_id: user_id.value,

        // }, {
        //     headers: { 'Content-Type': 'application/json' }
        // })

        const formData = new FormData();
        formData.append('title', title.value);
        formData.append('body', body.value);
        formData.append('img_url', img_url.value);
        formData.append('active', true);
        formData.append('category_id', category.value);
        formData.append('user_id', user_id.value);

        console.log('valor', img_url.value);

        axios.post('/post/', formData, {
            headers: {
                'Content-Type': 'multipart/form-data', // Establecer el tipo de contenido como multipart/form-data
            }
        })


            .then(function (response) {
                console.log(response)
                window.location.href = '/post/'
            })

            .catch(function (error) {
                // console.log('jajaj', error)

                // esto lo añado para recoger lo errores validados en backend
                if (error.response.status === 422) {
                    // Si el error es de tipo 422 (Unprocessable Entity), muestra los errores de validación en el componente Vue
                    const errors = error.response.data.errors;
                    console.log(errors); // Verifica los errores en la consola
                    // Ahora puedes asignar los errores a una propiedad de datos en tu componente Vue y mostrarlos en tu plantilla
                    formErrors.value = errors; // Suponiendo que tienes una propiedad formErrors en tu componente Vue
                } else {
                    // Para otros tipos de errores, simplemente muestra el mensaje de error general
                    console.error('Error:', error);
                }
            })



    } catch (error) {
        console.log('Error: ', error);
        console.error('Error al enviar datos:', error.response);
    }

    // const sendPost = async () => {
    //     let post = {
    //         title: title.value,
    //         slug: 'slug',
    //         body: body.value,
    //         category_id: category.value,
    //         photo: 'pp',
    //     };

    //     try {
    //         let response = await axios.post(`/post`, post);
    //         console.log(response.data);
    //     } catch (error) {
    //         console.log(error.response);
    //     }

    // }


    // sendPost();





}


const setUrlImgValue = (event) => {
    console.log(event);
    img_url.value = event.target.files[0];
}


</script>

<template>
    <button type="button" @click="openModal"
        class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">Añadir
        Post</button>

    <!-- Main modal -->

    <div v-bind:class="{ hidden: showModal }" id="static-modal" tabindex="-1" aria-hidden="true"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative justify-center w-full max-w-2xl max-h-full p-4 mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Crea un nuevo Post
                    </h3>
                    <button type="button" @click="closeModal"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 space-y-4 md:p-5">
                    <!-- <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5"> -->


                    <!-- MUESTRO ERRORES RECIBIDOS EN LA VALIDACION DEL BACKEND -->
                    <div v-if="formErrors">
                        <ul>
                            <li class="text-sm text-red-600" v-for="(error, field) in formErrors" :key="field">{{
                                error[0] }}</li>
                        </ul>
                    </div>

                    <!--FIN CAMPO ERRORES-->

                    <form @submit.prevent="handleSubmit" class="p-4 md:p-5 " enctype="multipart/form-data">
                        <input type="hidden" name="_token" :value="csrfToken">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="col-span-2">
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                                <input type="text" name="title" id="title" v-model="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Titulo del post" required minlength="3">
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                                <select id="category" name="category" v-model="category" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" disabled selected>Selecciona una categoria</option>

                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.name }}
                                    </option>

                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="body"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido del
                                    Post</label>
                                <textarea id="body" name="body" rows="4" v-model="body" required minlength="15"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Escribe tu contenido aqui"></textarea>
                            </div>


                            <div class="col-span-2">


                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="img_url">Subir Imagen</label>
                                <input @change="setUrlImgValue" ref="img_url"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="img_url_help" id="img_url" name="img_url" type="file"
                                    accept="image/*">
                            </div>


                        </div>


                        <div
                            class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">

                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Añadir Post
                            </button>


                            <button data-modal-hide="static-modal" type="button" @click="closeModal"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                        </div>



                    </form>
                </div>

                <!-- Modal footer
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <button @click="handleSubmit" data-modal-hide="static-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear
                        Post</button>
                    <button data-modal-hide="static-modal" type="button" @click="closeModal"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                </div> -->

            </div>
        </div>
    </div>
</template>
