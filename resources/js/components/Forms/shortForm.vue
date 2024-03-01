<template>
    <div :id="id">
        <div class="mb-3 row">
            <label for="shortStatement" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado</label>
            <div class="sm-5">
                <input :id="shortStatementId" v-model="shortStatement"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    @input="updateShortStatement" placeholder="Enunciado">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="option_text" class="mb-3 block text-base font-medium text-[#07074D]">Texto PRegunta</label>
            <div class="sm-5">
                <textarea :id="shortTextId" v-model="shortText"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    @input="updateShortText" placeholder="Texto Respuesta"></textarea>
            </div>
        </div>
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
