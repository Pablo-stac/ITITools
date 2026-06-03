<?php
// TODO: Agregar validación de sesión e información del solicitante.
// session_start();
// if (!isset($_SESSION['usuario'])) {
//     header('Location: login.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/solicitante.css">
    <title>Solicitante</title>
</head>
<body>
    <header class="solicitante-header">
        <div class="brand">
            <h1>Portal de Solicitantes</h1>
            <p>Registro y seguimiento de incidencias y solicitudes de servicio</p>
        </div>
        <nav class="solicitante-nav">
            <a href="#registro-incidencia">Registrar incidencia</a>
            <a href="#registro-servicio">Solicitar servicio</a>
            <a href="#consulta-estado">Consultar estado</a>
            <a href="#informacion">Información</a>
        </nav>
    </header>

    <main class="solicitante-main">
        <section id="registro-incidencia" class="panel">
            <h2>Registrar incidencia técnica</h2>
            <p>Complete el formulario para reportar un problema técnico o un requerimiento de asistencia.</p>

            <form action="solicitante.php" method="post" class="solicitante-form">
                <div class="solicitante-field">
                    <label for="tipo-incidencia">Tipo de incidencia</label>
                    <select id="tipo-incidencia" name="tipo_incidente" required>
                        <option value="">Seleccione una opción</option>
                        <option value="problema-tecnico">Problema técnico</option>
                        <option value="hardware">Hardware</option>
                        <option value="software">Software</option>
                        <option value="red">Red / Conectividad</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>

                <div class="solicitante-field">
                    <label for="area">Área o dependencia</label>
                    <input type="text" id="area" name="area" placeholder="Departamento, unidad o laboratorio" required>
                </div>

                <div class="solicitante-field">
                    <label for="asunto-incidencia">Asunto</label>
                    <input type="text" id="asunto-incidencia" name="asunto_incidente" placeholder="Título breve de la incidencia" required>
                </div>

                <div class="solicitante-field solicitante-field-wide">
                    <label for="descripcion-incidencia">Descripción detallada</label>
                    <textarea id="descripcion-incidencia" name="descripcion_incidente" rows="6" placeholder="Describa el problema o la solicitud con la mayor información posible" required></textarea>
                </div>

                <div class="solicitante-field solicitante-field-compact">
                    <label for="prioridad-incidencia">Prioridad</label>
                    <select id="prioridad-incidencia" name="prioridad_incidente" required>
                        <option value="">Seleccione prioridad</option>
                        <option value="baja">Baja</option>
                        <option value="media">Media</option>
                        <option value="alta">Alta</option>
                    </select>
                </div>

                <div class="solicitante-actions">
                    <button type="submit" name="registrar_incidencia">Enviar incidencia</button>
                </div>
            </form>
        </section>

        <section id="registro-servicio" class="panel">
            <h2>Solicitar servicio</h2>
            <p>Realice solicitudes de servicio para laboratorios, instalación de software o configuración de equipos.</p>

            <form action="solicitante.php" method="post" class="solicitante-form">
                <div class="solicitante-field">
                    <label for="tipo-servicio">Tipo de servicio</label>
                    <select id="tipo-servicio" name="tipo_servicio" required>
                        <option value="">Seleccione una opción</option>
                        <option value="preparacion-laboratorio">Preparación de laboratorio</option>
                        <option value="instalacion-software">Instalación de software</option>
                        <option value="configuracion-equipo">Configuración de equipo</option>
                        <option value="otro-servicio">Otro servicio</option>
                    </select>
                </div>

                <div class="solicitante-field solicitante-field-wide">
                    <label for="descripcion-servicio">Descripción del servicio</label>
                    <textarea id="descripcion-servicio" name="descripcion_servicio" rows="6" placeholder="Explique la necesidad del servicio" required></textarea>
                </div>

                <div class="solicitante-field solicitante-field-compact">
                    <label for="fecha-requerida">Fecha requerida</label>
                    <input type="date" id="fecha-requerida" name="fecha_requerida">
                </div>

                <div class="solicitante-actions">
                    <button type="submit" name="registrar_servicio">Enviar solicitud</button>
                </div>
            </form>
        </section>

        <section id="consulta-estado" class="panel">
            <h2>Consultar estado de solicitudes</h2>
            <p>Verifique el estado de sus incidencias y solicitudes registradas.</p>

            <div class="estado-summary">
                <table class="estado-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Asunto</th>
                            <th>Estado</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0001</td>
                            <td>15/05/2026</td>
                            <td>Problema técnico</td>
                            <td>No enciende equipo</td>
                            <td>Pendiente</td>
                            <td>Asignado a soporte</td>
                        </tr>
                        <tr>
                            <td>0002</td>
                            <td>10/05/2026</td>
                            <td>Instalación de software</td>
                            <td>Instalar paquete de estadística</td>
                            <td>En proceso</td>
                            <td>Programado para mañana</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="informacion" class="panel">
            <h2>Bienvenido, solicitante</h2>
            <p>Acceso seguro y autenticado. Desde aquí puede revisar todas sus solicitudes, crear nuevos tickets y conocer el seguimiento de su atención.</p>

            <div class="info-grid">
                <div class="info-card">
                    <h3>Acceso</h3>
                    <p>Ingreso mediante usuario y contraseña institucional.</p>
                </div>
                <div class="info-card">
                    <h3>Tipos de solicitud</h3>
                    <p>Incidencias técnicas, preparación de laboratorios, instalación de software y configuración de equipos.</p>
                </div>
                <div class="info-card">
                    <h3>Estados</h3>
                    <p>Pendiente, en proceso o resuelta.</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
