<?php

require_once __DIR__ . '/../Modelo/Sala.php';
require_once __DIR__ . '/../Modelo/Equipo.php';

/**
 * Controlador para gestionar salas y su relación con equipos.
 */
class SalaController
{
    /**
     * Constructor del controlador.
     */
    public function __construct()
    {
        // Preparado para futuras dependencias o conexión con base de datos.
    }

    /**
     * Agrega un equipo a una sala.
     *
     * @return void
     */
    public function agregarEquipoSala(): void
    {
        // Aquí se asociará un equipo a una sala.
    }

    /**
     * Quita un equipo de una sala.
     *
     * @return void
     */
    public function quitarEquipoSala(): void
    {
        // Aquí se eliminará la relación entre sala y equipo.
    }

    /**
     * Consulta los equipos asociados a una sala.
     *
     * @return void
     */
    public function consultarEquiposSala(): void
    {
        // Aquí se consultarán los equipos de la sala.
    }
}
