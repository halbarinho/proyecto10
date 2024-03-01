<template>
    <div :id="id">
        <div class="mb-3 row">
            <label :for="inputId" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado</label>
            <div class="sm-5">
                <input :id="inputId" v-model="multipleStatement"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    @input="updateMultipleStatement" placeholder="Enunciado Multiple">
            </div>
        </div>
        <div class="mb-3 row">
            <label :for="optionTextId" class="mb-3 block text-base font-medium text-[#07074D]">Texto Pregunta</label>
            <div class="sm-5">
                <textarea :id="optionTextId" v-model="optionText"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    @input="updateOptionText" placeholder="Texto Pregunta Multiple"></textarea>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from 'vue';
// import {Field, Form,  required,email} from 'vee-validate';

const props = defineProps({
    id: Number,
    // questionValue: String,
    // optionValue: String
});

const multipleStatement = ref('');
const optionText = ref('')

const emit = defineEmits(['update:modelValue']);

let inputId = `multipleStatement_${props.id}`
let optionTextId = `questionText_${props.id}`

// const updateValue = () => {
//     emit('update:modelValue', props.id, { multipleStatement: multipleStatement.value, optionText: optionText.value });
// }

/**opcion 2 metodos */
const updateMultipleStatement = event => {
    emit('update:modelValue', props.id, { multipleStatement: multipleStatement.value, optionText: optionText.value });
}

const updateOptionText = event => {
    emit('update:modelValue', props.id, { multipleStatement: multipleStatement.value, optionText: optionText.value });
}
</script>

<style scoped></style>
