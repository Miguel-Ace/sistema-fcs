  // Obtener el campo "id_especialidad"
  var idEspecialidadSelect = document.getElementById('id_especialidad');

  // Agregar un evento de cambio al campo "id_especialidad"
  idEspecialidadSelect.addEventListener('change', function() {
    var selectedValue = idEspecialidadSelect.options[idEspecialidadSelect.selectedIndex].text;
    var nombreDienteInput = document.getElementById('nombre_diente');
    var descripcionInput = document.getElementById('descripcion');

    // Si el valor seleccionado es "Odontología", mostrar los campos "nombre_diente" y "descripcion"
    if (selectedValue === 'Odontología') {
      nombreDienteInput.style.display = 'block';
      descripcionInput.style.display = 'block';
    } else {
      nombreDienteInput.style.display = 'none';
      descripcionInput.style.display = 'none';
    }
  });
