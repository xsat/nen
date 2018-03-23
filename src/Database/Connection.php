<?php

namespace Nen\Database;

use PDO;

/**
 * Class Connection
 */
class Connection extends PDOConnection
{
    /**
     * Connection constructor.
     *
     * @param string $host
     * @param string $database
     * @param string $user
     * @param string $password
     * @param string $engine
     */
    public function __construct(
        string $host,
        string $database,
        string $user,
        string $password = null,
        string $engine = 'mysql'
    )
    {
        parent::__construct(
            new PDO($engine . ':host=' . $host . ';dbname=' . $database, $user, $password, [
                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
                PDO::ATTR_STRINGIFY_FETCHES => false,
                PDO::ATTR_EMULATE_PREPARES => false,
            ])
        );
    }
}
