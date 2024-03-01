<template>
    <fieldset :name='boolForm'>

        <div class="mb-3 row">
            <label for="bool_statement" class="mb-3 block text-base font-medium text-[#07074D]">Enuciado
                True/False</label>
            <div class="sm-5">
                <input type="text" name="bool_statement" v-model="bool_statement"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    placeholder="">
            </div>

        </div>

        <div class="mb-3 row">
            <!-- <label for="is_true" class="mb-3 block text-base font-medium text-[#07074D]">Texto PRegunta</label> -->
            <div class="sm-5">
                <input name="bool_checkbox" type="checkbox" id="bool_checkbox" v-model="bool_checkbox" />
                <!-- <input name="bool_checkbox" type="checkbox" id="checkbox" v-model="formData[checked]" /> -->

                <label for="bool_checkbox">{{ bool_checkbox }}</label>
            </div>
        </div>

    </fieldset>
</template>
<script setup>

import { ref } from 'vue';

// const bool_checkbox = ref(true);



const bool_statement = defineModel('bool_statement');
const bool_checkbox = defineModel('bool_checkbox');

</script>
<style></style>
