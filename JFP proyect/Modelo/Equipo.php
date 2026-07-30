<?php

/**
 * Clase que representa un equipo tecnológico del inventario del sistema.
 * Encapsula la lógica de negocio relacionada con el registro, edición,
 * eliminación y cambio de estado del equipo.
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
     * Registra un nuevo equipo aplicando reglas de negocio básicas.
     *
     * @param array $datos Datos recibidos desde el controlador.
     * @return array Resultado con éxito y mensaje.
     */
    public function registrarEquipo(array $datos): array
    {
        $this->setCodigoInventario($this->normalizarTexto($datos['codigoInventario'] ?? ''));
        $this->setTipo($this->normalizarTexto($datos['tipo'] ?? ''));
        $this->setMarca($this->normalizarTexto($datos['marca'] ?? ''));
        $this->setModelo($this->normalizarTexto($datos['modelo'] ?? ''));
        $this->setNumeroSerie($this->normalizarTexto($datos['numeroSerie'] ?? ''));
        $this->setEstado($this->normalizarEstado($datos['estado'] ?? 'disponible'));

        if ($this->codigoInventario === '' || $this->tipo === '' || $this->marca === '' || $this->modelo === '' || $this->numeroSerie === '') {
            return [
                'exito' => false,
                'mensaje' => 'Todos los campos obligatorios deben contener información válida.',
                'equipo' => null
            ];
        }

        if (strlen($this->codigoInventario) < 3) {
            return [
                'exito' => false,
                'mensaje' => 'El código de inventario debe tener al menos 3 caracteres.',
                'equipo' => null
            ];
        }

        return [
            'exito' => true,
            'mensaje' => 'Equipo registrado correctamente.',
            'equipo' => $this
        ];
    }

    /**
     * Modifica los datos del equipo actual.
     *
     * @param array $datos Datos recibidos desde el controlador.
     * @return array Resultado con éxito y mensaje.
     */
    public function modificarEquipo(array $datos): array
    {
        if (empty($datos['idEquipo']) || !is_numeric($datos['idEquipo'])) {
            return [
                'exito' => false,
                'mensaje' => 'No se pudo identificar el equipo a modificar.',
                'equipo' => null
            ];
        }

        $this->setIdEquipo((int) $datos['idEquipo']);
        $this->setCodigoInventario($this->normalizarTexto($datos['codigoInventario'] ?? $this->getCodigoInventario()));
        $this->setTipo($this->normalizarTexto($datos['tipo'] ?? $this->getTipo()));
        $this->setMarca($this->normalizarTexto($datos['marca'] ?? $this->getMarca()));
        $this->setModelo($this->normalizarTexto($datos['modelo'] ?? $this->getModelo()));
        $this->setNumeroSerie($this->normalizarTexto($datos['numeroSerie'] ?? $this->getNumeroSerie()));
        $this->setEstado($this->normalizarEstado($datos['estado'] ?? $this->getEstado()));

        if ($this->codigoInventario === '' || $this->tipo === '' || $this->marca === '' || $this->modelo === '' || $this->numeroSerie === '') {
            return [
                'exito' => false,
                'mensaje' => 'No se pueden dejar campos obligatorios vacíos al modificar el equipo.',
                'equipo' => null
            ];
        }

        return [
            'exito' => true,
            'mensaje' => 'Equipo actualizado correctamente.',
            'equipo' => $this
        ];
    }

    /**
     * Marca el equipo como dado de baja.
     *
     * @return array Resultado con éxito y mensaje.
     */
    public function eliminarEquipo(): array
    {
        $this->setEstado('dado_de_baja');

        return [
            'exito' => true,
            'mensaje' => 'Equipo dado de baja correctamente.',
            'equipo' => $this
        ];
    }

    /**
     * Actualiza el estado del equipo.
     *
     * @param string $nuevoEstado Nuevo estado del equipo.
     * @return array Resultado con éxito y mensaje.
     */
    public function actualizarEstado(string $nuevoEstado): array
    {
        $estadoNormalizado = $this->normalizarEstado($nuevoEstado);

        if ($estadoNormalizado === '') {
            return [
                'exito' => false,
                'mensaje' => 'El estado proporcionado no es válido.',
                'equipo' => null
            ];
        }

        $this->setEstado($estadoNormalizado);

        return [
            'exito' => true,
            'mensaje' => 'Estado del equipo actualizado correctamente.',
            'equipo' => $this
        ];
    }

    /**
     * Devuelve si el equipo está disponible para préstamo.
     *
     * @return bool
     */
    public function estaDisponible(): bool
    {
        return $this->estado === 'disponible';
    }

    /**
     * Normaliza el texto eliminando espacios innecesarios.
     *
     * @param string $valor Valor a normalizar.
     * @return string
     */
    private function normalizarTexto(string $valor): string
    {
        return trim($valor);
    }

    /**
     * Normaliza y valida el estado del equipo.
     *
     * @param string $estado Estado recibido.
     * @return string
     */
    private function normalizarEstado(string $estado): string
    {
        $estadoNormalizado = strtolower(trim($estado));
        $estadosPermitidos = ['disponible', 'en_uso', 'en_mantenimiento', 'dado_de_baja'];

        return in_array($estadoNormalizado, $estadosPermitidos, true) ? $estadoNormalizado : 'disponible';
    }
}
