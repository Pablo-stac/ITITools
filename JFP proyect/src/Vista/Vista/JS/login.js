// ===============================
// Datos de usuarios y referencias al DOM
// ===============================
// Array de usuarios válidos del sistema con email, contraseña y rol asignado
// Nota: En producción, esto debería venir de una API backend segura
const usuarios = [
    {
        email: "admin@iti.edu.uy",
        password: "1234",
        rol: "administrador"
    },
    {
        email: "soporte@iti.edu.uy",
        password: "1234",
        rol: "soporte"
    },
    {
        email: "solicitante@iti.edu.uy",
        password: "1234",
        rol: "solicitante"
    }
];

// Elementos del formulario de inicio de sesión obtenidos del DOM
const loginForm = document.querySelector('.login-form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

// ===============================
// Redirección por rol de usuario
// ===============================
// Función: Redirige al usuario a la página correspondiente según su rol
// Parámetro: rol (string) - 'administrador', 'soporte' o 'solicitante'
// Retorna: void - Cambia window.location o muestra alerta de error
function redirigirPorRol(rol) {
    if (rol === 'administrador') {
        window.location.href = 'administrador.html';
        return;
    }

    if (rol === 'soporte') {
        window.location.href = 'soporte.html';
        return;
    }

    if (rol === 'solicitante') {
        window.location.href = 'solicitante.html';
        return;
    }

    alert('Rol de usuario no válido.');
}

// ===============================
// Manejo del envío del formulario
// ===============================
// Verifica credenciales ingresadas contra el array de usuarios
// Si hay coincidencia: obtiene el rol y redirige
// Si no hay coincidencia: muestra mensaje de error
if (loginForm && emailInput && passwordInput) {
    // Escucha el envío del formulario y evita el comportamiento por defecto
    loginForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const email = emailInput.value.trim();
        const password = passwordInput.value;

        // Busca un usuario cuya combinación de email y contraseña coincida
        const usuario = usuarios.find((u) => u.email === email && u.password === password);

        // Si no se encuentra usuario, muestra un mensaje claro y no redirige
        if (!usuario) {
            alert('Email o contraseña incorrectos.');
            return;
        }

        redirigirPorRol(usuario.rol);
    });
} else {
    // Aviso útil durante el desarrollo cuando faltan elementos en la página
    console.warn('login.js: no se encontró el formulario o los campos de inicio de sesión.');
}