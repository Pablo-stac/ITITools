// ===============================
// Referencias al formulario de registro
// ===============================
// Obtiene elementos del formulario de registro desde el DOM
const registroForm = document.querySelector('.registro-form');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');

// ===============================
// Validación de coincidencia de contraseñas
// ===============================
// Función: Verifica que el campo contraseña y confirmación sean iguales
// Retorna: boolean - true si coinciden, false si no
// Efecto: Establece mensajes de error personalizados en el campo
function validarCoincidenciaPassword() {
    if (!passwordInput || !confirmPasswordInput) {
        // Si alguno de los campos no existe, no se aplica la validación
        return true;
    }

    const coinciden = passwordInput.value === confirmPasswordInput.value;

    // Actualiza el mensaje de error propio del campo de confirmación
    if (confirmPasswordInput.value && !coinciden) {
        confirmPasswordInput.setCustomValidity('Las contraseñas no coinciden.');
    } else {
        confirmPasswordInput.setCustomValidity('');
    }

    return coinciden;
}

// ===============================
// Eventos de validación y envío
// ===============================
// Asocia validación en tiempo real a cambios de entrada
// Impide submit del formulario si las contraseñas no coinciden
if (registroForm && passwordInput && confirmPasswordInput) {
    // Escucha cambios en los campos de contraseña para validar en tiempo real
    passwordInput.addEventListener('input', validarCoincidenciaPassword);
    confirmPasswordInput.addEventListener('input', validarCoincidenciaPassword);

    // Evita enviar el formulario cuando las contraseñas no coinciden
    registroForm.addEventListener('submit', (event) => {
        if (!validarCoincidenciaPassword()) {
            event.preventDefault();
            confirmPasswordInput.reportValidity();
            confirmPasswordInput.focus();
        }
    });
}
