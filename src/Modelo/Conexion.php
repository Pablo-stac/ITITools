<?php

class Conexion
{
    private static ?PDO $conexion = null;

    private function __construct()
    {
    }

    public static function obtenerConexion(): PDO
    {
        if (self::$conexion === null) {
            $host = 'localhost';
            $db = 'sgrsi';
            $user = 'root';
            $password = '';
            $charset = 'utf8mb4';

            $dsn = "mysql:host={$host};dbname={$db};charset={$charset}";

            try {
                self::$conexion = new PDO($dsn, $user, $password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new PDOException('No se pudo conectar a la base de datos: ' . $e->getMessage());
            }
        }

        return self::$conexion;
    }
}
