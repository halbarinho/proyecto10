<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    listItem: Array,
});

</script>

<template>
    <div v-for="(item, index ) in listItem" :key="index" id="subMenu">

        <div id="subMenuItem">
            <a href="">{{ item.title }}</a>
        </div>

    </div>
</template>
