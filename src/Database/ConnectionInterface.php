<?php

namespace Nen\Database;

use Nen\Database\Query\QueryInterface;

/**
 * Interface ConnectionInterface
 */
interface ConnectionInterface
{
    /**
     * @param QueryInterface $query
     *
     * @return array
     */
    public static function selectOne(QueryInterface $query): array;

    /**
     * @param QueryInterface $query
     *
     * @return array
     */
    public static function selectAll(QueryInterface $query): array;

    /**
     * @param QueryInterface $query
     *
     * @return int
     */
    public static function execute(QueryInterface $query): int;
}
