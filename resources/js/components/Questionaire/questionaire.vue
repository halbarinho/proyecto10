<template>
    <swiper :navigation="true" :modules="modules" class="mySwiper">
        <!-- <swiper-slide>Slide 1</swiper-slide>
        <swiper-slide>Slide 2</swiper-slide>
        <swiper-slide>Slide 3</swiper-slide>
        <swiper-slide>Slide 4</swiper-slide>
        <swiper-slide>Slide 5</swiper-slide>
        <swiper-slide>Slide 6</swiper-slide>
        <swiper-slide>Slide 7</swiper-slide>
        <swiper-slide>Slide 8</swiper-slide>
        <swiper-slide>Slide 9</swiper-slide> -->

        <!-- <swiper-slide v-for="question in questions" :key="question.id">
            <!-- Aquí puedes mostrar los detalles de cada pregunta -->
        <!-- {{ question.text }}
        </swiper-slide> -->
    </swiper>

    <div>
        <!-- Add a v-for cycle to show the retrieved data -->
        <ul>
            <li v-for="question in questions" :key="question.id">
                {{ question.id }}
            </li>
        </ul>
    </div>

</template>
<script>

import { ref } from 'vue';


// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';

import 'swiper/css/navigation';

// import './style.css';

// import required modules
import { Navigation } from 'swiper/modules';

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    props: {
        questions: {
            type: Array,
            required: true,
        },
        activity: {
            type: Object,
            required: true
        }
    },
    setup(props) {
        return {
            modules: [Navigation],
            activity: this.activity,
            questions: this.questions,
        };
        // const modules = ref([Navigation]);
        // return { modules };

    },
    mounted() {
        console.log(this.questions);
        console.log(this.activity);
    }
};



</script>
<style>
html,
body {
    position: relative;
    height: 100%;
}

body {
    background: #eee;
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
}

.swiper {
    width: 100%;
    height: 100%;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
