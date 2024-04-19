<template>
    <div :id="id" class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600 my-1">

        <section class="max-w-[968px] w-full mx-4">
            <h1 class="mx-2 my-6 text-2xl font-semibold text-center sm:text-3xl">Pregunta Verdadero/Falso N.{{ id +
                1 }}
            </h1>


            <ul
                class="flex flex-col items-start justify-center w-full gap-3 p-8 mb-10 bg-white rounded-lg sm:flex-wrap">

                <li
                    class="bg-[#f4faff] py-4 px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">

                    <label :for="inputId" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado
                        True/False</label>

                    <input :id="inputId" type="text" @input="updateBoolStatement" v-model="boolStatement"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        placeholder="Enunciado True/False">

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
        </section>
    </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from 'vue';

const props = defineProps({
    id: Number,
});

const emit = defineEmits(['update:modelValue']);

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



</script>

<style scoped></style>
