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
     * @var Connection
     */
    private static $instance;


    /**
     * Connection constructor.
     *
     * @param string $host
     * @param string $database
     * @param string $user
     * @param string $password
     */
    private function __construct(string $host, string $database, string $user, string $password)
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
     * @return Connection
     */
    public static function getInstance(): Connection
    {
        if (!static::$instance) {
            static::$instance = new self(
                getenv('DB_HOST'),
                getenv('DB_DATABASE'),
                getenv('DB_USERNAME'),
                getenv('DB_PASSWORD')
            );
        }

        return static::$instance;
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
     *
     * @return bool
     */
    public function execute(QueryInterface $query): bool
    {
        return self::query($query)->execute();
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

    /**
     * @param null|string $text
     *
     * @return string
     */
    public function quote(?string $text): string
    {
        return $this->pdo->quote($text);
    }
}
