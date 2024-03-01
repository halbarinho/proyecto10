<template>
    <fieldset :name="multiple">
        <input type="hidden" name="question_type" value="multiple">
        <div class="mb-3 row">
            <label for="question_statement" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado</label>
            <div class="sm-5">
                <input v-model="question_statement"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    placeholder="Enunciado">
            </div>
        </div>


        <div v-for="(item, index) in questionsArray">
            <component :is="item"></component>
            <button @click="addArrayQuestion()">Añade Otra Pregunta</button>

        </div>

    </fieldset>
</template>

<script setup>

import { ref } from 'vue';
import singleQuestionForChoice from './singleQuestionForChoice.vue';

const questionsArray = ref([]);

questionsArray.value.push(singleQuestionForChoice);

// function addArrayQuestion(){
// questionsArray.value.push();
// }

//AQUI PODRIA AÑADIR LOGICA PARA QUE NO FUERAN MAS DE 4 RESPUESTAS
const addArrayQuestion = () => {
    questionsArray.value.push(singleQuestionForChoice);
}

</script>
