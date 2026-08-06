// ===============================
// Validación de fechas: evitar fechas anteriores a hoy
// ===============================
// DESCRIPCIÓN:
//   Este script aplica dos comportamientos por defecto a todos los
//   inputs de tipo date en la página:
//   1) Establece el atributo `min` en la fecha actual (local), de modo
//      que el selector de fecha del navegador no permita escoger días
//      anteriores.
//   2) Añade validación en tiempo real y en el submit del formulario
//      para impedir que se envíen fechas menores a la fecha actual.
// AUTOEJECUCIÓN: IIFE para evitar variables globales

(function () {
    // Función auxiliar: Devuelve la fecha local en formato ISO 'YYYY-MM-DD'
    // Realiza ajuste por zona horaria para obtener la fecha local correcta
    function getTodayLocal() {
        const now = new Date();
        // Ajuste por zona horaria para obtener la fecha local correcta
        const tzOffset = now.getTimezoneOffset();
        const local = new Date(now.getTime() - tzOffset * 60000);
        return local.toISOString().split('T')[0];
    }

    const today = getTodayLocal();

    // Selecciona todos los campos tipo date de la página
    const dateInputs = document.querySelectorAll('input[type="date"]');

    if (!dateInputs.length) {
        // No hay campos date en la página; nada que hacer
        return;
    }

    // Para cada input: establecer min y añadir validaciones en eventos
    dateInputs.forEach((input) => {
        // Establece el límite mínimo del selector de fecha del navegador
        input.min = today;

        // Valida el valor actual del input: si es anterior a hoy marca error
        function validar() {
            if (!input.value) {
                // Campo vacío — no imponemos validación aquí (puede ser requerido por el form)
                input.setCustomValidity('');
                return true;
            }

            if (input.value < today) {
                // Mensaje claro para el usuario cuando la fecha es inválida
                input.setCustomValidity('La fecha no puede ser anterior a la fecha actual.');
            } else {
                input.setCustomValidity('');
            }

            return input.checkValidity();
        }

        // Validación en tiempo real mientras el usuario modifica el campo
        input.addEventListener('input', validar);
        input.addEventListener('change', validar);

        // Ejecutar validación inicial en caso de que el campo tenga un valor prellenado
        validar();
    });

    // Evita el envío de formularios si algún campo date del formulario es inválido
    const forms = new Set(Array.from(dateInputs).map((i) => i.form).filter(Boolean));

    forms.forEach((form) => {
        form.addEventListener('submit', (event) => {
            for (const input of form.querySelectorAll('input[type="date"]')) {
                if (input.value && input.value < today) {
                    // Detener envío y mostrar el primer error encontrado
                    event.preventDefault();
                    input.reportValidity();
                    input.focus();
                    return;
                }
            }
        });
    });
})();
