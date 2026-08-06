<?php
require_once __DIR__ . '/../../Controlador/TicketController.php';
require_once __DIR__ . '/../../Controlador/PrestamoController.php';

$ticketController = new TicketController();
$prestamoController = new PrestamoController();

$ticketsAsignados = $ticketController->listarTickets();
$prestamos = $prestamoController->consultarPrestamos();
$mensaje = trim($_GET['mensaje'] ?? '');
?>
<!DOCTYPE html>
<!-- Página del soporte técnico: herramientas para gestionar tickets y movimientos de inventario -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/soporte.css">
    <title>Soporte Técnico</title>
</head>
<body>
    <!-- Cabecera del portal de soporte con navegación entre secciones de trabajo -->
    <header class="soporte-header">
        <div class="brand">
            <h1>Portal de Soporte Técnico</h1>
            <p>Gestión de tickets, diagnósticos, inventario y préstamos de equipos.</p>
        </div>
        <!-- Botón toggle para menú en pantallas pequeñas -->
        <button type="button" class="nav-toggle" aria-controls="soporte-nav" aria-expanded="false">☰</button>
        <!-- Navegación principal del portal de soporte -->
        <nav id="soporte-nav" class="soporte-nav">
            <a href="#tickets-asignados">Tickets asignados</a>
            <a href="#actualizar-estado">Actualizar estado</a>
            <a href="#prestamos-equipos">Préstamos y devoluciones</a>
            <a href="#inventario">Inventario</a>
            <a href="#historial">Historial</a>
            <a href="login.php" class="logout-link">Cerrar sesión</a>
        </nav>
    </header>

    <!-- Contenido principal para formularios y tablas del equipo de soporte -->
    <main class="soporte-main">
        <?php if ($mensaje !== ''): ?>
            <div class="admin-message" style="margin-bottom: 1rem; padding: 0.8rem 1rem; background: #e3f2fd; border-left: 4px solid #1565c0; color: #0d47a1; border-radius: 5px;">
                <?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <!-- SECCIÓN 1: Tabla de tickets asignados al técnico de soporte -->
        <section id="tickets-asignados" class="panel">
            <h2>Tickets asignados</h2>
            <p>Visualice las incidencias generadas por los solicitantes y seleccione un ticket para iniciar su atención.</p>

            <div class="ticket-table-wrapper">
                <table class="ticket-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Asunto</th>
                            <th>Fecha</th>
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ticketsAsignados)): ?>
                            <?php foreach ($ticketsAsignados as $ticket): ?>
                                <tr>
                                    <td><?= htmlspecialchars($ticket['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($ticket['asunto'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($ticket['fecha'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($ticket['tipo'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($ticket['estado'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($ticket['observaciones'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No hay tickets asignados en la base de datos.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- SECCIÓN 2: Formulario para documentar diagnósticos y actualizar estado de tickets -->
        <section id="actualizar-estado" class="panel">
            <h2>Registrar diagnóstico y actualizar estado</h2>
            <p>Documente el diagnóstico, cambie el estado de la incidencia y registre la solución aplicada.</p>

            <form action="../../Controlador/Acciones/procesar_admin.php" method="post" class="soporte-form">
                <div class="soporte-field soporte-field-compact">
                    <label for="ticket-id">ID del ticket</label>
                    <input type="text" id="ticket-id" name="ticket_id" placeholder="Ingrese el número de ticket" required>
                </div>

                <div class="soporte-field soporte-field-compact">
                    <label for="estado-ticket">Estado</label>
                    <select id="estado-ticket" name="estado_ticket" required>
                        <option value="">Seleccione un estado</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="en-proceso">En proceso</option>
                        <option value="resuelto">Resuelto</option>
                    </select>
                </div>

                <div class="soporte-field soporte-field-wide">
                    <label for="diagnostico">Diagnóstico técnico</label>
                    <textarea id="diagnostico" name="diagnostico" rows="5" placeholder="Describa el diagnóstico técnico" required></textarea>
                </div>

                <div class="soporte-field soporte-field-wide">
                    <label for="solucion">Solución aplicada</label>
                    <textarea id="solucion" name="solucion" rows="4" placeholder="Detalle las acciones realizadas" required></textarea>
                </div>

                <div class="soporte-actions">
                    <button type="submit" name="actualizar_ticket">Guardar actualización</button>
                </div>
            </form>
        </section>

        <section id="prestamos-equipos" class="panel">
            <h2>Préstamos y devoluciones de equipos</h2>
            <p>Registre los movimientos de préstamo y devolución de equipos para mantener el estado actualizado.</p>

            <form action="../../Controlador/Acciones/procesar_admin.php" method="post" class="soporte-form">
                <div class="soporte-field soporte-field-compact">
                    <label for="equipo-id">ID del equipo</label>
                    <input type="text" id="equipo-id" name="equipo_id" placeholder="ID o código del equipo" required>
                </div>

                <div class="soporte-field soporte-field-compact">
                    <label for="movimiento">Movimiento</label>
                    <select id="movimiento" name="movimiento" required>
                        <option value="">Seleccione movimiento</option>
                        <option value="prestamo">Préstamo</option>
                        <option value="devolucion">Devolución</option>
                    </select>
                </div>

                <div class="soporte-field">
                    <label for="condicion-equipo">Condición del equipo</label>
                    <select id="condicion-equipo" name="condicion_equipo" required>
                        <option value="">Seleccione condición</option>
                        <option value="funcional">Funcional</option>
                        <option value="requiere-mantenimiento">Requiere mantenimiento</option>
                        <option value="fuera-de-servicio">Fuera de servicio</option>
                    </select>
                </div>

                <div class="soporte-field">
                    <label for="responsable">Responsable</label>
                    <input type="text" id="responsable" name="responsable" placeholder="Nombre del responsable" required>
                </div>

                <div class="soporte-actions">
                    <button type="submit" name="registrar_movimiento">Registrar movimiento</button>
                </div>
            </form>
        </section>

        <section id="inventario" class="panel">
            <h2>Inventario tecnológico</h2>
            <p>Consulte el inventario de recursos disponibles y su estado general.</p>

            <div class="inventario-table-wrapper">
                <table class="inventario-table">
                    <thead>
                        <tr>
                            <th>ID Préstamo</th>
                            <th>Equipo</th>
                            <th>Movimiento</th>
                            <th>Condición</th>
                            <th>Responsable</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($prestamos)): ?>
                            <?php foreach ($prestamos as $prestamo): ?>
                                <tr>
                                    <td><?= htmlspecialchars($prestamo['idPrestamo'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($prestamo['equipo_id'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($prestamo['movimiento'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($prestamo['condicion_equipo'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($prestamo['responsable'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($prestamo['estado'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No hay movimientos de préstamos en la base de datos.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="historial" class="panel">
            <h2>Historial de intervenciones</h2>
            <p>Acceda al historial de acciones realizadas sobre cada recurso para mantener la base de conocimiento.</p>

            <div class="historial-table-wrapper">
                <table class="historial-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Recurso</th>
                            <th>Intervención</th>
                            <th>Fecha</th>
                            <th>Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>H-102</td>
                            <td>Portátil E-001</td>
                            <td>Instalación de antivirus</td>
                            <td>12/05/2026</td>
                            <td>Resuelto</td>
                        </tr>
                        <tr>
                            <td>H-103</td>
                            <td>Red de laboratorio</td>
                            <td>Diagnóstico de conectividad</td>
                            <td>14/05/2026</td>
                            <td>En proceso</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script>
        const navToggle = document.querySelector('.nav-toggle');
        const nav = document.getElementById('soporte-nav');

        if (navToggle && nav) {
            navToggle.addEventListener('click', () => {
                const expanded = navToggle.getAttribute('aria-expanded') === 'true';
                nav.classList.toggle('open');
                navToggle.setAttribute('aria-expanded', String(!expanded));
            });
        }
    </script>
</body>
</html>