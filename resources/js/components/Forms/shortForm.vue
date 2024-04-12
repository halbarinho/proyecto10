<template>
    <div :id="id" class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600 my-1">

        <section class="max-w-[968px] w-full mx-4">
            <h1 class="mx-2 my-10 text-2xl font-semibold text-center sm:text-3xl">Pregunta Verdadero/Falso N.{{ id +
        1 }}
            </h1>


            <ul
                class="flex flex-col items-start justify-center w-full gap-3 p-8 mb-10 bg-white rounded-lg sm:flex-wrap">

                <li
                    class="bg-[#f4faff] py-4 px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">



                    <label for="shortStatement"
                        class="mb-3 block text-base font-medium text-[#07074D]">Enunciado</label>

                    <input :id="shortStatementId" v-model="shortStatement"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        @input="updateShortStatement" placeholder="Enunciado">


                </li>

                <li
                    class="bg-[#f4faff] py-4 px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">

                    <label for="option_text" class="mb-3 block text-base font-medium text-[#07074D]">Texto
                        PRegunta</label>

                    <textarea :id="shortTextId" v-model="shortText"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        @input="updateShortText" placeholder="Texto Respuesta"></textarea>

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

const shortStatementId = `shortStatement_${props.id}`;
const shortTextId = `shortText_${props.id}`;

const shortStatement = ref('')
const shortText = ref('')

const emit = defineEmits([
    'update:modelValue'
]);

let question_statement = ref(props.shortStatement);

const updateShortStatement = event => {
    emit('update:modelValue', props.id, { shortStatement: event.target.value, shortText: shortText.value });
}

const updateShortText = event => {
    emit('update:modelValue', props.id, { shortStatement: shortStatement.value, shortText: event.target.value })
}


</script>

<style scoped></style>
