<?php

/**
 * Clase responsable de la conexión a la base de datos.
 *
 * Actualiza los valores de configuración según el entorno local.
 */
class Database
{
    /**
     * Conexión PDO compartida.
     *
     * @var PDO|null
     */
    private static ?PDO $connection = null;

    /**
     * Obtiene la conexión PDO a la base de datos.
     *
     * @return PDO
     * @throws PDOException
     */
    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            $config = self::getConfig();
            $dsn = sprintf(
                'mysql:host=%s;port=%s;dbname=%s;charset=%s',
                $config['host'],
                $config['port'],
                $config['database'],
                $config['charset']
            );

            self::$connection = new PDO($dsn, $config['username'], $config['password']);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }

        return self::$connection;
    }

    /**
     * Ejecuta una consulta preparada y devuelve el statement.
     *
     * @param string $sql
     * @param array $params
     * @return PDOStatement
     */
    public static function query(string $sql, array $params = []): PDOStatement
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Ejecuta una instrucción INSERT, UPDATE o DELETE.
     *
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public static function execute(string $sql, array $params = []): bool
    {
        $stmt = self::getConnection()->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Devuelve la configuración de conexión.
     *
     * @return array
     */
    private static function getConfig(): array
    {
        return [
            'host' => getenv('DB_HOST') ?: '127.0.0.1',
            'port' => getenv('DB_PORT') ?: '3306',
            'database' => getenv('DB_NAME') ?: 'sgri',
            'username' => getenv('DB_USER') ?: 'root',
            'password' => getenv('DB_PASS') ?: '',
            'charset' => getenv('DB_CHARSET') ?: 'utf8mb4',
        ];
    }
}
