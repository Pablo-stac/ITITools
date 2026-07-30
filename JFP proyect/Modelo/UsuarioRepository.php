<?php

require_once __DIR__ . '/BaseRepository.php';
require_once __DIR__ . '/Usuario.php';

/**
 * Repositorio para operaciones de base de datos sobre usuarios.
 */
class UsuarioRepository extends BaseRepository
{
    /**
     * Busca un usuario por correo electrónico.
     *
     * @param string $correo
     * @return Usuario|null
     */
    public function findByCorreo(string $correo): ?Usuario
    {
        $sql = 'SELECT * FROM usuarios WHERE correo = :correo LIMIT 1';
        $row = $this->fetchOne($sql, ['correo' => $correo]);

        if ($row === null) {
            return null;
        }

        return new Usuario(
            (int) $row['idUsuario'],
            $row['nombre'],
            $row['apellido'],
            $row['correo'],
            $row['contrasena'],
            (bool) $row['estado']
        );
    }

    /**
     * Busca un usuario por su identificador.
     *
     * @param int $idUsuario
     * @return Usuario|null
     */
    public function findById(int $idUsuario): ?Usuario
    {
        $sql = 'SELECT * FROM usuarios WHERE idUsuario = :idUsuario LIMIT 1';
        $row = $this->fetchOne($sql, ['idUsuario' => $idUsuario]);

        if ($row === null) {
            return null;
        }

        return new Usuario(
            (int) $row['idUsuario'],
            $row['nombre'],
            $row['apellido'],
            $row['correo'],
            $row['contrasena'],
            (bool) $row['estado']
        );
    }

    /**
     * Inserta un nuevo usuario en la base de datos.
     *
     * @param Usuario $usuario
     * @return bool
     */
    public function save(Usuario $usuario): bool
    {
        $sql = 'INSERT INTO usuarios (nombre, apellido, correo, contrasena, estado) VALUES (:nombre, :apellido, :correo, :contrasena, :estado)';
        return $this->execute($sql, [
            'nombre' => $usuario->getNombre(),
            'apellido' => $usuario->getApellido(),
            'correo' => $usuario->getCorreo(),
            'contrasena' => $usuario->getContrasena(),
            'estado' => $usuario->getEstado() ? 1 : 0,
        ]);
    }

    /**
     * Actualiza un usuario existente en la base de datos.
     *
     * @param Usuario $usuario
     * @return bool
     */
    public function update(Usuario $usuario): bool
    {
        $sql = 'UPDATE usuarios SET nombre = :nombre, apellido = :apellido, correo = :correo, contrasena = :contrasena, estado = :estado WHERE idUsuario = :idUsuario';
        return $this->execute($sql, [
            'idUsuario' => $usuario->getIdUsuario(),
            'nombre' => $usuario->getNombre(),
            'apellido' => $usuario->getApellido(),
            'correo' => $usuario->getCorreo(),
            'contrasena' => $usuario->getContrasena(),
            'estado' => $usuario->getEstado() ? 1 : 0,
        ]);
    }

    /**
     * Desactiva un usuario estableciendo su estado en falso.
     *
     * @param int $idUsuario
     * @return bool
     */
    public function deactivate(int $idUsuario): bool
    {
        $sql = 'UPDATE usuarios SET estado = 0 WHERE idUsuario = :idUsuario';
        return $this->execute($sql, ['idUsuario' => $idUsuario]);
    }
}
