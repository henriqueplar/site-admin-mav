function formatCEP(input) {
    let value = input.value.replace(/\D/g, '');

    if (value.length > 5) {
        value = value.replace(/(\d{5})(\d{3})/, '$1-$2');
    }

    input.value = value;
    //buscaCEP(value);
}

/* function buscaCEP(cep) {
    cep = cep.replace(/\D/g, '');

    if (cep.length === 8) {
        const url = `https://viacep.com.br/ws/${cep}/json/`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                street = document.getElementById('street');
                neighborhood = document.getElementById('neighborhood');
                city = document.getElementById('city');
                state = document.getElementById('state');
                if (!data.erro) { 
                    street.value = data.logradouro;
                    //street.disabled = true;
                    street.dispatchEvent(new InputEvent('input'));

                    neighborhood.value = data.bairro;
                    //neighborhood.disabled = true;
                    neighborhood.dispatchEvent(new InputEvent('input'));

                    city.value = data.localidade;
                    //city.disabled = true;
                    city.dispatchEvent(new InputEvent('input'));

                    state.value = data.uf;
                    //state.disabled = true;
                    state.dispatchEvent(new InputEvent('input'));

                } else {
                    street.value = '';
                    street.disabled = false;
                    neighborhood.value = '';
                    neighborhood.disabled = false;
                    city.value = '';
                    city.disabled = false;
                    state.value = '';
                    state.disabled = false;
                }
            })
            .catch(error => console.error('Erro ao buscar CEP:', error));
    }
} */