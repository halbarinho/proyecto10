<template>
    <h2>Registrar Nueva Actividad</h2>
    <!-- <form action="{{ route('activity.store') }}" method="post" id="form"> -->
    <form @submit.prevent="handleSubmit">
        @csrf
        <input type="hidden" name="_token" :value="csrfToken">
        <div id="formInputs">
            <div class="mb-3 row">
                <label for="activity_name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre de la
                    Actividad</label>
                <div class="sm-5">
                    <input type="text" name="activity_name"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        v-model="activity_name" placeholder="Nombre Actividad">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="activity_description" class="mb-3 block text-base font-medium text-[#07074D]">Breve
                    Descripción</label>
                <div class="sm-5">
                    <textarea name="activity_description" v-model="activity_description"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        cols="50" rows="4" placeholder="Breve Descripción" required>
                        </textarea>
                </div>
            </div>
        </div>

        <!--SECCION INCLUIR LOS COMPONENTES DINAMICOS-->

        <div v-for="(item, index) in formList" :key="index">
            <component :is="item.type" :key="index" :id="item.id" v-model="item.value"></component>
        </div>

        <!--FIN SECCION FORMS-->
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
        <p v-bind="bool_statement">
            {{ bool_statement }}
        </p>
        <!-- ====== Cards Section End -->

        <a href="{{ url('welcome') }}" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Regresar</a>

        <input type="submit" name="submit" id="submit"
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
            value="Registrar">
    </form>
</template>

<script setup>

import { ref } from 'vue';

//Importo los componentes hijos
import multipleForm from './Forms/multipleForm.vue';
import shortForm from './Forms/shortForm.vue';
import boolForm from './Forms/boolForm.vue';


//Variables reactivas
//DEFINO CONST PARA GUARDAR EL ARRAY DE COMPONENTES DEL FORM
const formList = ref([]);

const activity_name = ref('');
const activity_description = ref('');



// const csrfToken = "{{csrf_token()}}";

const addForm = (formType) => {

    switch (formType) {
        case 'boolForm':
            formList.value.push({ type: boolForm, id: formList.value.length });
            break;
        case 'multipleForm':
            formList.value.push({ type: multipleForm, id: formList.value.length });
            break;
        case 'shortForm':
            formList.value.push({ type: shortForm, id: formList.value.length });
            break;
    }
};

const updateValue = (index, value) => {
    // bool_statement = value;
    console.log(`Actualizado el index: ${index} con el valor: ${value}`);
}

const handleSubmit = () => {

    const formData = {
        activity_name: activity_name.value,
        activity_description: activity_description.value,
        formData: formList.value.map(item => ({ type: item.type.name, data: item.value }))

    }


    console.log('Datos a enviar:', formData);

}

</script>

<style scoped></style>

