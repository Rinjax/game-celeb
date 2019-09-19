<template>
    <div class="container">
        <h1 class="text-center">Welcome To Fun Friday</h1>
        <div>

        </div>
        <div>
            <button @click="startGame" class="btn btn-success btn-lg center-block">Start</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Start",
        methods:{
            startGame(){
                this.$emit('start-game')
            }
        }
    }
</script>

<style scoped>

</style>