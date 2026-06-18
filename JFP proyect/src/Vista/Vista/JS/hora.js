// ===============================
// Validación de horas: hora de salida después de entrada
// ===============================
// DESCRIPCIÓN:
//   Este script valida que en todo formulario, la hora de salida sea
//   siempre posterior a la hora de entrada. Se aplica automáticamente a:
//   - inputs[name="hora_entrada"] (o id="hora-entrada")
//   - inputs[name="hora_salida"] (o id="hora-salida")
// AUTOEJECUCIÓN: IIFE para evitar variables globales

(function () {
    // Selecciona todos los campos de hora de entrada en el documento
    // Busca por name="hora_entrada" O id="hora-entrada"
    const horaEntradaInputs = document.querySelectorAll('input[name="hora_entrada"], input[id="hora-entrada"]');

    if (!horaEntradaInputs.length) {
        // No hay campos de hora de entrada en la página
        return;
    }

    horaEntradaInputs.forEach((horaEntrada) => {
        // Busca el formulario padre
        const form = horaEntrada.closest('form');
        if (!form) return;

        // Busca el campo de hora de salida dentro del mismo formulario
        const horaSalida = form.querySelector('input[name="hora_salida"], input[id="hora-salida"]');
        if (!horaSalida) return;

        // Función de validación: comprueba que salida > entrada
        function validarHoras() {
            if (!horaEntrada.value || !horaSalida.value) {
                // Si alguno está vacío, no validamos (puede ser requerido por HTML5)
                horaSalida.setCustomValidity('');
                return true;
            }

            // Compara las horas en formato HH:MM (orden alfabético funciona)
            if (horaSalida.value <= horaEntrada.value) {
                // La hora de salida no es posterior a la entrada
                horaSalida.setCustomValidity('La hora de salida debe ser posterior a la hora de entrada.');
            } else {
                horaSalida.setCustomValidity('');
            }

            return horaSalida.checkValidity();
        }

        // Valida en tiempo real cuando el usuario modifica las horas
        horaEntrada.addEventListener('input', validarHoras);
        horaEntrada.addEventListener('change', validarHoras);
        horaSalida.addEventListener('input', validarHoras);
        horaSalida.addEventListener('change', validarHoras);

        // Ejecuta validación inicial por si hay valores prellenados
        validarHoras();

        // Evita enviar el formulario si la validación falla
        form.addEventListener('submit', (event) => {
            if (!validarHoras()) {
                event.preventDefault();
                horaSalida.reportValidity();
                horaSalida.focus();
            }
        });
    });
})();
