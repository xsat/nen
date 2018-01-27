<?php

namespace Nen\Database\MySql;

use Nen\Database\QueryInterface;

/**
 * Class Query
 */
class Query implements QueryInterface
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var array
     */
    private $binds = [];

    /**
     * Query constructor.
     *
     * @param string $query
     * @param array $binds
     */
    public function __construct(string $query, array $binds = [])
    {
        $this->query = $query;
        $this->binds = $binds;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * {@inheritdoc}
     */
    public function getBinds(): array
    {
        return $this->binds;
    }
}
