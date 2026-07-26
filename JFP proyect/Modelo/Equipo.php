<?php

/**
 * Clase que representa un equipo tecnológico del inventario del sistema SGRSI.
 */
class Equipo
{
    /**
     * Identificador del equipo.
     *
     * @var int
     */
    private int $idEquipo;

    /**
     * Código de inventario del equipo.
     *
     * @var string
     */
    private string $codigoInventario;

    /**
     * Tipo de equipo.
     *
     * @var string
     */
    private string $tipo;

    /**
     * Marca del equipo.
     *
     * @var string
     */
    private string $marca;

    /**
     * Modelo del equipo.
     *
     * @var string
     */
    private string $modelo;

    /**
     * Número de serie del equipo.
     *
     * @var string
     */
    private string $numeroSerie;

    /**
     * Estado del equipo.
     *
     * @var string
     */
    private string $estado;

    /**
     * Constructor de la clase Equipo.
     *
     * @param int $idEquipo Identificador del equipo.
     * @param string $codigoInventario Código de inventario del equipo.
     * @param string $tipo Tipo de equipo.
     * @param string $marca Marca del equipo.
     * @param string $modelo Modelo del equipo.
     * @param string $numeroSerie Número de serie del equipo.
     * @param string $estado Estado del equipo.
     */
    public function __construct(int $idEquipo, string $codigoInventario, string $tipo, string $marca, string $modelo, string $numeroSerie, string $estado)
    {
        $this->idEquipo = $idEquipo;
        $this->codigoInventario = $codigoInventario;
        $this->tipo = $tipo;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->numeroSerie = $numeroSerie;
        $this->estado = $estado;
    }

    /**
     * Obtiene el identificador del equipo.
     *
     * @return int
     */
    public function getIdEquipo(): int
    {
        return $this->idEquipo;
    }

    /**
     * Establece el identificador del equipo.
     *
     * @param int $idEquipo Identificador del equipo.
     * @return void
     */
    public function setIdEquipo(int $idEquipo): void
    {
        $this->idEquipo = $idEquipo;
    }

    /**
     * Obtiene el código de inventario del equipo.
     *
     * @return string
     */
    public function getCodigoInventario(): string
    {
        return $this->codigoInventario;
    }

    /**
     * Establece el código de inventario del equipo.
     *
     * @param string $codigoInventario Código de inventario del equipo.
     * @return void
     */
    public function setCodigoInventario(string $codigoInventario): void
    {
        $this->codigoInventario = $codigoInventario;
    }

    /**
     * Obtiene el tipo de equipo.
     *
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * Establece el tipo de equipo.
     *
     * @param string $tipo Tipo de equipo.
     * @return void
     */
    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * Obtiene la marca del equipo.
     *
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * Establece la marca del equipo.
     *
     * @param string $marca Marca del equipo.
     * @return void
     */
    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    /**
     * Obtiene el modelo del equipo.
     *
     * @return string
     */
    public function getModelo(): string
    {
        return $this->modelo;
    }

    /**
     * Establece el modelo del equipo.
     *
     * @param string $modelo Modelo del equipo.
     * @return void
     */
    public function setModelo(string $modelo): void
    {
        $this->modelo = $modelo;
    }

    /**
     * Obtiene el número de serie del equipo.
     *
     * @return string
     */
    public function getNumeroSerie(): string
    {
        return $this->numeroSerie;
    }

    /**
     * Establece el número de serie del equipo.
     *
     * @param string $numeroSerie Número de serie del equipo.
     * @return void
     */
    public function setNumeroSerie(string $numeroSerie): void
    {
        $this->numeroSerie = $numeroSerie;
    }

    /**
     * Obtiene el estado del equipo.
     *
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * Establece el estado del equipo.
     *
     * @param string $estado Estado del equipo.
     * @return void
     */
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    /**
     * Actualiza el estado del equipo.
     *
     * @return void
     */
    public function actualizarEstado(): void
    {
        // Lógica para actualizar el estado del equipo en futuras etapas.
    }
}
