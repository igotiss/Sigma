Vue.createApp({
    data() {
        return{
            name: '',
            nameMessage: '',
            nameStatus: '',
            secondName: "",
            phoneNumber: "",
            sex: "",
            nickName: "",
            formControlValid: "form-control is-valid",
            formControlInvalid: "form-control is-invalid",
            formControlEmpty: "form-control",


        }
    },
    methods: {
        showNameFieldMessage() {
            if (this.name.length > 4) {
                this.nameMessage = "Поле заповнено вірно"
                this.nameStatus = 'badge bg-success'
            } else {
                this.nameMessage = "Поле має мати не менше 5 символів"
                this.nameStatus = 'badge bg-danger'
            }
        },

    },
    computed: {
        checkStatus () {
            if(this.name.length > 0 && this.name.length < 5){
                return  this.formControlInvalid
            } else if(this.name.length >= 5) {
                return  this.formControlValid
            } else {
                return this.formControlEmpty
            }
        }
    }
}).mount('#app')