function formatDocument(input) {
    let value = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
  
    if (value.length <= 11) { // CPF
      value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g, '$1.$2.$3-$4');
    } else { // CNPJ
      value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g, '$1.$2.$3/$4-$5');
    }
  
    input.value = value;
  }