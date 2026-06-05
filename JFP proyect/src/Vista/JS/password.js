const registroForm = document.querySelector('.registro-form');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');

function validarCoincidenciaPassword() {
    if (!passwordInput || !confirmPasswordInput) {
        return true;
    }

    const coinciden = passwordInput.value === confirmPasswordInput.value;

    if (confirmPasswordInput.value && !coinciden) {
        confirmPasswordInput.setCustomValidity('Las contraseñas no coinciden.');
    } else {
        confirmPasswordInput.setCustomValidity('');
    }

    return coinciden;
}

if (registroForm && passwordInput && confirmPasswordInput) {
    passwordInput.addEventListener('input', validarCoincidenciaPassword);
    confirmPasswordInput.addEventListener('input', validarCoincidenciaPassword);

    registroForm.addEventListener('submit', (event) => {
        if (!validarCoincidenciaPassword()) {
            event.preventDefault();
            confirmPasswordInput.reportValidity();
            confirmPasswordInput.focus();
        }
    });
}
