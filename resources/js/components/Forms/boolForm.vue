<template>
    <div :id="id">
        <div class="mb-3 w-full">
            <label :for="inputId" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado True/False</label>
            <div class="w-full">
                <input :id="inputId" type="text" @input="updateBoolStatement" v-model="boolStatement">
            </div>
            <!-- <p>{{ boolStatement }}</p> -->
        </div>
        <div class="mb-3 w-full">
            <div class="w-full">
                <input :id="checkboxId" name="bool_checkbox" type="checkbox" @change="updateCheckbox"
                    v-model="checkboxValue" />
                <label :for="checkboxId"></label>
            </div>
        </div>
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
