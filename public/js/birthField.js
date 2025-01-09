const typeRadios = document.querySelectorAll('input[name="type"]');
const birthField = document.getElementById('birth');

typeRadios.forEach(radio => {
  radio.addEventListener('change', () => {
    if (radio.value === 'Pessoa Jurídica') {
      birthField.parentElement.style.display = 'none'; 
    } else {
      birthField.parentElement.style.display = 'block'; 
    }
  });
});



