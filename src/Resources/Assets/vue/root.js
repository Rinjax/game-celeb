
import Game from './Game';

Vue.component('game-game', Game);


let app = new Vue({
    "el": "#vue-root",
    data: {
        running: false,
    },
    methods:{

        startGame(){
            this.running = true;
        }
    },
    mounted() {

    },
});