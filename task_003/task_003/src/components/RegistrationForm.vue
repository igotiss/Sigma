<template>
    <div class="container pt-5" >
        <div class="card" style="width: 38rem;">
            <div class="card-body text-start" :style="{background: computedColor}">
                <h5 class="card-title text-center ">Sigma software</h5>
                <h6 class="card-subtitle mb-2 text-muted text-center">Карта клієнта</h6>

                <Form  action="#" method="post" @submit="onSubmit">

                    <div class="mb-3">
                        <label for="firstName" class="form-label">Введіть ім'я</label>
                        <Field type="text"
                               class="form-control"
                               id="firstName"
                               v-model="firstName"
                               name="firstName"
                               placeholder="Ім'я"
                               :rules="validateName"
                        />
                        <ErrorMessage name="firstName" />
                    </div>

                    <div class="mb-3">
                        <label for="secondName" class="form-label" >Введіть прізвище</label>
                        <Field type="text"
                               class="form-control"
                               id="secondName"
                               name="secondName"
                               placeholder="Прізвище"
                               v-model="secondName"
                               :rules="validateName"
                        />
                        <ErrorMessage name="secondName" />
                    </div>

                    <div class="radio" >
                        <div class=" form-check mb-3">
                            <input class="form-check-input"
                                   type="radio"
                                   name="sex"
                                   id="man"
                                   value="man"
                                   v-model="sex"

                            >
                            <label class="form-check-label"
                                   for="Man">
                                Чоловік
                            </label>
                        </div>
                        <div class=" form-check mb-3">
                            <input class="form-check-input"
                                   type="radio"
                                   name="sex"
                                   value="woman"
                                   id="woman"
                                   v-model="sex"

                            >
                            <label class="form-check-label"
                                   for="woman">
                                Жінка
                            </label>
                        </div>
                        <div class=" form-check mb-3">
                            <input class="form-check-input"
                                   type="radio"
                                   name="sex"
                                   value="noSex"
                                   v-model="sex"

                            >
                            <label class="form-check-label"
                                   for="woman" >
                                Не бажаю вказувати
                            </label>
                        </div>
                    </div>

                    {{sex}}

                    <div class="mb-3">
                        <label for="phone" class="form-label" required>Введіть номер телефону</label>
                        <Field type="text"
                               class="form-control"
                               id="phone"
                               name="phone"
                               placeholder="0671234567"
                               v-model="phoneNumber"
                               :rules="validatePhone"
                        />
                        <ErrorMessage name="phone" />
                    </div>

                    <div class="mb-3">
                        <label for="nick" class="form-label" required>Введіть нікнейм </label>
                        <Field type="text"
                               class="form-control"
                               id="nick"
                               name="nick"
                               placeholder="нік"
                               v-model="nickName"
                               :rules="validateNick"
                        />
                        <ErrorMessage name="nick" />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label" required>Введіть email </label>
                        <Field  type="email" name="email" class="form-control" :rules="validateEmail"/>
                        <ErrorMessage name="email" />
                    </div>

                    <button type="submit" class="btn btn-primary">Надіслати</button>
                </Form>
            </div>
        </div>
    </div>
</template>

<script>
    import { Form, Field, ErrorMessage  } from 'vee-validate';
    export default {
        name: "RegistrationForm",
        components: {
            Form,
            Field,
            ErrorMessage
        },
        data() {
            return{
                firstName: '',
                nameMessage: '',
                nameStatus: '',
                secondName: "",
                phoneNumber: "",
                sex: "noSex",
                nickName: "",
                activeBackground: 'white',
                formControlValid: "form-control is-valid",
                formControlInvalid: "form-control is-invalid",
                formControlEmpty: "form-control",
                messageRequired: "Це поле є обов'язковим до заповнення",
                messageCheckFilling: "Перевірте чи правильно ви заповнили поле",
                messageNotNumber: "Поле має містити тільки цифри"
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
            onSubmit(values) {
                console.log(JSON.stringify(values, null, 2));
            },
            validateEmail(value) {
                if (!value) {
                    return this.messageRequired;
                }
                const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
                if (!regex.test(value)) {
                    return 'Перевірте чи правильно ви ввели емейл';
                }
                return true;
            },
            validateName(value) {
                if (!value) {
                    return this.messageRequired;
                }
                const regex = /^(?![\d+_@.-]+$)[a-zA-Zа-яА-я]*$/;
                if (!regex.test(value)) {
                    return this.messageCheckFilling;
                }
                if(value.length < 2) {
                    return 'Поле не може бути меншим за 2 символи';
                }
                if(value.length > 10) {
                    return 'Поле не може бути більшим за 10 символи';
                }
                return true;
            },
            validatePhone(value) {
                            if (!value) {
                                return this.messageRequired;
                            }
                            const regex = /^[0-9]+$/;
                            if (!regex.test(value)) {
                                return this.messageNotNumber;
                            }
                            if(value.length!== 10) {
                                return 'Поле повинно мати 10 символів';
                            }
                            return true;
                        },
            validateNick(value) {
                if (!value) {
                    return this.messageRequired;
                }
                const regex = /^([A-Za-z0-9_]+[0-9]{3})$/;
                if (!regex.test(value)) {
                    return 'Нік повинен складатись з цифр і латинських літер і мати три цифри наприкінці';
                }
                if(!/[A-Z]/.test(value)) {
                    return "Нік повинен мати хоча б одну велику літеру"
                }
                if(!/[_]/.test(value)) {
                    return "Нік повинен знак підкреслення"
                }
                return true;
            },

        },
        computed: {
            computedColor() {
                if (this.sex === 'noSex'){
                    return 'Cornsilk'
                } else if (this.sex === 'woman'){
                    return 'LightPink'
                } else {
                    return 'LightCyan'
                }




               // console.log(this.backgroundColor)

            }
        }


    }

</script>

<style scoped>


</style>