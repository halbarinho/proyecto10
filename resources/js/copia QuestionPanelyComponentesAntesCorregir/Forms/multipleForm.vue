<template>
    <div :id="id">
        <div class="mb-3 row">
            <label for="question_statement" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado</label>
            <div class="sm-5">
                <input v-model="question_statement"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    placeholder="Enunciado">
            </div>
        </div>


        <div v-for="(item, index) in questionsList" :key="index">
            <component :is="item" :key="index" :id="`question_${index}`" @update="updateValue(index, $event)"></component>
        </div>
        <button @click="addQuestion">Añade Otra Pregunta</button>
    </div>
</template>

<script setup>

import { ref } from 'vue';
import singleQuestionForChoice from './singleQuestionForChoice.vue';

const questionsList = ref([]);

questionsList.value.push(singleQuestionForChoice);

//AQUI PODRIA AÑADIR LOGICA PARA QUE NO FUERAN MAS DE 4 RESPUESTAS
const addQuestion = () => {
    questionsList.value.push(singleQuestionForChoice);
}

</script>
