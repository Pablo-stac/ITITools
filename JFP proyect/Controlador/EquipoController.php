<?php

require_once __DIR__ . '/../Modelo/Equipo.php';

/**
 * Controlador para gestionar el inventario de equipos.
 * Recibe las acciones de la vista, valida los datos básicos y delega la lógica
 * de negocio en el modelo.
 */
class EquipoController
{
    /**
     * Registra un nuevo equipo en el inventario.
     *
     * @param array $datos Datos enviados desde la vista.
     * @return array Resultado con éxito, mensaje y equipo.
     */
    public function registrarEquipo(array $datos): array
    {
        $errores = $this->validarDatosBasicos($datos, ['codigoInventario', 'tipo', 'marca', 'modelo', 'numeroSerie']);
        if (!empty($errores)) {
            return [
                'exito' => false,
                'mensaje' => 'Complete los campos obligatorios.',
                'errores' => $errores,
                'equipo' => null
            ];
        }

        $equipo = new Equipo(0, '', '', '', '', '', 'disponible');
        return $equipo->registrarEquipo($datos);
    }

    /**
     * Modifica los datos de un equipo existente.
     *
     * @param array $datos Datos enviados desde la vista.
     * @return array Resultado con éxito, mensaje y equipo.
     */
    public function modificarEquipo(array $datos): array
    {
        if (empty($datos['idEquipo']) || !is_numeric($datos['idEquipo'])) {
            return [
                'exito' => false,
                'mensaje' => 'Debe indicar un identificador de equipo válido.',
                'errores' => ['idEquipo' => 'Identificador inválido'],
                'equipo' => null
            ];
        }

        $equipo = new Equipo((int) $datos['idEquipo'], '', '', '', '', '', 'disponible');
        return $equipo->modificarEquipo($datos);
    }

    /**
     * Marca un equipo como eliminado o dado de baja.
     *
     * @param int $idEquipo Identificador del equipo.
     * @return array Resultado con éxito, mensaje y equipo.
     */
    public function eliminarEquipo(int $idEquipo): array
    {
        if ($idEquipo <= 0) {
            return [
                'exito' => false,
                'mensaje' => 'El identificador del equipo no es válido.',
                'errores' => ['idEquipo' => 'Identificador inválido'],
                'equipo' => null
            ];
        }

        $equipo = new Equipo($idEquipo, '', '', '', '', '', 'disponible');
        return $equipo->eliminarEquipo();
    }

    /**
     * Actualiza el estado de un equipo.
     *
     * @param array $datos Datos enviados desde la vista.
     * @return array Resultado con éxito, mensaje y equipo.
     */
    public function actualizarEstado(array $datos): array
    {
        if (empty($datos['idEquipo']) || !is_numeric($datos['idEquipo'])) {
            return [
                'exito' => false,
                'mensaje' => 'Debe indicar un identificador de equipo válido.',
                'errores' => ['idEquipo' => 'Identificador inválido'],
                'equipo' => null
            ];
        }

        if (empty($datos['estado'])) {
            return [
                'exito' => false,
                'mensaje' => 'Debe indicar un estado para el equipo.',
                'errores' => ['estado' => 'Estado obligatorio'],
                'equipo' => null
            ];
        }

        $equipo = new Equipo((int) $datos['idEquipo'], '', '', '', '', '', 'disponible');
        return $equipo->actualizarEstado((string) $datos['estado']);
    }

    /**
     * Valida los campos obligatorios básicos recibidos desde la vista.
     *
     * @param array $datos Datos enviados desde la vista.
     * @param array $camposObligatorios Lista de campos requeridos.
     * @return array Lista de errores encontrados.
     */
    private function validarDatosBasicos(array $datos, array $camposObligatorios): array
    {
        $errores = [];

        foreach ($camposObligatorios as $campo) {
            if (!isset($datos[$campo]) || trim((string) $datos[$campo]) === '') {
                $errores[$campo] = 'Campo obligatorio';
            }
        }

        return $errores;
    }
}
