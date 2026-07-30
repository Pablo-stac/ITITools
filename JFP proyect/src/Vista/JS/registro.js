document.addEventListener('DOMContentLoaded', () => {
    const formulario = document.querySelector('.registro-form');
    const mensaje = document.getElementById('mensaje-registro');

    if (!formulario) {
        return;
    }

    formulario.addEventListener('submit', async (evento) => {
        evento.preventDefault();

        const datos = {
            nombre: formulario.nombre.value.trim(),
            apellido: formulario.apellido.value.trim(),
            email: formulario.email.value.trim(),
            password: formulario.password.value,
            estado: 'activo',
            rol: formulario.rol.value
        };

        if (!datos.nombre || !datos.apellido || !datos.correo || !datos.contrasena) {
            mostrarMensaje(mensaje, 'Complete todos los campos obligatorios.', 'error');
            return;
        }

        if (formulario.password.value !== formulario['confirm-password'].value) {
            mostrarMensaje(mensaje, 'Las contraseñas no coinciden.', 'error');
            return;
        }

        try {
            const respuesta = await fetch('../../../procesar_registro.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
                },
                body: new URLSearchParams(datos)
            });

            const resultado = await respuesta.json();

            if (resultado.exito) {
                mostrarMensaje(mensaje, resultado.mensaje || 'Registro realizado correctamente.', 'exito');
                formulario.reset();
            } else {
                mostrarMensaje(mensaje, resultado.mensaje || 'No se pudo completar el registro.', 'error');
            }
        } catch (error) {
            mostrarMensaje(mensaje, 'No fue posible conectar con el servidor.', 'error');
        }
    });

    function mostrarMensaje(elemento, texto, tipo) {
        if (!elemento) {
            return;
        }

        elemento.textContent = texto;
        elemento.className = `registro-mensaje ${tipo}`;
    }
});
