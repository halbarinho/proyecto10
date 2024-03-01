<template>
    <div :id="id">
        <div class="mb-3 row">
            <label :for="inputId" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado True/False</label>
            <div class="sm-5">
                <input :id="inputId" type="text" name="bool_statement" v-model="boolStatement">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="sm-5">
                <input :id="checkboxId" name="bool_checkbox" type="checkbox" v-model="checkboxValue" />
                <label :for="checkboxId">{{ checkboxValue }}</label>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from 'vue';

const props = defineProps({
    id: String,
    valueForBool: String
});

const emit = defineEmits(['update:modelValue']);

const inputId = `bool_statement_${props.id}`;
const checkboxId = `bool_checkbox_${props.id}`;

let boolStatement = ref(props.valueForBool);
let checkboxValue = ref(false);

const updateValue = () => {
    emit('update:modelValue', { boolStatement: boolStatement.value, checkboxValue: checkboxValue.value });
}
</script>

<style></style>
