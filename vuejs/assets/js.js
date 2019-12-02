window.onload = () => {
    new Vue({
        el: '#app',
        data() {
            return {
                form: {
                    orgao: null,
                    banca: null,
                },
                bancas: [],
                orgaos: [],
                show: true
            }
        },
        mounted() {
            console.log("afff");
            axios
                .get('http://symfony.localhost/api/banca/')
                .then(response => (this.carregarbancas(response.data)))
        },
        methods: {
            carregarbancas(data) {
                console.log(data);
            },
            onSubmit(evt) {
                evt.preventDefault()
                alert(JSON.stringify(this.form))
            },
            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.food = null
                // Trick to reset/clear native browser form validation state
                this.show = false;
                this.$nextTick(() => {
                    this.show = true;
                })
            }
        }
    })
}