<template>
<fieldset :name="singleQuestion">
 <div class="mb-3 row">
                    <label for="option_text" class="mb-3 block text-base font-medium text-[#07074D]">Respuesta</label>
                    <div class="sm-5">
                        <textarea v-model="option_text"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            placeholder="Texto Respuesta"></textarea>
                    </div>
                </div>
            </fieldset>
</template>

<script setup>
import {ref} from 'vue';

const questionsArray = ref([]);


</script>
