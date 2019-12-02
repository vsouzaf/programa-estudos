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
            axios
                .get('http://symfony.localhost/api/orgao/')
                .then(response => (this.setDadosComboDoResponse(response.data, "orgaos")));

            axios
                .get('http://symfony.localhost/api/banca/')
                .then(response => (this.setDadosComboDoResponse(response.data, "bancas")));
        },
        methods: {
            setDadosComboDoResponse(data, nomePropriedade) {
                this[nomePropriedade] = this.setDadosParaCombo(data, "id", "nome");
            },
            setDadosParaCombo(dados, campoValue, campoTexto) {
                let listaCombo = [];

                dados.forEach((item) => {
                    listaCombo.push(
                        {
                            value: item[campoValue],
                            text: item[campoTexto]
                        }
                    );
                });

                return listaCombo;
            },
            onSubmit(evt) {
                evt.preventDefault()
                alert(JSON.stringify(this.form))
            }
        }
    })
};