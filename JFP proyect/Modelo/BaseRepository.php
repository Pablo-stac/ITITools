<?php

require_once __DIR__ . '/Database.php';

/**
 * Clase base para repositorios de acceso a datos.
 * Proporciona métodos reutilizables sobre la conexión PDO.
 */
abstract class BaseRepository
{
    /**
     * Instancia de PDO para ejecutar consultas.
     *
     * @var PDO
     */
    protected PDO $connection;

    /**
     * Constructor del repositorio.
     */
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    /**
     * Ejecuta una consulta SELECT y devuelve todos los resultados.
     *
     * @param string $sql
     * @param array $params
     * @return array
     */
    protected function fetchAll(string $sql, array $params = []): array
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Ejecuta una consulta SELECT y devuelve un solo resultado.
     *
     * @param string $sql
     * @param array $params
     * @return array|null
     */
    protected function fetchOne(string $sql, array $params = []): ?array
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch();
        return $result === false ? null : $result;
    }

    /**
     * Ejecuta una instrucción INSERT, UPDATE o DELETE.
     *
     * @param string $sql
     * @param array $params
     * @return bool
     */
    protected function execute(string $sql, array $params = []): bool
    {
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($params);
    }
}
