Vue.createApp({
    data() {
        return {
            message: 'змінити',
            counter: 0,
            activeColor: 'blue',
            activeBackground: 'yellow'

        }
    },
    methods: {
        changeBackground() {
            if ( this.counter < 5) {
                if(this.activeColor === "blue") {
                    this.activeColor = "yellow";
                    this.activeBackground = "blue";
                } else {
                    this.activeColor = "blue"
                    this.activeBackground = "yellow"
                }
                this.counter ++
            }
            else
            {
                this.message = "досить бавитись"
            }
        }
    }
}).mount('#app')