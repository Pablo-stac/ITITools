<?php
// TODO: Agregar validación de sesión y permisos de administrador.
// session_start();
// if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'administrador') {
//     header('Location: login.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/administrador.css">
    <title>Administrador</title>
</head>
<body>
    <header class="admin-header">
        <div class="brand">
            <h1>Panel del Administrador</h1>
            <p>Gestión integral del sistema, usuarios, inventario, incidencias y métricas.</p>
        </div>
        <nav class="admin-nav">
            <a href="#incidencias-globales">Incidencias globales</a>
            <a href="#gestion-usuarios">Gestión de usuarios</a>
            <a href="#inventario-tecnologico">Inventario</a>
            <a href="#metricas-reportes">Métricas</a>
            <a href="#supervision-recursos">Supervisión</a>
        </nav>
    </header>

    <main class="admin-main">
        <section id="incidencias-globales" class="panel">
            <h2>Incidencias y solicitudes</h2>
            <p>Ver todas las solicitudes y tickets del sistema, con filtros por estado y prioridad.</p>
            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Solicitante</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Prioridad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0001</td>
                            <td>Ana Pérez</td>
                            <td>Instalación de software</td>
                            <td>15/05/2026</td>
                            <td>Pendiente</td>
                            <td>Alta</td>
                        </tr>
                        <tr>
                            <td>0002</td>
                            <td>Juan Torres</td>
                            <td>Configuración de equipo</td>
                            <td>14/05/2026</td>
                            <td>En proceso</td>
                            <td>Media</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="gestion-usuarios" class="panel">
            <h2>Creación y gestión de usuarios</h2>
            <p>Registre nuevos usuarios, modifique roles y gestione el acceso al sistema.</p>
            <form action="administrador.php" method="post" class="admin-form">
                <div class="admin-field">
                    <label for="nombre-usuario">Nombre completo</label>
                    <input type="text" id="nombre-usuario" name="nombre_usuario" placeholder="Nombre del usuario" required>
                </div>

                <div class="admin-field">
                    <label for="email-usuario">Correo institucional</label>
                    <input type="email" id="email-usuario" name="email_usuario" placeholder="usuario@instituto.edu" required>
                </div>

                <div class="admin-field admin-field-compact">
                    <label for="rol-usuario">Rol</label>
                    <select id="rol-usuario" name="rol_usuario" required>
                        <option value="">Seleccione un rol</option>
                        <option value="solicitante">Solicitante</option>
                        <option value="soporte">Soporte</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>

                <div class="admin-field admin-field-compact">
                    <label for="estado-usuario">Estado</label>
                    <select id="estado-usuario" name="estado_usuario" required>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>

                <div class="admin-actions">
                    <button type="submit" name="crear_usuario">Crear usuario</button>
                </div>
            </form>
        </section>

        <section id="inventario-tecnologico" class="panel">
            <h2>Inventario tecnológico</h2>
            <p>Monitoree el inventario de equipos, su estado y disponibilidad para asignaciones.</p>
            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID Equipo</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Ubicación</th>
                            <th>Disponibilidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>E-001</td>
                            <td>Portátil</td>
                            <td>Funcional</td>
                            <td>Laboratorio 1</td>
                            <td>Disponible</td>
                        </tr>
                        <tr>
                            <td>E-014</td>
                            <td>Proyector</td>
                            <td>Requiere mantenimiento</td>
                            <td>Coordinación</td>
                            <td>No disponible</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="metricas-reportes" class="panel">
            <h2>Panel de métricas y reportes</h2>
            <p>Acceda a gráficos y datos clave para tomar decisiones sobre la infraestructura tecnológica.</p>
            <div class="metrics-grid">
                <div class="metric-card">
                    <h3>Tickets abiertos</h3>
                    <p>12</p>
                </div>
                <div class="metric-card">
                    <h3>Incidencias resueltas</h3>
                    <p>84</p>
                </div>
                <div class="metric-card">
                    <h3>Equipos en préstamo</h3>
                    <p>6</p>
                </div>
            </div>
        </section>

        <section id="supervision-recursos" class="panel">
            <h2>Supervisión de recursos</h2>
            <p>Controle el estado general de los recursos y la base de conocimiento para mejoras continuas.</p>
            <div class="info-grid">
                <div class="info-card">
                    <h3>Estado general</h3>
                    <p>Monitorización de la salud de los sistemas y recursos en tiempo real.</p>
                </div>
                <div class="info-card">
                    <h3>Base de conocimiento</h3>
                    <p>Historial de intervenciones y soluciones para facilitar diagnósticos futuros.</p>
                </div>
                <div class="info-card">
                    <h3>Planificación</h3>
                    <p>Análisis de datos para definir mejoras en la infraestructura tecnológica.</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
