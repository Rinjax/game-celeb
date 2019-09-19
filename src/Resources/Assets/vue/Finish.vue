<template>
    <div class="container">
        <h1 class="text-center text-danger">Finished!</h1>
        <div>
            <h3 class="text-center">
                thats it folks, no more questions
            </h3>
            <h2 class="text-center">
                Your score was {{score}} points
            </h2>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Finish",
        props: ['score']

    }
</script>

<style scoped>
    img{
        max-height: 50rem;
    }
</style>