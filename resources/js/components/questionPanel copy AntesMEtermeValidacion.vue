<template>

    <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <h1 class="text-3xl uppercase">Registrar Nueva Actividad</h1>
    </div>

    <div class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600 my-1">
        <form @submit.prevent="" class="w-full ">

            <section class="max-w-[968px] w-full mx-4 mx-auto">
                <h1 class="mx-2 my-10 text-2xl font-semibold text-center sm:text-3xl">Pregunta Verdadero/Falso N.{{ id +
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
                            name="activity_name" v-model="activityName" placeholder="Nombre Actividad">


                    </li>


                    <li
                        class="bg-[#f4faff] py-4 px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">

                        <label for="activity_description" class="mb-3 block text-base font-medium text-[#07074D]">Breve
                            Descripción</label>

                        <textarea name="activity_description" v-model="activityDescription" cols="50" rows="4"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            placeholder="Breve Descripción"></textarea>


                    </li>
                    <!-- SECCION INCLUIR LOS COMPONENTES DINÁMICOS -->
                    <div v-for="(item, index) in formList" :key="index" class="w-full">
                        <component :is="item.type" :key="index" :id="index" v-model="item.value"
                            @update:modelValue="updateFormData">
                        </component>
                    </div>




                    <!-- ====== Cards Section Start -->

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

                    <!-- ====== Cards Section End -->



                    <!-- FIN SECCION FORMS -->






                    <!-- Botones de acción -->
                    <!-- <a href="{{ url('welcome') }}"
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">Regresar</a> -->
                    <!-- <input type="submit" name="submit" id="submit"
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
            value="Registrar"> -->

                    <!-- pruebo boton en lugar de submit  -->

                    <div class="container mx-auto my-2">
                        <div class="flex flex-wrap justify-center mx-4 ">

                            <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                                <button @click="goBack"
                                    class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-800 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Regresar</button>
                            </div>


                            <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                                <button type="submit" @click="submitForm"
                                    class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Enviar</button>
                            </div>


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

//añado para el userId
let user_id = ref('')

// Función para añadir un componente al formulario
const addForm = (formType) => {
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

    console.log('Lista de formularios:', formList.value);
};

//Añado para obtener el userId al cargar
onMounted(() => {

    axios.get(`/user_id`)
        .then(function (response) {
            user_id.value = response.data;
            console.log(user_id.value)
        })
        .catch((er) => {
            console.log(er)
        });

});



const handleSubmit = () => {


    try {
        //funciona pasando tipo objeto sin el objeto compo
        // axios.post('/activity/', { activity_name: formData.activityName, activity_description: formData.activityDescription }, {

        axios.post('/activity/', {
            activity_name: activityName.value, activity_description: activityDescription.value,
            user_id: user_id.value,
            questionsData: formList.value.length > 0 ? formList.value.map(item => ({ type: item.type, info: item.info })) : null
        }, {
            headers: { 'Content-Type': 'application/json' }
        })
            .then(function (response) {
                //anterior modificar
                // console.log(response);
                // window.location.href = '/activity';
                console.log(response.status);
                window.location.href = '/activity';
            }).catch(function (error) {
                console.log(error);
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
    //esto funciona
    console.log('INdex a actualizar: ', index);
    console.log('NewValue: ', newValue)
    //ESTO FUNCIONANDO para acceder al valor
    // console.log('ver valor info: ', formList.value[index].info.boolStatement);
    //
    formList.value[index].info = newValue;
    console.log("length: ", formList.value.length)
    console.log("FormlistActualizada: ", formList);

    // formList.value[index].info.value = newValue;
}

// Observar cambios en formList y actualizar formData
// watch(formList, (newValue) => {
//     const formData = {
//         activityName: activityName.value,
//         activityDescription: activityDescription.value,
//         formData: newValue.map(item => ([type => item.type.name, data => item.value]))
//     };
//     console.log('Formulario actualizado:', formData);
// });

//Metodo para regresar atras
const goBack = () => {
    window.history.back();
}

</script>

<style scoped></style>
