<?php

namespace Nen\Database;

use PDO;
use PDOStatement;

/**
 * Class PDOConnection
 */
class PDOConnection implements ConnectionInterface
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * PDOConnection constructor.
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
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
