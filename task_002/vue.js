let id = 0;
Vue.createApp({

    data() {
        return {
            newTodo: '',
            hideCompleted: false,
            todos: [
                {id: id++, text: 'Підключитись до Sigma', done: true},
                {id: id++, text: 'Зробити ДЗ', done: true},
                {id: id++, text: 'Вивчити Vue', done: false},
                {id: id++, text: 'Випити кави', done: false},
            ]
        }
    },
    computed: {
        filteredTodos() {
            return this.hideCompleted
                ? this.todos.filter((t) => !t.done)
                : this.todos
        }
    },
    methods: {
        addTodo() {
            this.todos.push({id: id++, text: this.newTodo, done: false})
            this.newTodo = ''
        },
        removeTodo(todo) {
            this.todos = this.todos.filter((t) => t !== todo)
        }
    }
}).mount('#app')