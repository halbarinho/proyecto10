<template>
    <div :id="id">
        <div class="mb-3 row">
            <label :for="inputId" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado True/False</label>
            <div class="sm-5">
                <input :id="inputId" type="text" name="bool_statement" @input="updateValue" v-model="boolStatement">
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

import { ref } from 'vue';
import { defineProps, defineEmits } from 'vue';

// const bool_checkbox = ref(true);


//hacer dinamico
const props = defineProps({
    valueForBool: String,
    key: Number,
})


const emit = defineEmits(['update'])

const id = props.key; // Asigna la clave directamente al ID
const inputId = `bool_statement_${id}`; // Genera un ID único para el input
const checkboxId = `bool_checkbox_${id}`; // Genera un ID único para el checkbox

let boolStatement = props.valueForBool;
let checkboxValue = false;


const updateValue = event => {
    emit('update', event.target.value)
}


</script>
<style></style>
