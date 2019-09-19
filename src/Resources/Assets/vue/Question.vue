<template>
    <div class="container">
        <h3>Question: {{ id }}</h3>
        <h1 class="text-center">{{question}}</h1>
        <div>
            <img class="center-block img-responsive" :src="picUrl" alt="whoops!">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Question",
        props: ['question','img_q','id'],
        methods: {
          answerCorrect(){
              this.$emit('answer-correct');
          },
          answerWrong(){
              this.$emit('answer-wrong');
          },
          answerPass(){
              this.$emit('answer-pass');
          }
        },
        mounted() {
            console.log(this.question);
            window.addEventListener("keypress", e => {
                let pressedkey = String.fromCharCode(e.keyCode);
                console.log(pressedkey);
                if(pressedkey == 'y'){
                    this.answerCorrect();
                }else if (pressedkey == 'n'){
                    this.answerWrong();
                }else if (pressedkey == 'p'){
                    this.answerPass();
                }
            });
        },
        computed:{
            picUrl() {
                return '/game-celeb/img/' + this.img_q
            }
        }
    }
</script>

<style scoped>
    img{
        max-height: 50rem;
    }
</style>