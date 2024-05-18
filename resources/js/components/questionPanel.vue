<template>

    <ul v-if="errors.length > 0">

        <li class="text-sm text-red-600" v-for="(error, index)  in errors" :key="index">
            {{ error }}</li>
    </ul>

    <div class="flex flex-col items-center justify-between p-4 my-2 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <h1 class="text-3xl uppercase">Registrar Nueva Actividad</h1>
    </div>

    <div class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600 my-1">
        <form @submit.prevent="" class="w-full ">

            <section class="max-w-[968px] w-full mx-4 mx-auto">
                <h1 class="mx-2 my-5 text-2xl font-semibold text-center sm:text-3xl">Datos de la Actividad: {{ id +
                    1 }}
                </h1>


                <ul
                    class="flex flex-col items-start justify-center w-full gap-3 p-8 mb-10 bg-white rounded-lg sm:flex-wrap">

                    <li
                        class="bg-[#f4faff] py-4 px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">


                        <label for="activity_name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre de
                            la
                            Actividad</label>

                        <input type="text"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            name="activity_name" v-model="activityName" placeholder="Nombre Actividad" required
                            minlength="3" maxlength="30">


                    </li>


                    <li
                        class="bg-[#f4faff] py-4 px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">

                        <label for="activity_description" class="mb-3 block text-base font-medium text-[#07074D]">Breve
                            Descripción</label>

                        <textarea name="activity_description" v-model="activityDescription" cols="50" rows="4"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            placeholder="Breve Descripción" required minlength="15"></textarea>


                    </li>
                    <!-- SECCION INCLUIR LOS COMPONENTES DINÁMICOS -->
                    <div v-for="(item, index) in formList" :key="index" class="w-full">
                        <component :is="item.type" :key="index" :id="index" v-model="item.value"
                            @update:modelValue="updateFormData" @remove="removeComponent(index)">
                        </component>
                    </div>






                    <div class="flex justify-between w-full mb-3 flex-nowrap">

                        <div class="w-full px-1 md:w-1/2 xl:w-1/3 ">
                            <button
                                class="flex items-center justify-center px-4 py-2 mx-auto text-sm font-medium text-white bg-green-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                @click="addForm('boolForm')">Verdadero/Falso</button>

                        </div>

                        <div class="w-full px-4 mx-auto md:w-1/2 xl:w-1/3">

                            <button
                                class="flex items-center justify-center px-4 py-2 mx-auto text-sm font-medium text-white bg-green-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                @click="addForm('multipleForm')">Respuesta Múltiple</button>

                        </div>
                        <div class="w-full px-4 md:w-1/2 xl:w-1/3">

                            <button
                                class="flex items-center justify-center px-4 py-2 mx-auto text-sm font-medium text-white bg-green-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                @click="addForm('shortForm')">Respuesta Corta</button>
                        </div>
                    </div>





                    <!-- FIN SECCION FORMS -->










                    <div class="container flex flex-wrap justify-center mx-auto my-2">


                        <div class="flex justify-center w-full my-2 md:justify-end md:w-1/2 md:my-0">
                            <button @click="goBack"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-800 rounded-lg hover:bg-red-900 focus:ring-4 focus:ring-red-300 focus:outline-none">Cancelar</button>
                        </div>


                        <div class="flex justify-center w-full my-2 md:justify-start md:w-1/2 md:my-0">
                            <button type="submit" @click="submitForm"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 focus:outline-none">Enviar</button>
                        </div>



                    </div>
                </ul>
            </section>
        </form>
    </div>

</template>

<script setup>
import { ref, watch, onMounted } from 'vue';
import axios from 'axios';
// Importar los componentes hijos
import multipleForm from './Forms/multipleform.vue';
import shortForm from './Forms/shortForm.vue';
import boolForm from './Forms/boolForm.vue';

// Variables reactivas
const activityName = ref('');
const activityDescription = ref('');
const formList = ref([]);
let id = ref('');
let boolStatement = ref('');

//manejar erroe
const errors = ref([]);

//añado para el userId
let user_id = ref('')

// Función para añadir un componente al formulario
const addForm = (formType) => {

    // Verificar maximo 40 elementos en el array
    if (formList.value.length >= 25) {
        errors.value.push('No se pueden agregar más de 25 elementos.');
        return;
    }

    switch (formType) {
        case 'boolForm':
            formList.value.push({ type: 'boolForm', id: formList.value.length, info: { boolStatement: '', checkboxValue: false } });
            break;
        case 'multipleForm':
            formList.value.push({ type: 'multipleForm', id: formList.value.length, info: { multipleStatement: '', optionText: '' } });
            break;
        case 'shortForm':
            formList.value.push({ type: 'shortForm', id: formList.value.length, info: { shortStatement: '', shortText: '' } });
            break;
    }


};

//Eliminar elemento del array
const removeComponent = (index) => {

    formList.value.splice(index, 1);
}

//Añado para obtener el userId al cargar
onMounted(() => {

    axios.get(`/user_id`)
        .then(function (response) {
            user_id.value = response.data;

        })
        .catch((er) => {
            console.log(er)
        });

});



const handleSubmit = () => {


    //inicio errors
    errors.value = [];

    try {


        axios.post('/activity/', {
            activity_name: activityName.value, activity_description: activityDescription.value,
            user_id: user_id.value,
            questionsData: formList.value.length > 0 ? formList.value.map(item => ({ type: item.type, info: item.info })) : null
        }, {
            headers: { 'Content-Type': 'application/json' }
        })
            .then(function (response) {


                window.location.href = '/activity';
            }).catch(function (e) {


                if (e.response.data.hasOwnProperty('errors')) {
                    const serverErrors = e.response.data.errors;
                    console.log(serverErrors);

                    // SOLO AÑADO AL ARRAY DE ERRORES LOS QUE DESEO PARA QUE NO SE DUPLIQUEN

                    for (let error in serverErrors) {

                        if (serverErrors[error][0] == 'El titulo de la actividad ya existe.' || error === 'questionsData') {
                            errors.value.push(serverErrors[error][0]);
                        }
                    }
                }


            })


    } catch (error) {
        console.log('Datos a enviar:', formData);
        console.log('Error: ', error);
        console.error('Error al enviar datos:', error.response);

    }

};

/**
 *
 * @param {*} index
 * @param {*} newValue
 */

const submitForm = () => {
    handleSubmit();
}



// Función para actualizar los datos del formulario principal
const updateFormData = (index, newValue) => {



    formList.value[index].info = newValue;



}



//Metodo para regresar atras
const goBack = () => {
    window.history.back();
}

</script>

<style scoped></style>
