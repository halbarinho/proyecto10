<template>
    <div :id="id" class="bg-[#ecf2f7] flex items-center justify-center font-nunito text-slate-600 my-1">

        <section class="max-w-[968px] w-full mx-4">
            <h1 class="mx-2 my-6 text-2xl font-semibold text-center sm:text-3xl">Pregunta Verdadero/Falso N.{{ id +
                1 }}
            </h1>

            <div class="flex">
                <div class="w-3/4">
                    <ul
                        class="flex flex-col items-start justify-center w-full gap-3 p-8 mb-10 bg-white rounded-lg sm:flex-wrap">

                        <li
                            class="bg-[#f4faff] py-4 px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">

                            <label :for="inputId" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado
                                True/False</label>

                            <input :id="inputId" type="text" @input="updateBoolStatement" v-model="boolStatement"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                placeholder="Enunciado True/False" required minlength="3" maxlength="30">

                        </li>



                        <li
                            class="bg-[#f4faff] py-4 px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">
                            <div class="flex items-center justify-start w-full gap-4 ">
                                <input :id="checkboxId" name="bool_checkbox" type="checkbox" @change="updateCheckbox"
                                    v-model="checkboxValue" />
                                <label :for="checkboxId">Marca la casilla para establecer como verdadera</label>
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="flex items-center justify-center w-1/4">
                    <svg @click="removeComponent" version="1.1" width="36" height="36" viewBox="0 0 36 36"
                        preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>trash-line</title>
                        <path class="clr-i-outline clr-i-outline-path-1"
                            d="M27.14,34H8.86A2.93,2.93,0,0,1,6,31V11.23H8V31a.93.93,0,0,0,.86,1H27.14A.93.93,0,0,0,28,31V11.23h2V31A2.93,2.93,0,0,1,27.14,34Z">
                        </path>
                        <path class="clr-i-outline clr-i-outline-path-2"
                            d="M30.78,9H5A1,1,0,0,1,5,7H30.78a1,1,0,0,1,0,2Z"></path>
                        <rect class="clr-i-outline clr-i-outline-path-3" x="21" y="13" width="2" height="15"></rect>
                        <rect class="clr-i-outline clr-i-outline-path-4" x="13" y="13" width="2" height="15"></rect>
                        <path class="clr-i-outline clr-i-outline-path-5"
                            d="M23,5.86H21.1V4H14.9V5.86H13V4a2,2,0,0,1,1.9-2h6.2A2,2,0,0,1,23,4Z"></path>
                        <rect x="0" y="0" width="36" height="36" fill-opacity="0" />
                    </svg>
                </div>
            </div>

        </section>
    </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from 'vue';

const props = defineProps({
    id: Number,
});

const emit = defineEmits(['update:modelValue', 'remove']);

const boolStatement = ref('')
const checkboxValue = ref('')

let inputId = `bool_statement_${props.id}`;
let checkboxId = `bool_checkbox_${props.id}`;


//CON AMBOS EMMITS MANDO LOS 2 VALORES
const updateBoolStatement = event => {
    emit('update:modelValue', props.id, { boolStatement: boolStatement.value, checkboxValue: checkboxValue.value });
}

const updateCheckbox = event => {
    emit('update:modelValue', props.id, { boolStatement: boolStatement.value, checkboxValue: event.target.checked });
}

// const updateValue = () => {
//     emit('update:modelValue', { boolStatement: boolStatement.value, checkboxValue: checkboxValue.value });
// }

// eliminar el componente del array
const removeComponent = () => {
    emit('remove', props.id);
}


</script>

<style scoped></style>
