<script setup>

import { ref, watch } from 'vue'

// const axios = require('axios')
import axios from 'axios'

let stages = ref([])
let stageLevels = ref([])
let selectedStage = ref(null)
let selectedLevel = ref(null)


/**
 * Obtener las etapas educativas
 */
axios.get(`/stage`)
    .then(function (response) {

        stages.value = response.data;
        console.log(stages.value)
    })
    .catch(function (error) {
        console.log(error)
    })




watch(selectedStage, () => {
    showLevels();
});

const showLevels = () => {

    if (selectedStage.value) {

        /**
         * Obtener los niveles segun la etapa educativa
         */
        axios.get(`/stageLevels/${selectedStage.value}`)
            .then(function (response2) {
                stageLevels.value = response2.data;
                console.log(stageLevels.value)
            })

            .catch((error2) => {
                console.log(error2)
            });

    }
}

</script>


<template>
    <div class="mb-3 row">
        <label for="stage_id" class="mb-3 block text-base font-medium text-[#07074D]">Nivel Educativo</label>
        <div class="sm-5">
            <select name="stage_id" id="stage_id" v-model="selectedStage">
                <option v-for="(stage, index) in stages" :key="index" :value="stage['id']">{{ stage.stage_name }}
                </option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="level_id" class="mb-3 block text-base font-medium text-[#07074D]">Nivel Educativo</label>
        <div class="sm-5">
            <select name="level_id" id="level_id" v-model="selectedLevel">
                <option v-for="(level, index) in stageLevels" :key="index" :value="level['id']">
                    {{ level.level_name }}
                </option>
            </select>
        </div>
    </div>
</template>
