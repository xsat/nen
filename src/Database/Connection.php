<?php

namespace Nen\Database;

use Nen\Database\Query\QueryInterface;
use PDO;
use PDOStatement;

/**
 * Class Connection
 */
class Connection implements ConnectionInterface
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * Connection constructor.
     *
     * @param string $host
     * @param string $database
     * @param string $user
     * @param string $password
     */
    public function __construct(
        string $host,
        string $database,
        string $user,
        string $password = null
    )
    {
        $this->pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password, [
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
            PDO::ATTR_STRINGIFY_FETCHES => false,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    /**
     * @param QueryInterface $query
     *
     * @return array|null
     */
    public function selectFirst(QueryInterface $query): ?array
    {
        return self::query($query)->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * @param QueryInterface $query
     *
     * @return array
     */
    public function select(QueryInterface $query): array
    {
        return self::query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param QueryInterface $query
     */
    public function execute(QueryInterface $query): void
    {
        self::query($query);
    }

    /**
     * @param QueryInterface $query
     *
     * @return PDOStatement
     */
    private function query(QueryInterface $query): PDOStatement
    {
        $stmt = $this->pdo->prepare($query->getQuery(), [
            PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY,
        ]);

        $stmt->execute($query->getBinds());

        return $stmt;
    }

    /**
     * @return int|null
     */
    public function lastInsetId(): ?int
    {
        return $this->pdo->lastInsertId();
    }
}
