<template>
    <div class="container">
        <h1 class="text-center">{{answer}}</h1>
        <div>
            <img class="center-block img-responsive" :src="picUrl" alt="whoops">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Answer",
        props: ['answer','img_a'],
        methods: {

        },
        mounted() {

        },
        computed:{
            picUrl() {
                return '/game-celeb/img/' + this.img_a
            }
        }
    }
</script>

<style scoped>
    img{
        max-height: 50rem;
    }
</style>