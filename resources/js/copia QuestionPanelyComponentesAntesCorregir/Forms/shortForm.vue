<template>
    <div :id="id">
        <input type="hidden" name="question_type" value="multiple">
        <div class="mb-3 row">
            <label for="question_statement" class="mb-3 block text-base font-medium text-[#07074D]">Enunciado</label>
            <div class="sm-5">
                <input v-model="question_statement"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    placeholder="Enunciado">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="option_text" class="mb-3 block text-base font-medium text-[#07074D]">Texto PRegunta</label>
            <div class="sm-5">
                <textarea v-model="option_text"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    placeholder="Texto Respuesta"></textarea>
            </div>
        </div>

    </div>
</template>

<script setup>
import { ref } from 'vue';

const name = ref('');
const email = ref('');

function enviarFormulario() {
    // Aquí puedes enviar los datos al backend (por ejemplo, mediante Axios)
    console.log('Datos enviados:', { nombre: nombre.value, email: email.value });
}

</script>
