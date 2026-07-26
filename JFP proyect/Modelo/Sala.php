<?php

/**
 * Clase que representa una sala del sistema SGRSI.
 * Permite organizar equipos dentro de un espacio físico.
 */
class Sala
{
    /**
     * Identificador de la sala.
     *
     * @var int
     */
    private int $idSala;

    /**
     * Nombre de la sala.
     *
     * @var string
     */
    private string $nombre;

    /**
     * Constructor de la clase Sala.
     *
     * @param int $idSala Identificador de la sala.
     * @param string $nombre Nombre de la sala.
     */
    public function __construct(int $idSala, string $nombre)
    {
        $this->idSala = $idSala;
        $this->nombre = $nombre;
    }

    /**
     * Obtiene el identificador de la sala.
     *
     * @return int
     */
    public function getIdSala(): int
    {
        return $this->idSala;
    }

    /**
     * Establece el identificador de la sala.
     *
     * @param int $idSala Identificador de la sala.
     * @return void
     */
    public function setIdSala(int $idSala): void
    {
        $this->idSala = $idSala;
    }

    /**
     * Obtiene el nombre de la sala.
     *
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Establece el nombre de la sala.
     *
     * @param string $nombre Nombre de la sala.
     * @return void
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Agrega un equipo a la sala.
     *
     * @return void
     */
    public function agregarEquipo(): void
    {
        // Lógica para agregar un equipo en futuras etapas.
    }

    /**
     * Quita un equipo de la sala.
     *
     * @return void
     */
    public function quitarEquipo(): void
    {
        // Lógica para quitar un equipo en futuras etapas.
    }

    /**
     * Obtiene la cantidad de equipos asociados a la sala.
     *
     * @return int
     */
    public function obtenerCantidadEquipos(): int
    {
        // Lógica para contar equipos en futuras etapas.
        return 0;
    }
}
