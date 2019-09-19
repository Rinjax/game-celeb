<template>
    <div class="container">
        <h1 class="text-center text-info">Pass</h1>
        <div>
            <h1>Countdown: {{countdown}}</h1>
            <img class="center-block img-responsive" :src="picUrl" alt="whoops">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Pass",
        data(){
            return{
                countdown: 10
            }
        },

        computed:{
            picUrl() {
                return '/game-celeb/img/pass/' + (Math.floor(Math.random() * 10) + 1) +'.jpg'
            }
        },
        mounted() {
            setInterval(function () {
                this.countdown--
            }.bind(this), 1000)
        }
    }
</script>

<style scoped>
    img{
        animation: move 0.5s infinite;
        max-height: 50rem;
        transition: all linear 0.5s;
    }

    @keyframes move {
        0%,100%{
            transform: scale(1);

        }
        50%{
            transform: scale(1.5);
        }
    }
</style>