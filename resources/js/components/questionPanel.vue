<template>
    <h2>Registrar Nueva Actividad</h2>
    <form @submit.prevent="">
        <div id="formInputs">
            <div class="mb-3 row">
                <label for="activity_name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre de la
                    Actividad</label>
                <div class="sm-5">
                    <input type="text"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        name="activity_name" v-model="activityName" placeholder="Nombre Actividad">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="activity_description" class="mb-3 block text-base font-medium text-[#07074D]">Breve
                    Descripción</label>
                <div class="sm-5">
                    <textarea name="activity_description" v-model="activityDescription" cols="50" rows="4"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        placeholder="Breve Descripción"></textarea>
                </div>
            </div>
        </div>

        <!-- SECCION INCLUIR LOS COMPONENTES DINÁMICOS -->
        <div v-for="(item, index) in formList" :key="index">
            <component :is="item.type" :key="index" :id="index" v-model="item.value" @update:modelValue="updateFormData">
            </component>
        </div>
        <!-- FIN SECCION FORMS -->


        <!-- ====== Cards Section Start -->
        <section class=" bg-gray-2 dark:bg-dark pt-20 pb-10 lg:pt-[120px] lg:pb-20">
            <div class="container mx-auto">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                        <div
                            class="mb-10 overflow-hidden duration-300 bg-white rounded-lg dark:bg-dark-2 shadow-1 hover:shadow-3 dark:shadow-card dark:hover:shadow-3">
                            <button @click="addForm('boolForm')">Form Bool</button>



                            <!-- <svg id="type_bool" @click="addForm('bool')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        width="200" height="200" class="w-full">
                        <circle cx="50" cy="50" r="40" fill="none" stroke="#FF5733" stroke-width="4" />
                        <text x="50" y="55" font-family="Arial, sans-serif" font-size="20" text-anchor="middle"
                            fill="#FF5733">T/F</text>
                    </svg> -->

                            <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">

                                <p class="text-base leading-relaxed text-body-color dark:text-dark-6 mb-7">
                                    True or False
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                        <div
                            class="mb-10 overflow-hidden duration-300 bg-white rounded-lg dark:bg-dark-2 shadow-1 hover:shadow-3 dark:shadow-card dark:hover:shadow-3">
                            <button @click="addForm('multipleForm')">Form Multiple</button>

                            <!-- <svg id="type_multiple" @click="addForm('multiple')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="200"
                        height="200" alt="image">
                        <circle cx="50" cy="50" r="40" fill="none" stroke="#7FFF00" stroke-width="4" />
                        <text x="50" y="55" font-family="Arial, sans-serif" font-size="20" text-anchor="middle"
                            fill="#7FFF00">EM</text>
                    </svg> -->

                            <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">

                                <p class="text-base leading-relaxed text-body-color mb-7">
                                    Eleccion Multiple
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                        <div
                            class="mb-10 overflow-hidden duration-300 bg-white rounded-lg dark:bg-dark-2 shadow-1 hover:shadow-3 dark:shadow-card dark:hover:shadow-3">

                            <button @click="addForm('shortForm')">Form Short</button>

                            <!-- <svg id="type_short" @click="addForm('short')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="200"
                        height="200" alt="image" class="w-full">
                        <circle cx="50" cy="50" r="40" fill="none" stroke="#0074D9" stroke-width="4" />
                        <text x="50" y="55" font-family="Arial, sans-serif" font-size="20" text-anchor="middle"
                            fill="#0074D9">BR</text>
                    </svg> -->

                            <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">

                                <p class="text-base leading-relaxed text-body-color mb-7">
                                    Respuesta Breve
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ====== Cards Section End -->



        <!-- Botones de acción -->
        <!-- <a href="{{ url('welcome') }}"
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">Regresar</a> -->
        <!-- <input type="submit" name="submit" id="submit"
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
            value="Registrar"> -->
        /**
        pruebo boton en lugar de submit */
        <button type="submit" @click="submitForm"
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">Enviar</button>
    </form>
</template>

<script setup>
import { ref, watch } from 'vue';
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


const handleSubmit = () => {


    try {
        //funciona pasando tipo objeto sin el objeto compo
        // axios.post('/activity/', { activity_name: formData.activityName, activity_description: formData.activityDescription }, {

        axios.post('/activity/', {
            activity_name: activityName.value, activity_description: activityDescription.value,
            questionsData: formList.value.length > 0 ? formList.value.map(item => ({ type: item.type, info: item.info })) : null
        }, {
            headers: { 'Content-Type': 'application/json' }
        })
            .then(function (response) {
                console.log(response);
                window.location.href = '/activity/create';
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
</script>

<style scoped></style>
