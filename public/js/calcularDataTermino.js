function calcularDataTermino() {
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
  
    if (startDateInput.value) {
      const startDate = new Date(startDateInput.value);
      const endDate = new Date(startDate);
      endDate.setMonth(endDate.getMonth() + 30);
  
      const endDateString = endDate.toISOString().split('T')[0]; 
  
      endDateInput.value = endDateString;
    } else {
      endDateInput.value = '';
    }
  }