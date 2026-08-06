// ===============================
// Captura de eventos de la vista
// ===============================
// El JavaScript de interfaz solo recoge el envío del formulario, valida
// datos básicos y envía la solicitud al controlador a través del servidor.
const loginForm = document.querySelector('.login-form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const mensajeLogin = document.getElementById('mensaje-login');

function mostrarMensaje(texto, tipo) {
    if (!mensajeLogin) {
        return;
    }

    mensajeLogin.textContent = texto;
    mensajeLogin.className = `login-mensaje ${tipo}`;
}

function redirigirPorRol(rol) {
    if (rol === 'administrador') {
        window.location.href = 'administrador.php';
        return;
    }

    if (rol === 'soporte') {
        window.location.href = 'soporte.php';
        return;
    }

    if (rol === 'solicitante') {
        window.location.href = 'solicitante.php';
        return;
    }

    mostrarMensaje('Rol de usuario no válido.', 'error');
}

if (loginForm && emailInput && passwordInput) {
    loginForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const email = emailInput.value.trim();
        const password = passwordInput.value;

        if (!email || !password) {
            mostrarMensaje('Complete los campos obligatorios.', 'error');
            return;
        }

        try {
            const respuesta = await fetch('../../Controlador/Acciones/procesar_login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
                },
                body: new URLSearchParams({ email, password })
            });

            const resultado = await respuesta.json();

            if (!resultado.exito) {
                mostrarMensaje(resultado.mensaje || 'No se pudo iniciar sesión.', 'error');
                return;
            }

            redirigirPorRol(resultado.rol);
        } catch (error) {
            mostrarMensaje('No fue posible conectar con el servidor.', 'error');
        }
    });
} else {
    console.warn('login.js: no se encontró el formulario o los campos de inicio de sesión.');
}