<template>
    <div>
        <div v-show="showPoints" class="total-points"><h2>PTS: {{ totalPointsLeadZero }}</h2></div>

        <div>
            <component
                    :is="gameX"
                    v-bind="gameXProps"
                    @start-game="startGame"
                    @answer-correct="answerCorrect"
                    @answer-wrong="answerWrong"
                    @answer-pass="answerPass"
            ></component>
        </div>
    </div>
</template>

<script>

    import Start from './Start';
    import Question from './Question';
    import Answer from './Answer';
    import Wrong from './Wrong';
    import Pass from './Pass';
    import Finish from './Finish';

    export default {
        name: "Game",
        data(){
            return{
                questions: [],
                totalPoints: 0,
                currentQuestion: 0,
                gameX: 'game-start',
                gameXProps: {},
                showPoints: true
            }
        },
        components:{
            'game-start': Start,
            'game-question': Question,
            'game-answer': Answer,
            'game-wrong': Wrong,
            'game-pass': Pass,
            'game-finish': Finish
        },
        methods:{

            nextQuestion() {
                console.log(this.questions.length);
                console.log(this.currentQuestion);
                this.currentQuestion++;
                if(this.questions.length === 0){
                    console.log('1111');
                    this.endGame();
                }else{
                    if(this.currentQuestion > this.questions.length){
                        this.currentQuestion = 0
                    }

                    this.gameX = 'game-question';
                    this.gameXProps = this.questions[this.currentQuestion];
                }

            },
            getQuestions() {
                axios.get('/game/celeb/get-questions').then(response => {

                    this.questions = response.data;

                }).catch(error => {
                    console.log(error);
                });
            },
            startGame() {
                this.totalPoints = 0;
                this.gameXProps = this.questions[this.currentQuestion];
                this.gameX = 'game-question';

                console.log(this.gameXProps);
            },
            answerCorrect() {
                this.totalPoints++;
                this.totalPoints++;
                this.totalPoints++;

                this.gameX = 'game-answer';

                this.updateDatabaseAnswered(this.questions[this.currentQuestion].id);

                setTimeout(function () {
                    this.removeQuestion();
                    this.nextQuestion();
                }.bind(this), 3000);
            },
            answerWrong() {
                this.gameX = 'game-wrong';
                this.totalPoints--;
                this.totalPoints--;

                setTimeout(function () {
                    this.removeQuestion();
                    this.nextQuestion();
                }.bind(this), 5000);
            },
            answerPass() {
                this.totalPoints--;

                this.gameX = 'game-pass';

                setTimeout(function () {
                    this.nextQuestion();
                }.bind(this), 10000);
            },
            endGame() {
                console.log('2222');
                this.showPoints = false;
                this.gameX = 'game-finish';
                this.gameXProps = {score: this.totalPoints}
            },
            removeQuestion(){
                this.questions.splice(this.currentQuestion,1);

                //reset the current index back one as we have removed an element from the array making one short
                this.currentQuestion--;
            },
            updateDatabaseAnswered(id){
                axios.get('/game/celeb/answered/'+id).then(response => {

                }).catch(error => {
                    console.log(error);
                });
            }
        },
        computed:{
            totalPointsLeadZero(){
                if(this.totalPoints < 0) return "- 00" + Math.abs(this.totalPoints);
                if(this.totalPoints < 10) return "00" + this.totalPoints;
                if(this.totalPoints < 100) return "0" + this.totalPoints;
                return this.totalPoints;
            }
        },
        mounted() {
            console.log('loading game');
            this.getQuestions();
        },
        activated() {
        }
    }
</script>

<style scoped>
    .total-points{
        position: fixed;
        right: 1rem;
        top: 3rem;
        padding-right: 1rem;
    }
</style>