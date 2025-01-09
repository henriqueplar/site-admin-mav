function formatPhone(input) {
  let value = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

  // Verifica se o número tem 9 dígitos (com DDD) ou 8 dígitos (sem DDD)
  if (value.length === 11) { 
    // Formata com DDD (xx) xxxxx-xxxx
    value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
  } else if (value.length === 10) {
    // Formata com DDD (xx) xxxx-xxxx
    value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
  } else if (value.length === 9) {
    // Formata sem DDD xxxxx-xxxx
    value = value.replace(/(\d{5})(\d{4})/, '$1-$2');
  } else if (value.length === 8) {
    // Formata sem DDD xxxx-xxxx
    value = value.replace(/(\d{4})(\d{4})/, '$1-$2');
  }

  input.value = value;
}