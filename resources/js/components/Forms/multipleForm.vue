<template>
    <div :id="id" class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600 my-1">
        <section class="max-w-[968px] w-full mx-4">
            <h1 class="mx-2 my-10 text-2xl font-semibold text-center sm:text-3xl">Respuesta de Opcion Múltiple N.{{ id +
        1 }}
            </h1>



            <ul
                class="flex flex-col items-start justify-center w-full gap-3 p-8 mb-10 bg-white rounded-lg sm:flex-wrap">

                <li
                    class="bg-[#f4faff] py-4 px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">

                    <label :for="inputId"
                        class="flex items-center justify-start w-full gap-0 p-3 font-semibold cursor-pointer">Enunciado</label>

                    <input :id="inputId" v-model="multipleStatement"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        @input="updateMultipleStatement" placeholder="Enunciado de la pregunta múltiple">
                </li>

                <li v-for="(option, index) in  4 " :key="index"
                    class="bg-[#f4faff] py-4 px-4 rounded-md min-w-full self-stretch flex items-start justify-center flex-col mb-4 sm:mb-0">

                    <div class="flex items-center justify-start w-full gap-4 ">

                        <input :id="'option_' + index" :name="'option_' + id" type="radio" :value="index"
                            @change="updateOption(index)" v-model="selectedOption">
                        <label :for="'option_' + index">{{ option }}</label>

                        <input :id="optionTextId + index" v-model="optionText[index]"
                            class="flex-grow rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            @input="updateOptionText" placeholder="Texto Opción "></input>

                    </div>
                </li>

            </ul>



            <!-- <div class="sm-5">
                <textarea :id="optionTextId" v-model="optionText"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    @input="updateOptionText" placeholder="Texto Pregunta Multiple"></textarea>
            </div> -->

        </section>
    </div>

</template>

<script setup>
import { ref, defineProps, defineEmits } from 'vue';
// import {Field, Form,  required,email} from 'vee-validate';

const props = defineProps({
    id: Number,
});

const multipleStatement = ref('');
// const optionText = ref('')
const optionText = ref(['']);
const selectedOption = ref('');

const emit = defineEmits(['update:modelValue']);

let inputId = `multipleStatement_${props.id}`
let optionTextId = `questionText_${props.id}`

// const updateValue = () => {
//     emit('update:modelValue', props.id, { multipleStatement: multipleStatement.value, optionText: optionText.value });
// }

/**opcion 2 metodos */
const updateMultipleStatement = event => {
    emit('update:modelValue', props.id, { multipleStatement: multipleStatement.value, optionText: optionText.value, selectedOption: selectedOption.value });
}

const updateOptionText = event => {
    emit('update:modelValue', props.id, { multipleStatement: multipleStatement.value, optionText: optionText.value, selectedOption: selectedOption.value });
}
const updateOption = event => {
    emit('update:modelValue', props.id, { multipleStatement: multipleStatement.value, optionText: optionText.value, selectedOption: selectedOption.value });
}
</script>

<style scoped></style>
