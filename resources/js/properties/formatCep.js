/* 

function formatCEP(input) {
    let value = input.value.replace(/\D/g, '');

    if (value.length > 5) {
        value = value.replace(/(\d{5})(\d{3})/, '$1-$2');
    }

    input.value = value;

    setTimeout(() => {
        buscaCEP(value);
    }, 100);  // Ajuste o tempo de atraso (em milissegundos) se necessário
}


function buscaCEP(cep) {
    // Remove caracteres não numéricos do CEP
    cep = cep.replace(/\D/g, '');

    // Verifica se o CEP tem 8 dígitos
    if (cep.length === 8) {
        // Cria a URL da API
        const url = `https://viacep.com.br/ws/${cep}/json/`;

        // Faz a requisição para a API
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) { // Se o CEP for encontrado
                    document.getElementById('street').value = data.logradouro;
                    document.getElementById('street').setAttribute('value', data.logradouro);
                    document.getElementById('neighborhood').value = data.bairro;
                    document.getElementById('neighborhood').setAttribute('value', data.bairro);
                    document.getElementById('city').value = data.localidade;
                    document.getElementById('city').setAttribute('value', data.localidade);
                    document.getElementById('state').value = data.uf;
                    document.getElementById('state').setAttribute('value', data.uf);

                    // Desabilita os campos
                    document.getElementById('street').disabled = true;
                    document.getElementById('neighborhood').disabled = true;
                    document.getElementById('city').disabled = true;
                    document.getElementById('state').disabled = true;
                } else {
                    // Limpa os campos e habilita-os caso o CEP não seja encontrado
                    document.getElementById('street').value = '';
                    document.getElementById('neighborhood').value = '';
                    document.getElementById('city').value = '';
                    document.getElementById('state').value = '';

                    document.getElementById('street').disabled = false;
                    document.getElementById('neighborhood').disabled = false;
                    document.getElementById('city').disabled = false;
                    document.getElementById('state').disabled = false;
                }
            })
            .catch(error => console.error('Erro ao buscar CEP:', error));
    }
} */