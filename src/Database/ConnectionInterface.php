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
    public function selectFirst(QueryInterface $query): ?array;

    /**
     * @param QueryInterface $query
     *s
     * @return array
     */
    public function select(QueryInterface $query): array;

    /**
     * @param QueryInterface $query
     *
     * @return bool
     */
    public function execute(QueryInterface $query): bool;

    /**
     * @return int|null
     */
    public function lastInsetId(): ?int;
}
